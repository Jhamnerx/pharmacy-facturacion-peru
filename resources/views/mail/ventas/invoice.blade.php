<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ header('Content-type:application/pdf') }}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #e1e2b1;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
        }

        .content p {
            margin: 10px 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .footer a {
            color: #337ab7;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">{{ $invoice->tipoComprobante->descripcion }} {{ $invoice->serie_correlativo }}</div>
        <div class="content">
            <p>Estimados {{ $invoice->cliente->razon_social }},</p>
            <p>BLAS PHARMA, envía una <strong>{{ $invoice->tipoComprobante->descripcion }}</strong>.</p>
            <p><strong>TIPO:</strong> {{ $invoice->tipoComprobante->descripcion }}</p>
            <p><strong>SERIE:</strong> {{ $invoice->serie }}</p>
            <p><strong>NÚMERO:</strong> {{ $invoice->correlativo }}</p>
            <p><strong>FECHA DE EMISIÓN:</strong> {{ $invoice->fecha_emision->format('d-m-Y') }}</p>
            <p><strong>TOTAL:</strong> {{ $invoice->divisa == 'PEN' ? 'S/' : '$' }} {{ $invoice->total }}</p>
        </div>
        <div class="footer">
            <p>Consulta en <a href="{{ config('app.url') }}" target="_blank">BLAS PHARMA</a></p>
        </div>
    </div>
</body>

</html>
