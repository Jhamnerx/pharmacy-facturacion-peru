@if ($formato == 'ticket')
    @foreach ($venta->detalle_cuotas as $key => $cuota)
        <tr>
            <td class="v45">Fecha de pago {{ $key + 1 }}</td>
            <td class="v55">Cuota {{ $key + 1 }}</td>
        </tr>
        <tr class="border_bottom">
            <td class="v45">{{ $cuota['fecha'] }}</td>
            <td class="v55">{{ $cuota['importe'] }}</td>
        </tr>
    @endforeach
@else
    <div class="tabla_borde">
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
            <tbody>
                <tr>
                    <td align="left" class="bold" colspan="3">Información del crédito</td>
                </tr>
                <tr class="border_top">
                    <td align="left">Monto neto pendiente de pago:</td>
                    <td align="left" colspan="2">{{ round($venta->detalle_cuotas->sum('importe'), 4) }}</td>
                </tr>
                <tr class="border_top border_bottom">
                    <td align="left">Total de Cuotas: </td>
                    <td align="left" colspan="2">{{ $venta->numero_cuotas }}</td>
                </tr>
                <tr class="">
                    <td colspan="3" align="left" class="v100">
                        <table class="v100 tabla_cuotas">
                            <tbody>

                                @if ($venta['detalle_cuotas']->count() > 0 && $venta['detalle_cuotas']->count() <= 3)
                                    <tr>
                                        @for ($i = 0; $i < $venta['detalle_cuotas']->count(); $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                @endif


                                @if ($venta['detalle_cuotas']->count() > 3 && $venta['detalle_cuotas']->count() <= 6)
                                    <tr>
                                        @for ($i = 0; $i < 3; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>

                                    <tr>
                                        @for ($i = 3; $i < $venta['detalle_cuotas']->count(); $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                @endif
                                //3 LINEAS
                                @if ($venta['detalle_cuotas']->count() > 6 && $venta['detalle_cuotas']->count() <= 9)
                                    <tr>
                                        @for ($i = 0; $i < 3; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>

                                    <tr>
                                        @for ($i = 3; $i < 6; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        @for ($i = 6; $i < $venta['detalle_cuotas']->count(); $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                @endif
                                //4 LINEAS

                                //3 LINEAS
                                @if ($venta['detalle_cuotas']->count() > 9 && $venta['detalle_cuotas']->count() <= 12)
                                    <tr>
                                        @for ($i = 0; $i < 3; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>

                                    <tr>
                                        @for ($i = 3; $i < 6; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        @for ($i = 6; $i < 9; $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                    <tr>
                                        @for ($i = 9; $i < $venta['detalle_cuotas']->count(); $i++)
                                            <td align="left">
                                                <table class="tabla-credito">
                                                    <tbody>
                                                        <tr>
                                                            <th>N° Cuota</th>
                                                            <th>Fec. Venc.</th>
                                                            <th>Monto</th>

                                                        </tr>
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $venta['detalle_cuotas'][$i]['fecha'] }}</td>
                                                            <td>{{ round($venta['detalle_cuotas'][$i]['importe'], 4) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endfor
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endif
