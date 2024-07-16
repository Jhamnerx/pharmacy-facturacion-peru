<div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Total Productos <span
                class="text-slate-400 dark:text-slate-500 font-medium">{{ $productos->total() }}</span>
        </h2>

    </header>
    <div>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-slate-300">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                            <div class="font-semibold text-left">#</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">IMAGEN</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">NOMBRE</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">DESCRIPC.</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">CATEGORIA</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">F. FARMACEUTICA</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">PRESENTACION</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">N° REG. SANITARIO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">STOCK</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">PRECIO VENTA</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">PRECIO MIN.</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">PRECIO CAJA</div>
                        </th>

                        @canany(['productos.editar', 'productos.eliminar'])
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-center">ACCIONES</div>
                            </th>
                        @endcanany
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Row -->

                    @foreach ($productos as $producto)
                        <tr wire:key="productos-{{ $producto->id }}">
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center ">

                                    <div class="font-medium  text-left">
                                        {{ $producto->codigo }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-14 h-10 shrink-0 flex items-center justify-center bg-slate-100 rounded-full mr-2 sm:mr-3">

                                        @if ($producto->image)
                                            <img class="rounded-full" src="{{ Storage::url($producto->image->url) }}"
                                                width="56" alt="Icon 01" />
                                        @else
                                            <img class="rounded-full" src="{{ Storage::url('productos/default.png') }}"
                                                width="56" alt="Icon 01" />
                                        @endif
                                    </div>

                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="flex items-center ">

                                    <div class="font-medium text-slate-800 dark:text-slate-50 text-left">
                                        {{ $producto->nombre }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left text-slate-800 dark:text-slate-50">
                                    {{ $producto->descripcion }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left text-slate-800 dark:text-slate-50">
                                    {{ $producto->categoria->nombre }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="font-medium text-slate-800 dark:text-slate-50">
                                        {{ $producto->forma_farmaceutica }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left text-slate-800 dark:text-slate-50">
                                    {{ $producto->presentacion }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left text-slate-800 dark:text-slate-50">
                                    {{ $producto->numero_registro_sanitario }}</div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left">
                                    {{ $producto->stock . ' - ' . $producto->unit->name }}</div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left font-medium text-emerald-500">

                                    {{ $producto->divisa = 'USD' ? '$ ' : 'S/ ' }}
                                    {{ $producto->precio_unitario }}
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left font-medium text-orange-500">

                                    @if ($producto->precio_minimo != '0.00' || ($producto->precio_minimo > 0 && $producto->precio_minimo != null))
                                        {{ $producto->divisa = 'USD' ? '$ ' : 'S/ ' }}
                                        {{ $producto->precio_minimo }}
                                    @else
                                        -
                                    @endif

                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                @if ($producto->precio_caja)
                                    {{ $producto->divisa = 'USD' ? '$ ' : 'S/ ' }}
                                    <div class="text-left">{{ $producto->precio_caja }}</div>
                                @else
                                    -
                                @endif
                            </td>
                            @canany(['productos.editar', 'productos.eliminar'])
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <x-dropdown-actions>
                                        @can('productos.editar')
                                            <li>
                                                <a href="javascript: void(0)"
                                                    wire:click.prevent="openModalEdit({{ $producto->id }})"
                                                    class="text-slate-800 dark:text-slate-100 group flex items-center px-4 py-2 text-sm font-normal"
                                                    disabled="false" id="headlessui-menu-item-27" role="menuitem"
                                                    tabindex="-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                        </path>
                                                    </svg> Editar

                                                </a>
                                            </li>
                                        @endcan
                                        @can('productos.eliminar')
                                            <li>
                                                <a href="javascript: void(0)"
                                                    wire:click.prevent="openModalDelete({{ $producto->id }})"
                                                    class="text-slate-800 dark:text-slate-100 group flex items-center px-4 py-2 text-sm font-normal"
                                                    disabled="false" id="headlessui-menu-item-28" role="menuitem"
                                                    tabindex="-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        class="h-5 w-5 mr-3 text-gray-400 group-hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Eliminar
                                                </a>
                                            </li>
                                        @endcan
                                    </x-dropdown-actions>
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                    @if ($productos->count() < 1)
                        <tr>
                            <td colspan="6" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay Registros</div>
                            </td>
                        </tr>
                    @endif


                </tbody>
            </table>

        </div>
    </div>
</div>
