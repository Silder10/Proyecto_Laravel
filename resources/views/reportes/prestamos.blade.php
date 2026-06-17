<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #343a40; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .devuelto { color: green; font-weight: bold; }
        .pendiente { color: orange; font-weight: bold; }
        .footer { margin-top: 20px; text-align: right; font-size: 10px; color: #666; }
    </style>
</head>
<body>
    <h1>Reporte de Préstamos</h1>
    <p>Fecha de generación: {{ now()->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Solicitante</th>
                <th>Fecha Préstamo</th>
                <th>Devolución Esperada</th>
                <th>Devolución Real</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->equipo->nombre }}</td>
                    <td>{{ $prestamo->solicitante->nombre }}</td>
                    <td>{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                    <td>{{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</td>
                    <td>{{ $prestamo->fecha_devolucion_real ? $prestamo->fecha_devolucion_real->format('d/m/Y') : '-' }}</td>
                    <td class="{{ $prestamo->fecha_devolucion_real ? 'devuelto' : 'pendiente' }}">
                        {{ $prestamo->fecha_devolucion_real ? 'Devuelto' : 'Pendiente' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Total de préstamos: {{ $prestamos->count() }}
    </div>
</body>
</html>