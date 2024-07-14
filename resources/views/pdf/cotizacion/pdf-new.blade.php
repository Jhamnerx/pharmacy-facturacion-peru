<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>COTIZACION #{{ $presupuesto->serie_correlativo }}</title>


    {{--
    <link rel="stylesheet" href="{{ ltrim(public_path('presupuesto/normalize.css'), '/') }}" />
    <link rel="stylesheet" href="{{ ltrim(public_path('presupuesto/foundation.css'), '/') }}" />
    <link rel="stylesheet" href="{{ ltrim(public_path('presupuesto/style.css'), '/') }}" /> --}}

    <link rel="stylesheet" href="{{ public_path('docs/normalize.css') }}">
    <link rel="stylesheet" href="{{ public_path('docs/foundation.css') }}">
    <link rel="stylesheet" href="{{ public_path('docs/presupuesto/style.css') }}">

    <style type="text/css">
        .page-break {
            page-break-after: always;
        }

        .footer {
            padding-top: 2rem;
        }

        .header-bottom .invoice-header table tbody td {
            padding: 20px;
            background: url("data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/arrow.png')) }}") no-repeat 20px top #ed832f;

            font-size: 16px;
            color: #fff;
        }

        .header-bottom .invoice-header table .circle {
            background: url("data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/circle.png')) }}") no-repeat scroll 0 0/100% auto rgba(0, 0, 0, 0);
            height: 50px;
            padding: 10px 4px;
            text-align: center;
            width: 40px;
        }

        .footer {
            padding: 30px 0;
            background: url("data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/footer.png')) }}") no-repeat top;

            font-size: 14px;
            color: #ababab;
        }

        .contenedor-caracteristicas {
            padding: 2rem, 2rem;
            font-size: 12px;
            display: block;
            flex-wrap: wrap;
            overflow: hidden;

            margin-top: 3.8rem;
            margin-left: 2.8rem;
            margin-right: 6rem;
            margin-bottom: 3.8rem;
            padding-bottom: 1rem;
        }

        .producto-titulo {
            font-size: 16px;
        }

        .descripcion {
            font-size: 15px;
        }
    </style>
</head>

<body>


    <div>

        <div class="header row">

            <div class="medium-6 columns">

                <img src="data:image/jpeg;base64, {{ base64_encode(Storage::get($empresa->logo)) }}">

            </div>

            <div class="medium-3 columns">
                <div class="header-contact">
                    <img class="icon-mail"
                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/mail.png')) }}">
                    <p>{{ $empresa->correo }}<br>

                    </p>
                </div>
            </div>

            <div class="medium-3 columns">
                <div class="header-contact">
                    <img class="icon-telephone"
                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/phone.png')) }}">
                    <p>+51 {{ $empresa->telefono }}<br>
                        Lunes a Viernes<br>
                        7am a 9pm</p>
                </div>
            </div>


        </div>
        <!--header-->


        <div class="header-bottom row">

            <div class="large-5 medium-5 columns header-bottom-left">

                <h3><img class="icon-invoice"
                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/invoice.png')) }}"></i>
                    COTIZACION A:</h3>
                <h2>{{ $presupuesto->cliente->razon_social }}</h2>
                <p style="margin-bottom:10px;line-height:22px;">{{ $presupuesto->cliente->direccion }}<br>
                </p>

                <p style="margin-bottom:10px;"><img class="icon-mail"
                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/mail.png')) }}"></i>{{ $presupuesto->cliente->email }}
                </p>
                <p><img class="icon-mobile"
                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/mobile.png')) }}"></i>{{ $presupuesto->cliente->telefono }}
                </p>

            </div>

            <div class="large-7 medium-7 columns invoice-header">

                <h2>COTIZACION: #{{ $presupuesto->serie_correlativo }}</h2>

                <table>
                    <thead>
                        <tr>
                            <td>
                                <div class="circle"><img class="icon-dollar"
                                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/dollar.png')) }}">
                                </div>
                            </td>
                            <td>
                                <div class="circle"><img class="icon-calendar"
                                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/calendar.png')) }}">
                                </div>
                            </td>
                            <td>
                                <div class="circle"><img class="icon-calendar"
                                        src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/presupuesto/images/calendar.png')) }}">
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                Monto Total:<br>
                                <strong>{{ $presupuesto->divisa == 'PEN' ? 'S/. ' : '$' }}{{ $presupuesto->total }}</strong>
                            </td>
                            <td>
                                Fecha Emisión:<br>
                                <strong>{{ $presupuesto->fecha_emision->format('d/m/Y') }}</strong>
                            </td>
                            <td>
                                Fecha Venc.:<br>
                                <strong>{{ $presupuesto->fecha_vencimiento->format('d/m/Y') }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
        <!--header-bottom-->


        <div class="row">
            <div class="large-12 columns">
                <table class="products-table">
                    <thead>
                        <tr>
                            <th>Producto/Servicio</th>
                            <th>codigo</th>
                            <th>Cantidad</th>
                            <th>Valor unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($presupuesto->detalle as $detalle)
                            <tr>
                                <td>
                                    <p class="producto-titulo"><b>{{ $detalle->descripcion }}</b>.
                                    </p>
                                    {{-- <p class="descripcion">{{ $detalle->descripcion }}</p> --}}
                                </td>
                                <td>{{ $detalle->unit }}
                                </td>
                                <td>{{ $detalle->cantidad }}

                                </td>
                                <td>{{ $presupuesto->divisa == 'PEN' ? 'S/. ' : '$' }}{{ round($detalle->valor_unitario, 2) }}
                                </td>
                                <td>{{ $presupuesto->divisa == 'PEN' ? 'S/. ' : '$' }}{{ round($detalle->sub_total, 2) }}
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>

        <div class="row terms">
            <div class="large-12 columns">

                @if ($presupuesto->terminos)
                    <p><strong>Terminos:</strong></p>
                    <ul>

                        @foreach ($presupuesto->terminos as $termino)
                            <li>{{ $termino }}</li>
                        @endforeach



                    </ul>
                @else
                    <p><strong>Terminos:</strong></p>
                    <ul>
                        <li>Esta cotizacion es valida hasta su fecha de caducidad</li>
                        <li>El tiempo de entrega es inmediata previa solicitud con anticipación</li>

                    </ul>
                @endif

            </div>
        </div>
        @if ($presupuesto->comentario)
            <div class="row terms">
                <div class="large-12 columns">
                    <p><strong>Nota:</strong> {{ $presupuesto->comentario }}.</p>
                </div>
            </div>
        @endif
        @if (count($presupuesto->detalle) > 2)
            <div class="footer" style="margin-top: 180px;"></div>
        @else
            <div class="footer" style="margin-top: 120px;"></div>
        @endif
        <div class="sub-footer row">
            <div class="large-5 medium-3 columns">
                <img style="margin-top: -25px"
                    src="data:image/jpeg;base64, {{ base64_encode(file_get_contents('docs/factura/images/footer-logo.png')) }}">
            </div>
            <div class="large-2 medium-3 large-offset-1 columns">
                <p>+51 {{ $empresa->telefono }}<br>
                </p>
            </div>

            <div class="large-2 medium-3 columns">
                <p>{{ $empresa->correo }}</p>
            </div>

            <div class="large-2 medium-3 columns">
                <p style="border:none;">www.blaspharma.com</p>
            </div>
        </div>
    </div>



    </div>
    <!--screen-->
</body>

</html>
