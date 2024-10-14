<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Operaciones Diarias</title>
    <style>
        @page {
            margin: 10mm 10mm 10mm 10mm;
            size: A4;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            background-color: #fff;
        }

        .container {
            width: 100%;
            padding: 0;
            margin: 0 auto;
            box-sizing: border-box;
        }

        h1,
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .header-info {
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #000;
            padding: 10px;
            font-size: 12px;
        }

        .header-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-info td {
            padding: 5px;
        }

        .header-info td:first-child {
            width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }

        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        .section-title {
            background-color: #0073B7;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }

        .highlight-yellow {
            background-color: #FFEC00;
            text-align: center;
            font-weight: bold;
        }

        .highlight-orange {
            background-color: #FFCE94;
            text-align: center;
            font-weight: bold;
        }

        .total {
            background-color: #e0e0e0;
            font-weight: bold;
            text-align: center;
        }

        .balance-table td {
            text-align: center;
        }

        /* Espaciado adicional entre tablas */
        .table-spacing {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resumen de Operaciones Diarias</h1>

        <div class="header-info">
            <table>
                <tr>
                    <td><strong>Empresa:</strong> DEMO PRO 6</td>
                    <td><strong>Fecha reporte:</strong> 2024-09-25</td>
                </tr>
                <tr>
                    <td><strong>RUC:</strong> 2020202020</td>
                    <td><strong>Establecimiento: </strong> - LIMA - Lima</td>
                </tr>
            </table>
        </div>

        <table class="table-spacing">
            <tr>
                <td colspan="2" class="section-title">INGRESOS POR VENTAS AL CONTADO</td>
                <td colspan="2" class="section-title">COMPRAS AL CONTADO</td>
            </tr>
            <tr>
                <td>TOTAL EFECTIVO</td>
                <td>1920.30</td>
                <td>TOTAL EFECTIVO</td>
                <td>1950.00</td>
            </tr>
            <tr>
                <td>TOTAL TRANSFERENCIAS</td>
                <td>0.00</td>
                <td>TOTAL TRANSFERENCIAS</td>
                <td>0.00</td>
            </tr>
            <tr>
                <td class="total">TOTAL</td>
                <td class="total">1920.30</td>
                <td class="total">TOTAL</td>
                <td class="total">1950.00</td>
            </tr>
        </table>

        <table class="table-spacing">
            <tr>
                <td colspan="2" class="section-title">VENTAS AL CRÉDITO</td>
                <td colspan="2" class="section-title">COMPRAS AL CRÉDITO</td>
            </tr>
            <tr>
                <td>TOTAL VENTAS AL CRÉDITO</td>
                <td>0.00</td>
                <td>TOTAL COMPRAS AL CRÉDITO</td>
                <td>0.00</td>
            </tr>
        </table>

        <table class="table-spacing">
            <tr>
                <td colspan="2" class="section-title">AMORTIZACIÓN DE VENTAS AL CRÉDITO</td>
                <td colspan="2" class="section-title">AMORTIZACIÓN DE COMPRAS AL CRÉDITO</td>
            </tr>
            <tr>
                <td>TOTAL EFECTIVO</td>
                <td>0.00</td>
                <td>TOTAL EFECTIVO</td>
                <td>0.00</td>
            </tr>
            <tr>
                <td>TOTAL TRANSFERENCIAS</td>
                <td>0.00</td>
                <td>TOTAL TRANSFERENCIAS</td>
                <td>0.00</td>
            </tr>
            <tr>
                <td class="total">TOTAL</td>
                <td class="total">0.00</td>
                <td class="total">TOTAL</td>
                <td class="total">0.00</td>
            </tr>
        </table>

        <table class="table-spacing">
            <tr>
                <td colspan="2" class="highlight-yellow">TOTAL INGRESOS AL CONTADO EN EFECTIVO</td>
                <td colspan="2" class="highlight-orange">TOTAL COMPRAS AL CONTADO EN EFECTIVO</td>
            </tr>
            <tr>
                <td colspan="2" class="highlight-yellow">1920.30</td>
                <td colspan="2" class="highlight-orange">1950.00</td>
            </tr>
        </table>

        <table class="table-spacing">
            <tr>
                <td colspan="2" class="highlight-yellow">TOTAL INGRESOS AL CONTADO POR TRANSFERENCIA</td>
                <td colspan="2" class="highlight-orange">TOTAL COMPRAS AL CONTADO POR TRANSFERENCIA</td>
            </tr>
            <tr>
                <td colspan="2" class="highlight-yellow">0.00</td>
                <td colspan="2" class="highlight-orange">0.00</td>
            </tr>
        </table>

        <h3>Saldos</h3>
        <table>
            <tr>
                <td>SALDO EN EFECTIVO (CAJA GENERAL)</td>
                <td>-29.70</td>
            </tr>
            <tr>
                <td>SALDO POR TRANSFERENCIAS (BANCOS)</td>
                <td>0.00</td>
            </tr>
            <tr>
                <td class="total">SALDO TOTAL</td>
                <td class="total">-29.70</td>
            </tr>
        </table>
    </div>
</body>

</html>
