<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('imagenes/favicon2023.png') }}">
    <style>
        @page {
            size: A4;
            margin: 20px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1 {
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }

        .text-right {
            text-align: right;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid #333;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }


        .table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .header-table,
        .header-table td {
            padding: 4px 8px;
            border: none;
        }

        .bg-primary {
            background-color: #007bff;
            color: white;
        }

        .text-bold {
            font-weight: bold;
        }

        .border-none {
            border: none;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .mb-4 {
            margin-bottom: 20px;
        }

        .text-center {
            text-align: center;
        }

        .bordered-table {
            border: 1px solid #333;
            border-collapse: collapse;
        }

        .bordered-table th,
        .bordered-table td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
        }

        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header-table,
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .header-table td,
        .header-table th,
        .summary-table td,
        .summary-table th {
            padding: 8px;
            border: 1px solid #000;
        }

        .header-table th,
        .summary-table th {
            background-color: #f3f4f6;
            font-weight: bold;
            text-align: left;
        }

        .header-table td {
            vertical-align: top;
        }

        .summary-table td {
            text-align: right;
        }

        .header-table td:nth-child(1) {
            width: 50%;
        }

        .text-left {
            text-align: left;
        }

        .title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .bold {
            font-weight: bold;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h1>Reporte Punto de Venta</h1>
    <!-- Información de la cabecera -->
    <div class="container">

        <table class="header-table">
            <tr>
                <td>
                    <strong>Empresa:</strong> {{ $empresa->razon_social }}<br>
                    <strong>RUC:</strong> {{ $empresa->ruc }}<br>
                    <strong>Vendedor:</strong> {{ $datos->vendedor->name }}<br>
                    <strong>Estado de caja:</strong> {{ $datos->estado }}<br>
                    <strong>Montos de operación:</strong><br>
                    Saldo inicial: S/. {{ number_format($datos->monto_inicial, 2) }}<br>
                    Saldo final: S/. {{ number_format($datos->monto_final, 2) }}
                </td>
                <td>
                    <strong>Fecha reporte:</strong> {{ now()->format('d-m-Y') }}<br>
                    <strong>Establecimiento:</strong>{{ $local->nombre }} - {{ $local->direccion }}<br>
                    <strong>Fecha y hora apertura:</strong> {{ $datos->fecha_apertura }}<br>
                    <strong>Ingreso:</strong> S/.{{ number_format($totalIngresos, 2) }}<br>
                    <strong>Egreso:</strong> S/. {{ number_format($totalEgresos, 2) }}<br>
                </td>
            </tr>
        </table>

        <!-- Sección de Resumen -->
        <table class="header-table">
            <tr>
                @php
                    $totalCaja = $datos->monto_inicial + ($totalIngresos - $totalEgresos);
                @endphp
                <td class="text-left">
                    <strong>Ingreso caja:</strong> S/. {{ number_format($totalIngresos, 2) }}<br>
                    <strong>Total caja:</strong> S/. {{ number_format($totalCaja, 2) }}
                </td>
                <td class="text-left">
                    <strong>Egreso caja:</strong> S/. {{ number_format($totalEgresos, 2) }}
                </td>
            </tr>
        </table>

        <!-- Sección de Totales -->
        <table class="header-table">
            <tr>
                <td class="text-left">
                    <strong>Notas de Débito:</strong> S/. 0<br>
                    <strong>Por cobrar:</strong> S/. 0<br>
                    <strong>Total efectivo CPE:</strong> S/. {{ number_format($totalCPE, 2) }}
                </td>
                <td class="text-left">
                    <strong>Notas de Crédito:</strong> S/. 0<br>
                    <strong>Total propinas:</strong> S/. 0<br>
                    <strong>Total efectivo NOTA DE VENTA:</strong> S/. {{ number_format($totalNotaVenta, 2) }}
                </td>
            </tr>
        </table>

    </div>

    <!-- Tabla de resumen de pagos -->

    <table class="bordered-table" width="100%">
        <thead>
            <tr class="bg-primary text-white">
                <th>#</th>
                <th>Descripción</th>

                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($resumenPagos as $index => $resumen)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $resumen['metodo_pago'] }}</td>
                    {{-- <td>{{ number_format($resumen['ingresos'], 2) }}</td>
                    <td>{{ number_format($resumen['egresos'], 2) }}</td> --}}
                    <td>{{ number_format($resumen['suma_total'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Tabla de transacciones -->
    <h2 class="mt-4 text-center">Resumen de Transacciones</h2>
    <table class="bordered-table" width="100%">
        <thead>
            <tr class="bg-primary text-white">
                <th>#</th>
                <th>Tipo transacción</th>
                <th>Tipo documento</th>
                <th>Documento</th>
                <th>Fecha de pago</th>
                <th>Cliente/Proveedor</th>
                <th>N° Documento</th>
                <th>Moneda</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos->movimientos as $movimiento)
                @php
                    $tipo_doc = 'NOTA DE VENTA';

                    switch ($movimiento->movimientoable->tipo_comprobante_id) {
                        case '01':
                            $tipo_doc = 'FACTURA ELECTRÓNICA';
                            break;
                        case '03':
                            $tipo_doc = 'BOLETA ELECTRÓNICA';
                            break;
                    }

                    // Determinar si es una Venta o una Compra y acceder a la relación correcta
                    if ($movimiento->movimientoable instanceof \App\Models\Ventas) {
                        // Si es una venta, usamos el cliente
                        $entidadNombre = $movimiento->movimientoable->cliente->razon_social ?? 'Cliente no disponible';
                        $entidadDocumento = $movimiento->movimientoable->cliente->numero_documento ?? 'N/A';
                    } elseif ($movimiento->movimientoable instanceof \App\Models\Compras) {
                        // Si es una compra, usamos el proveedor
                        $entidadNombre =
                            $movimiento->movimientoable->proveedor->razon_social ?? 'Proveedor no disponible';
                        $entidadDocumento = $movimiento->movimientoable->proveedor->numero_documento ?? 'N/A';
                    } else {
                        // Si no es ni venta ni compra, usar valores por defecto
                        $entidadNombre = 'Entidad no disponible';
                        $entidadDocumento = 'N/A';
                    }
                @endphp
                <tr>
                    <td>1</td>
                    <td>{{ $movimiento->tipo == 'ingreso' ? 'Venta' : 'Compra' }}</td>
                    <td>{{ $tipo_doc }}</td>
                    <td>{{ $movimiento->movimientoable->serie_correlativo }}</td>
                    <td>{{ $movimiento->movimientoable->fecha_emision }}</td>
                    <td>{{ $entidadNombre }}</td>
                    <td>{{ $entidadDocumento }}</td>
                    <td>{{ $movimiento->movimientoable->divisa }}</td>
                    <td>{{ $movimiento->movimientoable->total }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Reporte generado automáticamente por el sistema de ventas.</p>
    </div>

</body>

</html>
