<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $empresa->ruc }}-{{ $venta->serie }}- {{ $venta->correlativo }}</title>
    <style type="text/css">
        .bold,
        b,
        strong {
            font-weight: 700
        }

        body {
            background-repeat: no-repeat;
            background-position: center center;
            text-align: center;
            margin: 0;
            font-family: Verdana, monospace
        }

        .tabla_borde {
            border: 1px solid #666;
            border-radius: 10px
        }

        tr.border_bottom td {
            border-bottom: 1px solid #000
        }

        tr.border_top td {
            border-top: 1px solid #666
        }

        td.border_right {
            border-right: 1px solid #666
        }

        .table-valores-totales tbody>tr>td {
            border: 0
        }

        .table-valores-totales>tbody>tr>td:first-child {
            text-align: right
        }

        .table-valores-totales>tbody>tr>td:last-child {
            border-bottom: 1px solid #666;
            text-align: right;
            width: 30%
        }

        hr,
        img {
            border: 0
        }

        table td {
            font-size: 12px
        }

        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-size: 10px;
            -webkit-tap-highlight-color: transparent
        }

        a {
            background-color: transparent
        }

        a:active,
        a:hover {
            outline: 0
        }

        img {
            vertical-align: middle
        }

        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            margin-top: 20px;
            margin-bottom: 20px;
            border-top: 1px solid #eee
        }

        table {
            border-spacing: 0;
            border-collapse: collapse
        }

        @media print {

            blockquote,
            img,
            tr {
                page-break-inside: avoid
            }

            *,
            :after,
            :before {
                color: #000 !important;
                text-shadow: none !important;
                background: 0 0 !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important
            }

            a,
            a:visited {
                text-decoration: underline
            }

            a[href]:after {
                content: " (" attr(href) ")"
            }

            blockquote {
                border: 1px solid #999
            }

            img {
                max-width: 100% !important
            }

            p {
                orphans: 3;
                widows: 3
            }

            .table {
                border-collapse: collapse !important
            }

            .table td {
                background-color: #fff !important
            }
        }

        a,
        a:focus,
        a:hover {
            text-decoration: none
        }

        *,
        :after,
        :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        a {
            color: #428bca;
            cursor: pointer
        }

        a:focus,
        a:hover {
            color: #2a6496
        }

        a:focus {
            outline: dotted thin;
            outline: -webkit-focus-ring-color auto 5px;
            outline-offset: -2px
        }

        h6 {
            font-family: inherit;
            line-height: 1.1;
            color: inherit;
            margin-top: 10px;
            margin-bottom: 10px
        }

        p {
            margin: 0 0 10px
        }

        blockquote {
            padding: 10px 20px;
            margin: 0 0 20px;
            border-left: 5px solid #eee
        }

        table {
            background-color: transparent
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px
        }

        h6 {
            font-weight: 100;
            font-size: 10px
        }

        body {
            line-height: 1.42857143;
            font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #2f4050;
            font-size: 13px;
            color: #676a6c;
            overflow-x: hidden
        }

        .table>tbody>tr>td {
            vertical-align: top;
            border-top: 1px solid #e7eaec;
            line-height: 1.42857;
            padding: 8px
        }

        .white-bg {
            background-color: #fff
        }

        td {
            padding: 6
        }

        .table-valores-totales tbody>tr>td {
            border-top: 0 none !important
        }

        //CUSTOM CSS
        body {

            font-family: Verdana, monospace
        }

        #tabla-cabecera,
        #tabla-cliente,
        #tabla-items,
        #tabla-totales,
        .tabla-importes,
        .tabla-observacion {
            position: relative;
            width: 100%;
            border-collapse: collapse;

        }

        #tabla-cabecera {
            text-align: center;
            letter-spacing: 0.5px;
            color: #333;
        }

        #tabla-cabecera h3 {
            font-size: 16px;
            margin-bottom: 1px;
            color: #444;
        }

        #tabla-cliente td {
            border: 0.5px solid #333;
            padding: 7px;
            text-align: left;
            font-size: 12px;
            padding-left: 10px;
            letter-spacing: 1px;
        }

        #tabla-totales td {
            padding: 7px;
            text-align: left;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        .tabla-importes td {
            border: 0.5px solid #333;
            padding: 7px;
            text-align: left;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        #tabla-cliente {
            margin-top: 10px;
        }

        #tabla-items {
            margin-top: 10px;
        }

        #tabla-items th {
            border: 0.5px solid #333;
            padding: 6px;
            text-align: center;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        #tabla-items td {
            border: 0.5px solid #333;
            padding: 6px;
            text-align: center;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        .ruc-emisor {
            position: relative;
            border: 1px solid #666;
            border-radius: 20px;
            text-align: center;
            vertical-align: top;

        }

        .ruc-emisor h4 {
            color: #444;
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

        .direccion {
            font-size: 10px;
        }

        .total-letras {

            border: 0.5px solid #333;
            font-size: 9px;
            text-align: left;
            border-radius: 10px;
            padding: 10px;
            margin-top: 5px;
            padding-left: 10px;
        }

        .tabla-observacion {
            position: relative;
            margin-top: 5px;


        }

        .tabla-observacion td {
            position: relative;
            vertical-align: baseline;


        }

        .tabla-tipo-pago {
            width: 70%;
            border-collapse: collapse;
        }

        .tabla-tipo-pago td {
            border-bottom: 0.5px solid #333;


        }

        .col {
            background-color: #999;
        }

        .pie-pag {
            padding: 10px;
            font-size: 12px;
            border: 0.5px solid #333;
            margin-top: 10px;
            border-radius: 10px;
        }

        .b-l {
            border-radius: 7px 0px 0px 0px;
        }

        .b-r {
            border-radius: 0px 7px 0px 0px;
        }

        .mayu {
            text-transform: uppercase;
        }

        .anulado-print {
            position: absolute;
            top: 30%;
            left: 23%;
            color: #FF7979;
            font-size: 30px;
            text-align: center;
            font-weight: bold
        }

        .tabla-credito th {
            border: 0.5px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        .tabla-credito td {
            border: 0.5px solid #000;
            padding: 7px;
            text-align: left;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding-left: 10px;
        }

        .flex-container {
            display: inline-block;
        }

        .tabla_cuotas {
            margin-left: 10px;
        }

        .mb-2 {
            margin-bottom: 2px;
        }

        .mb-4 {
            margin-bottom: 4px;
        }
    </style>
</head>

<body style="margin: -5mm -5mm;;" class="white-bg">
    <page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
        <!-- CABECERA COMPROBANTE=================== -->
        <table width="100%" id="tabla-cabecera">
            <tr>
                <!-- LOGO================== -->
                <td class="v25">

                    <img class="v100" src="data:image/jpeg;base64, {{ base64_encode(Storage::get($empresa->logo)) }}">


                </td>
                <!--FIN LOGO================== -->
                <td class="v45">
                    <h3>{{ $empresa->nombre_comercial }}</h3>
                    <label class="direccion"> {{ $empresa->direccion['direccion'] }} </label>
                    <br>
                    <span class="direccion"> {{ $empresa->telefono }} </span>

                </td>
                <td class="v30" style="text-align: left">
                    <div class="ruc-emisor v100">
                        <h4>R.U.C. {{ $empresa->ruc }} </h4>
                        <h4>NOTA DE VENTA</h4>
                        <h4>
                            {{ $venta->serie }}-{{ $venta->correlativo }}
                        </h4>
                    </div>
                </td>
            </tr>

        </table>

        <!--CLIENTE COMPROBANTE=================== -->
        <div class="tabla_borde">

            <table width="100%" border="0" cellpadding="5" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="60%" align="left"><strong>Razón Social:</strong>
                            {{ $venta->cliente->razon_social }}</td>
                        <td width="40%" align="left">
                            <strong>{{ $venta->cliente->tipoDocumento->descripcion }}:</strong>
                            {{ $venta->cliente->numero_documento }}
                        </td>
                    </tr>
                    <tr>
                        <td width="60%" align="left">
                            <strong>Fecha Emisión: </strong> {{ $venta->fecha_emision->format('d/m/Y') }}
                        </td>
                        <td width="40%" align="left"><strong>Dirección: </strong>
                            {{ $venta->cliente->direccion }}</td>
                        </td>
                    </tr>


                    <tr>
                        <td width="60%" align="left"><strong>Tipo Moneda: </strong>

                            {{ $venta->divisa == 'PEN' ? 'SOLES' : 'DOLARES' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><br>

        @php
            $moneda = $venta->divisa == 'PEN' ? 'S/' : '$';
        @endphp


        <div class="tabla_borde">
            <table width="100%" border="0" cellpadding="5" cellspacing="0">
                <tbody>
                    <tr>
                        <td align="center" class="bold">CANTIDAD</td>
                        <td align="center" class="bold">CÓDIGO</td>
                        <td align="center" class="bold">DESCRIPCIÓN</td>
                        <td align="center" class="bold">VALOR UNITARIO</td>
                        <td align="center" class="bold">VALOR TOTAL</td>
                    </tr>
                    @foreach ($venta->detalle as $item)
                        <tr class="border_top">
                            <td align="center">
                                {{ round($item->cantidad, 2) }}
                                {{ $item->unit }}
                            </td>
                            <td align="center">
                                {{ $item->codigo }}
                            </td>
                            <td align="center" width="300px">
                                <span>{{ $item->descripcion }}</span><br>
                            </td>
                            <td align="center">
                                {{ $moneda }}
                                {{ round($item->valor_unitario, 2) }}
                            </td>
                            <td align="center">
                                {{ $moneda }}
                                {{ round($item->subt_total, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="total-letras">

            @php
                $formatter = new Luecano\NumeroALetras\NumeroALetras();

            @endphp

            {{ $formatter->toInvoice($venta->total, 2, $venta->divisa == 'PEN' ? 'SOLES' : 'DÓLARES') }}

        </div>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="50%" valign="top">
                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td colspan="4">
                                        <br>
                                        <br>
                                        <br>
                                        <strong>Información Adicional</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tbody>
                                <tr class="border_top">
                                    <td width="30%" style="font-size: 10px;">
                                        LEYENDA:
                                    </td>
                                </tr>


                                <tr class="border_top">
                                    <td width="30%" style="font-size: 10px;">
                                        CONDICION DE PAGO
                                    </td>
                                    <td width="70%" style="font-size: 10px;">
                                        {{ $venta->metodoPago->descripcion }}
                                    </td>
                                </tr>

                                <tr class="border_top">
                                    <td width="30%" style="font-size: 10px;">
                                        FORMA DE PAGO
                                    </td>
                                    <td width="70%" style="font-size: 10px;">
                                        {{ $venta->forma_pago }}
                                    </td>
                                </tr>
                                <tr class="border_top">
                                    <td width="30%" style="font-size: 10px;">
                                        VENDEDOR
                                    </td>
                                    <td width="70%" style="font-size: 10px;">
                                        {{ $venta->user->name }}
                                    </td>
                                </tr>


                                <tr class="border_top">
                                    <td width="30%" style="font-size: 10px;">

                                    </td>
                                    <td width="70%" style="font-size: 10px;">

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                    <td width="50%" valign="top">
                        <br>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                            class="table table-valores-totales">
                            <tbody>

                                @if ($venta->op_gravadas)
                                    <tr class="border_bottom">

                                        <td align="right"><strong>Op. Gravadas:</strong></td>
                                        <td width="120" align="right">
                                            <span>{{ $moneda }}
                                                {{ round($venta->op_gravadas, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif

                                @if ($venta->op_inafectas)
                                    <tr class="border_bottom">
                                        <td align="right"><strong>Op. Inafectas:</strong></td>
                                        <td width="120" align="right"><span>{{ $moneda }}
                                                {{ round($venta->op_inafectas, 2) }}</span></td>
                                    </tr>
                                @endif
                                @if ($venta->op_exoneradas)
                                    <tr class="border_bottom">
                                        <td align="right"><strong>Op. Exoneradas:</strong></td>
                                        <td width="120" align="right"><span>{{ $moneda }}
                                                {{ round($venta->op_exoneradas, 2) }}</span></td>
                                    </tr>
                                @endif

                                <tr>
                                    <td align="right"><strong>I.G.V.
                                            {{ $empresa->igv }}%:</strong></td>
                                    <td width="120" align="right"><span>{{ $moneda }}
                                            {{ round($venta->igv, 2) }}</span></td>
                                </tr>

                                <tr>
                                    <td align="right"><strong>
                                            Descuento:
                                        </strong></td>
                                    <td width="120" align="right">
                                        <span>{{ $moneda }}
                                            {{ $venta->descuento }}
                                        </span>
                                    </td>
                                </tr>


                                @if ($venta->icbper)
                                    <tr>
                                        <td align="right"><strong>I.C.B.P.E.R.:</strong></td>
                                        <td width="120" align="right"><span>{{ $moneda }}
                                                {{ round($venta->icbper, 2) }}</span></td>
                                    </tr>
                                @endif

                                <tr>
                                    <td align="right"><strong>Precio Venta:</strong></td>
                                    <td width="120" align="right"><span id="ride-importeTotal"
                                            class="ride-importeTotal">{{ $moneda }}
                                            {{ $venta->total }}</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>

        @if ($venta->detalle->count() > 10)
            {# <div style="page-break-after:always;"></div> #}
            <div class="page-break"></div>
        @endif

        <div>
            <hr
                style="display: block; height: 1px; border: 0; border-top: 1px solid #666; margin: 20px 0; padding: 0;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="85%">
                            <blockquote>

                                <h6> Consulte su documento electrónico en: {{ env('APP_URL') }}/consulta/invoice</h6>
                            </blockquote>
                        </td>
                        {{-- <td width="15%" align="right">
                            <img src="{{ qrCode(doc) | image_b64('svg+xml') }}" alt="Qr Image">
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>

    </page>





</body>

</html>
