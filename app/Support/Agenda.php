<?php

namespace App\Support;

use App\Models\Cita;
use Carbon\Carbon;

/**
 * Reglas de la agenda de Look Mágico (RF09, RF12 y RF13):
 *  - Se atiende de lunes a sábado de 10:00 a. m. a 7:00 p. m.; el domingo no hay citas.
 *  - En días festivos oficiales el horario es de 10:00 a. m. a 3:00 p. m. (con cargo extra).
 *  - Solo se agenda a una persona cada 1 hora y 15 minutos (75 min): la hora del
 *    servicio más 15 minutos para limpiar y preparar la estación.
 */
class Agenda
{
    public const INTERVALO_MINUTOS = 75;          // 1 h 15 min entre el inicio de una cita y otra
    public const PASO_MINUTOS      = 15;          // Cada cuánto se ofrece un horario
    public const APERTURA          = 10 * 60;     // 10:00 a. m.
    public const CIERRE            = 19 * 60;     // 7:00 p. m.
    public const CIERRE_FESTIVO    = 15 * 60;     // 3:00 p. m.

    // Estados que ocupan un lugar en la agenda (las canceladas liberan el horario)
    public const ESTADOS_ACTIVOS = ['pendiente', 'confirmada'];

    /** Días de descanso obligatorio (Ley Federal del Trabajo, art. 74). */
    public static function esFestivo(Carbon $fecha): bool
    {
        $anio = $fecha->year;
        $festivos = [
            Carbon::create($anio, 1, 1),
            Carbon::parse("first monday of february $anio"),
            Carbon::parse("third monday of march $anio"),
            Carbon::create($anio, 5, 1),
            Carbon::create($anio, 9, 16),
            Carbon::parse("third monday of november $anio"),
            Carbon::create($anio, 12, 25),
        ];

        foreach ($festivos as $festivo) {
            if ($festivo->isSameDay($fecha)) {
                return true;
            }
        }

        return false;
    }

    /** Convierte "11:00 AM", "1:30 PM" o "13:30" a minutos desde las 00:00. */
    public static function aMinutos(string $hora): ?int
    {
        $hora = strtoupper(trim(str_replace('.', '', $hora)));

        if (preg_match('/^(\d{1,2}):(\d{2})\s*(AM|PM)?$/', $hora, $m)) {
            $h = (int) $m[1];
            $min = (int) $m[2];
            if (!empty($m[3])) {
                if ($m[3] === 'PM' && $h < 12) {
                    $h += 12;
                }
                if ($m[3] === 'AM' && $h === 12) {
                    $h = 0;
                }
            }
            return $h * 60 + $min;
        }

        return null;
    }

    /** Convierte minutos a texto con el formato que usa el sistema: "1:30 PM". */
    public static function aTexto(int $minutos): string
    {
        return Carbon::today()->addMinutes($minutos)->format('g:i A');
    }

    /** Horarios en que puede INICIAR una cita ese día (vacío si es domingo). */
    public static function horariosDelDia(Carbon $fecha): array
    {
        if ($fecha->isSunday()) {
            return [];
        }

        $cierre = self::esFestivo($fecha) ? self::CIERRE_FESTIVO : self::CIERRE;
        $horarios = [];

        // La última cita debe empezar 1 h 15 min antes del cierre
        for ($m = self::APERTURA; $m <= $cierre - self::INTERVALO_MINUTOS; $m += self::PASO_MINUTOS) {
            $horarios[] = $m;
        }

        return $horarios;
    }

    /** Minutos de inicio de las citas que ya ocupan ese día. */
    public static function ocupadas(string $fecha, ?int $excluirCitaId = null): array
    {
        return Cita::whereDate('fecha', $fecha)
            ->whereIn('estado', self::ESTADOS_ACTIVOS)
            ->when($excluirCitaId, fn ($q) => $q->where('id', '!=', $excluirCitaId))
            ->pluck('hora')
            ->map(fn ($hora) => self::aMinutos($hora))
            ->filter(fn ($m) => $m !== null)
            ->values()
            ->all();
    }

    /** Lista de horarios del día indicando cuáles se pueden elegir (RF13). */
    public static function disponibilidad(string $fecha, ?int $excluirCitaId = null): array
    {
        $dia = Carbon::parse($fecha)->startOfDay();
        $ocupadas = self::ocupadas($fecha, $excluirCitaId);
        $ahora = now();
        $lista = [];

        foreach (self::horariosDelDia($dia) as $m) {
            $libre = true;

            foreach ($ocupadas as $o) {
                if (abs($m - $o) < self::INTERVALO_MINUTOS) {
                    $libre = false;
                    break;
                }
            }

            // No se ofrecen horas que ya pasaron
            if ($dia->isToday() && $m <= $ahora->hour * 60 + $ahora->minute) {
                $libre = false;
            }

            $lista[] = ['hora' => self::aTexto($m), 'disponible' => $libre];
        }

        return $lista;
    }

    /**
     * Revisa si una cita puede quedar en esa fecha y hora.
     * Regresa null si todo está bien, o el mensaje de error que se le muestra al usuario.
     */
    public static function validar(string $fecha, string $hora, ?int $excluirCitaId = null): ?string
    {
        $dia = Carbon::parse($fecha)->startOfDay();
        $minutos = self::aMinutos($hora);

        if ($dia->lt(Carbon::today())) {
            return 'No se pueden agendar citas en fechas pasadas.';
        }

        if ($dia->isSunday()) {
            return 'El salón no abre los domingos. Elige otro día.';
        }

        if ($minutos === null || !in_array($minutos, self::horariosDelDia($dia), true)) {
            return self::esFestivo($dia)
                ? 'Ese día es festivo: el horario es de 10:00 AM a 3:00 PM.'
                : 'Ese horario está fuera del horario de atención (10:00 AM a 7:00 PM).';
        }

        foreach (self::disponibilidad($fecha, $excluirCitaId) as $h) {
            if ($h['hora'] === self::aTexto($minutos)) {
                return $h['disponible']
                    ? null
                    : 'Ese horario ya no está disponible: entre una cita y otra debe haber al menos 1 hora y 15 minutos. Elige otro horario.';
            }
        }

        return 'Ese horario no está disponible.';
    }
}
