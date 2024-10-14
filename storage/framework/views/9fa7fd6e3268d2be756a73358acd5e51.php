<html>

<head>
    <?php
        $moneda = $devolucion->venta->divisa == 'PEN' ? 'S/' : '$';
    ?>
    <meta charset="UTF-8">
    <title><?php echo e($empresa->ruc); ?>-<?php echo e($devolucion->id); ?></title>
    <style type="text/css">
        .anulado-print {
            position: absolute;
            width: 100%;
            height: 100%;
            font-size: 25px;
            color: red;
            z-index: 1;
            text-align: center;
            font-weight: bold;

        }

        .anulado-print span {
            font-size: 16px;
            color: red;

        }

        .logo {
            text-align: center;
        }

        .logo img {
            width: 40mm;
        }

        .empresa {
            text-align: center;
            // background-color: red;

        }

        .empresa h3 {
            font-size: 14px;
            margin: 0;
            padding: 0;
            color: #3d4b43;
        }

        .empresa h3 span {
            font-size: 11px;
            font-weight: normal;
        }

        .numero-ruc {
            top: 30mm;
            text-align: center;
            //background-color: green;
        }

        .numero-ruc h3 {
            font-size: 14px;
            margin: 0.7mm;
            padding: 0;
            color: #3d4b43;
        }

        .tabledesc {
            width: 77.5mm;
            // background-color: green;
        }

        .tabledesc .border {
            margin: 0mm;
            padding: 0mm;
            border-bottom: 0.1mm dotted #3d4b43;
        }

        .tabledesc tr {
            width: 77.5mm;
        }

        .tabledesc tr th {
            font-size: 14px;
            padding: 0.2mm;
            margin: 1mm;
            padding-bottom: 0mm;
            color: #3d4b43;


        }

        .tabledesc tr td {
            font-size: 12px;
            padding: 0.2mm;
            margin: 0;

        }

        .conte-detalles {
            margin-top: 1mm;
            border-bottom: 0.1mm dotted #3d4b43;
        }

        .table-totales {
            width: 100%;
            margin-top: 1mm;
            border-bottom: 0.1mm dotted #3d4b43;
        }

        .table-totales tr td {
            padding: 0.4mm;
            margin: 0.4mm;
            font-size: 13px;
            padding-bottom: 1mm
        }

        .table-cliente {
            width: 100%;
        }

        .table-cliente tr td {
            font-size: 12px;
            padding: 0.2mm;
            margin: 0;
        }

        .bar-code {
            margin-top: 1.5mm;
            text-align: center;
        }

        .en-letras {
            margin-top: 1mm;
            font-size: 9px;
        }

        .en-letras span {
            margin-top: 1mm;
            font-size: 9px;
        }

        .impresa {
            text-align: center;
            margin-top: 1.5mm;
            font-size: 9px;
        }

        .anulado-print {
            position: absolute;
            top: 13%;
            left: 2%;
            color: red;
            font-size: 20px;
            text-align: center;
            font-weight: bold
        }

        .anulado-print span {
            color: red;
        }

        .v5 {
            width: 5%;
        }

        .v10 {
            width: 10%;
        }

        .v15 {
            width: 15%;
        }

        .v20 {
            width: 20%;
        }

        .v25 {
            width: 25%;
        }

        .v30 {
            width: 30%;
        }

        .v35 {
            width: 35%;
        }

        .v40 {
            width: 40%;
        }

        .v45 {
            width: 45%;
        }

        .v50 {
            width: 50%;
        }

        .v55 {
            width: 55%;
        }

        .v60 {
            width: 60%;
        }

        .v65 {
            width: 65%;
        }

        .v70 {
            width: 70%;
        }

        .v75 {
            width: 75%;
        }

        .v80 {
            width: 80%;
        }

        .v100 {
            width: 100%;
        }

        .tabla-tipo-pago {
            width: 100%;
        }

        .tabla-detraccion {
            width: 100%;

        }

        .tabla-detraccion td {

            font-size: 12px;

        }

        .tabla-tipo-pago td {
            border-bottom: 0.5px solid #333;
            font-size: 12px;

        }

        @page {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
</head>

<body style="margin: 0mm 0.5mm;;">
    <page backtop="1.5mm" backbottom="1.5mm" backleft="1.8mm" backright="1.5mm">

        <?php if($devolucion->anulado == 'si'): ?>
            <div class="anulado-print">
                ANULADO<br>
                <span>
                    ticket de baja: 3000309
                </span>

            </div>
        <?php endif; ?>
        
        <div class="logo">
            <img src="data:image/jpeg;base64, <?php echo e(base64_encode(Storage::get($empresa->logo))); ?>" alt="">
        </div>

        
        <div class="empresa">
            <h3>
                <?php echo e($empresa->nombre_comercial); ?><br>
                <br>
                <span>
                    <?php echo e($empresa->direccion['direccion']); ?>- <?php echo e($empresa->direccion['distrito']); ?>-
                    <?php echo e($empresa->direccion['provincia']); ?>- <?php echo e($empresa->direccion['departamento']); ?>

                </span>
                <br>
                <span>Telf. <?php echo e($empresa->telefono); ?></span>
            </h3>

        </div>

        
        <div class="numero-ruc">
            <h3 class=""><?php echo e($empresa->ruc); ?></h3>
            <h3>DEVOLUCION</h3>
            <h3>DEV-<?php echo e(str_pad($devolucion->id, 6, '0', STR_PAD_LEFT)); ?></h3>
        </div>

        
        <div class="conte-cliente">
            <table class="table-cliente">
                <tr>
                    <td style="width:29mm; text-align:right;">Fecha de Emisión: </td>
                    <td style="width:42mm; text-align:left;"><?php echo e($devolucion->fecha_emision->format('d/m/Y')); ?></td>
                </tr>
                <tr>
                    <td style="width:29mm; text-align:right;">Medio de pago: </td>
                    <td style="width:42mm; text-align:left;"><?php echo e($devolucion->venta->metodoPago->descripcion); ?></td>
                </tr>

            </table>

            <table class="table-cliente">
                <tr>
                    <td style="width:15mm; text-align:left;">Cliente: </td>
                    <td style="width:56mm; text-align:left;"><?php echo e($devolucion->venta->cliente->razon_social); ?></td>
                </tr>
                <tr>
                    <td style="width:15mm; text-align:left;">Doc. Afectado: </td>
                    <td style="width:56mm; text-align:left;"><?php echo e($devolucion->venta->serie_correlativo); ?></td>
                </tr>
                <tr>
                    <td style="width:15mm; text-align:left;">RUC/DNI: </td>
                    <td style="width:56mm; text-align:left;"><?php echo e($devolucion->venta->cliente->numero_documento); ?></td>
                </tr>
                <tr>
                    <td style="width:15mm; text-align:left;">Direc: </td>
                    <td style="width:56mm; text-align:left;"><?php echo e($devolucion->venta->cliente->direccion); ?></td>
                </tr>
                <tr>
                    <td style="width:15mm; text-align:left;">Tipo Moneda: </td>
                    <td style="width:56mm; text-align:left;">
                        <?php echo e($devolucion->venta->divisa == 'PEN' ? 'SOLES' : 'DOLARES'); ?>

                    </td>
                </tr>


            </table>

        </div>

        
        <div class="conte-detalles">
            <table class="tabledesc">
                <thead class="header">
                    <tr class="tr-head">
                        <th style="text-align:center; width:10mm;">Cant.</th>
                        <th style="text-align:center; width:30mm;">Descripción</th>
                        <th style="text-align:center; width:13mm;">Precio</th>
                        <th style="text-align:center; width:13mm;">Importe</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="border"></th>
                    </tr>

                </thead>
                <tbody>
                    <?php $__currentLoopData = $devolucion->detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width:10mm; text-align:center;"> <?php echo e(round($item->cantidad, 2)); ?>

                                <?php echo e($item->unit); ?></td>
                            <td style="width:30mm; text-align:center;"><?php echo e($item->descripcion); ?></td>
                            <td style="width:14mm;"> <?php echo e($moneda); ?>

                                <?php echo e(round($item->valor_unitario, 2)); ?></td>
                            <td style="width:14mm;"><?php echo e($moneda); ?>

                                <?php echo e(round($item->sub_total, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php
            $formatter = new Luecano\NumeroALetras\NumeroALetras();

        ?>
        <div class="en-letras">
            <span>
                <?php echo e($formatter->toInvoice($devolucion->total, 2, $devolucion->venta->divisa == 'PEN' ? 'SOLES' : 'DÓLARES')); ?></span>
        </div>

        <div class="bar-code">
            <?php
                $ruc = $empresa->ruc;
                $tipo_documento = $devolucion->tipo_comprobante_id;
                $serie = $devolucion->id;
                $correlativo = $devolucion->correlativo;
                $igv = $devolucion->igv;
                $total = $devolucion->total;
                $fecha = $devolucion->fecha_emision->format('Y-m-d');
                $cliente_docT = $devolucion->venta->cliente->tipo_documento_id;
                $doc_cliente = $devolucion->venta->cliente->numero_documento;

                $texto_qr =
                    $ruc .
                    '|' .
                    $tipo_documento .
                    '|' .
                    $serie .
                    '|' .
                    $correlativo .
                    '|' .
                    $igv .
                    '|' .
                    $total .
                    '|' .
                    $fecha .
                    '|' .
                    $cliente_docT .
                    '|' .
                    $doc_cliente;

                $svg = base64_encode(QrCode::format('svg')->size(105)->generate($texto_qr));

            ?>

            <img src="data:image/svg+xml;base64,' . <?php echo e($svg); ?> . '" />

        </div>
    </page>
</body>

</html>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/templates/comprobantes/ticket/devolucion.blade.php ENDPATH**/ ?>