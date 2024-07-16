<div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800">Cotizaciones <span
                class="text-slate-400 font-medium">{{ $presupuestos->total() }}</span></h2>
    </header>
    <div>

        <!-- Table -->
        <div class="overflow-x-auto min-h-screen">
            <table class="table-auto  w-full">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                    <tr>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">FECHA EMISION</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">COMPROBANTE</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">CLIENTE</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">FORMA PAGO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">TOTAL</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ESTADO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ESTADO PAGO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Emitido el</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Vence el</div>
                        </th>
                        @can('cotizaciones.ver_pdf')
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-center">PDF</div>
                            </th>
                        @endcan
                        @canany(['cotizaciones.editar', 'cotizaciones.eliminar', 'cotizaciones.enviar',
                            'cotizaciones.cambiar_estado'])
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">ACCIONES</div>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200">
                    <!-- Row -->
                    @foreach ($presupuestos as $cotizacion)
                        <tr>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div>{{ $cotizacion->fecha_hora_emision->format('d-m-Y / H:i:s') }}
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="font-medium text-sky-500">
                                    {{ $cotizacion->serie_correlativo }}
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="font-medium text-slate-900">
                                    {{ $cotizacion->cliente->razon_social }}
                                </div>
                                <div class="font-sm text-slate-700">
                                    <p class="text-xs">
                                        {{ $cotizacion->cliente->numero_documento }}
                                    </p>

                                </div>

                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                @if ($cotizacion->forma_pago == 'CREDITO')
                                    <div>
                                        <div class="relative inline-flex" x-data="{ open: false }">
                                            <button class="inline-flex justify-center items-center group"
                                                aria-haspopup="true" @click.prevent="open = !open"
                                                :aria-expanded="open">
                                                <div class="flex items-center truncate">
                                                    <span
                                                        class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">
                                                        {{ $cotizacion->forma_pago }}
                                                    </span>
                                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                        viewBox="0 0 12 12">
                                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                    </svg>
                                                </div>
                                            </button>
                                            <div class="origin-top-right z-10 absolute top-full left-0 min-w-44 bg-white border border-slate-300 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                                @click.outside="open = false" @keydown.escape.window="open = false"
                                                x-show="open"
                                                x-transition:enter="transition ease-out duration-200 transform"
                                                x-transition:enter-start="opacity-0 -translate-y-2"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                x-transition:leave="transition ease-out duration-200"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0" x-cloak>
                                                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                                                    <div class="font-medium text-slate-800">Detalle de cuotas.
                                                    </div>
                                                    {{-- <div class="text-sm text-slate-600">
                                                        Adelanto:
                                                        {{ $cotizacion->divisa == 'USD' ? "$ " . $cotizacion->adelanto : 'S/. ' . $cotizacion->adelanto }}
                                                    </div> --}}

                                                </div>
                                                <table
                                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead
                                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                N° Cuota
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Fecha
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Importe
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($cotizacion->detalle_cuotas as $key => $cuota)
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                                    Cuota-{{ $key + 1 }}

                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{ $cuota['fecha'] }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{ $cotizacion->divisa == 'PEN ' ? 'S/ ' : '$ ' }}
                                                                    {{ $cuota['importe'] }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End -->
                                    </div>
                                @else
                                    <div class="font-medium text-slate-800">
                                        {{ $cotizacion->forma_pago }}
                                    </div>
                                @endif
                            </td>


                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium {{ $cotizacion->estado->color() }}">

                                    {{ $cotizacion->divisa == 'PEN' ? 'S/ ' : '$' }} {{ $cotizacion->total }}

                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div
                                    class="inline-flex font-medium bg-{{ $cotizacion->estado->color() }}-100 text-{{ $cotizacion->estado->color() }}-600 rounded-full text-center px-2.5 py-0.5">
                                    {{ $cotizacion->estado->name }}
                                </div>

                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                @switch($cotizacion->pago_estado)
                                    @case('UNPAID')
                                        <div
                                            class="inline-flex font-medium bg-orange-100 text-orange-600 rounded-full text-center px-2.5 py-0.5">
                                            Por Pagar</div>
                                    @break

                                    @case('PAID')
                                        <div
                                            class="inline-flex font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-0.5">
                                            Pagado</div>
                                    @break
                                @endswitch

                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div>{{ $cotizacion->fecha_emision->format('Y-m-d') }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div>{{ $cotizacion->fecha_vencimiento->format('Y-m-d') }}</div>
                            </td>

                            @can('cotizaciones.ver_pdf')
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">

                                    <div class="space-x-1">
                                        {{-- obtener pdf --}}
                                        <a target="_blank"
                                            href="{{ route('facturacion.cotizacion.ver.pdf', ['cotizaciones' => $cotizacion]) }}">
                                            <button type="button" class="bg-white ">
                                                <x-iconos.pdf />
                                            </button>
                                        </a>
                                    </div>


                                </td>
                            @endcan

                            @canany(['cotizaciones.editar', 'cotizaciones.eliminar', 'cotizaciones.enviar',
                                'cotizaciones.cambiar_estado'])
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="relative inline-flex" x-data="{ open: false }">
                                        <div class="relative inline-block h-full text-left">
                                            <button class="text-slate-400 hover:text-slate-500 rounded-full"
                                                :class="{ 'bg-slate-100 text-slate-500': open }" aria-haspopup="true"
                                                @click.prevent="open = !open" :aria-expanded="open">
                                                <span class="sr-only">Menu</span>
                                                <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                    <circle cx="16" cy="16" r="2" />
                                                    <circle cx="10" cy="16" r="2" />
                                                    <circle cx="22" cy="16" r="2" />
                                                </svg>
                                            </button>
                                            <div class="origin-top-right  z-10 absolute transform  -translate-x-3/4  top-full left-0 min-w-36 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1  ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                                @click.outside="open = false" @keydown.escape.window="open = false"
                                                x-show="open"
                                                x-transition:enter="transition ease-out duration-200 transform"
                                                x-transition:enter-start="opacity-0 -translate-y-2"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                x-transition:leave="transition ease-out duration-200"
                                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                                x-cloak>

                                                <ul>
                                                    @can('cotizaciones.editar')
                                                        <li>
                                                            <a href="{{ route('admin.cotizaciones.edit', $cotizacion) }}"
                                                                class="text-gray-700 group flex items-center px-4 py-2 text-sm font-normal"
                                                                disabled="false" id="headlessui-menu-item-27" role="menuitem"
                                                                tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                                    </path>
                                                                </svg> Editar

                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('cotizaciones.eliminar')
                                                        <li>
                                                            <a href="javascript: void(0)"
                                                                wire:click.prevent='openModalDelete({{ $cotizacion->id }})'
                                                                class="text-gray-700 group flex items-center px-4 py-2 text-sm font-normal"
                                                                disabled="false" id="headlessui-menu-item-28" role="menuitem"
                                                                tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="h-5 w-5 mr-3 text-gray-400 group-hover:text-red-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    @endcan

                                                    @can('cotizaciones.enviar')
                                                        <li>
                                                            <a href="javascript: void(0)"
                                                                wire:click="modalOpenSend({{ $cotizacion->id }})"
                                                                class="text-gray-700 group flex items-center px-4 py-2 text-sm font-normal"
                                                                disabled="false" id="headlessui-menu-item-32" role="menuitem"
                                                                tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="h-5 w-5 mr-3 text-gray-400 group-hover:text-cyan-600">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                                                                    </path>
                                                                </svg> Enviar
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('cotizaciones.cambiar_estado')
                                                        <li>
                                                            <a href="javascript: void(0)"
                                                                wire:click.prevent="markAccept({{ $cotizacion->id }})"
                                                                class="text-gray-700 group flex items-center px-4 py-2 text-sm font-normal"
                                                                disabled="false" id="headlessui-menu-item-33" role="menuitem"
                                                                tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="h-5 w-5  mr-3 text-gray-400 group-hover:text-lime-500">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                                Marcar como Aceptada
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript: void(0)"
                                                                wire:click.prevent="markReject({{ $cotizacion->id }})"
                                                                class="text-gray-700 group flex items-center px-4 py-2 text-sm font-normal"
                                                                disabled="false" id="headlessui-menu-item-34" role="menuitem"
                                                                tabindex="-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="h-5 w-5  mr-3 text-gray-400 group-hover:text-red-400">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg> Marcar como Rechazada
                                                            </a>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcanany

                            {{-- Crear nota de crédito
                            Crear nota de débito
                            Volver a crear
                            Anular comprobante --}}
                        </tr>
                    @endforeach

                    @if ($presupuestos->count() < 1)
                        <tr>
                            <td colspan="12" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay Registros</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
