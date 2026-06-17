@component('mail::message')
# Préstamo Registrado

Hola **{{ $prestamo->solicitante->nombre }}**, se ha registrado un préstamo a tu nombre.

## Detalles del préstamo

| Campo | Detalle |
|-------|---------|
| Equipo | {{ $prestamo->equipo->nombre }} ({{ $prestamo->equipo->codigo }}) |
| Categoría | {{ $prestamo->equipo->categoria }} |
| Marca | {{ $prestamo->equipo->marca }} |
| Fecha de préstamo | {{ $prestamo->fecha_prestamo->format('d/m/Y') }} |
| Fecha de devolución esperada | {{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }} |

Por favor recuerda devolver el equipo antes de la fecha indicada.

Gracias,<br>
{{ config('app.name') }}
@endcomponent