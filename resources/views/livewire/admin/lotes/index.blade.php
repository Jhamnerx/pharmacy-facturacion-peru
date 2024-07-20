<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl 2xl:max-w-full mx-auto ">
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-400 font-bold">GESTIONAR LOTES</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Search form -->
            <x-search-form placeholder="Buscar Lote" />

        </div>

    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
        <header class="px-5 py-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100">Lotes <span
                    class="text-slate-400 dark:text-slate-500 font-medium">{{ $lotes->total() }}</span>
            </h2>

        </header>
        <div>
            <!-- Table -->
            <div class="overflow-x-auto min-h-screen">
                <table class="table-auto w-full dark:text-slate-300">
                    <!-- Table header -->
                    <thead
                        class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="font-semibold text-left">CODIGO</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">MEDICAMENTO</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">CONCENTRACION</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">F. FARMACEUTICA</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">STOCK</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">FEC. VENCIMIENTO</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">LABORATORIO</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">PRESENTACION</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">PROVEEDOR</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">ESTADO</div>
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

                        @foreach ($lotes as $lote)
                            <tr wire:key="lote-{{ $lote->id }}">
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="flex items-center ">

                                        <div class="font-medium  text-left">
                                            {{ $lote->codigo_lote }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-2 first:pl-5 last:pr-5 py-3 ">
                                    <div class="flex items-center ">

                                        <div class="font-medium text-slate-800 dark:text-slate-50 text-center">
                                            {{ $lote->producto->nombre }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 ">
                                    <div class="text-left text-slate-800 dark:text-slate-50">
                                        {{ $lote->producto->concentracion }}</div>
                                </td>

                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="font-medium text-slate-800 dark:text-slate-50">
                                            {{ $lote->producto->forma_farmaceutica }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3  whitespace-nowrap">
                                    <div class="text-left {{ $lote->stock < 1 ? 'text-red-500' : '' }}">
                                        {{ $lote->stock . ' - ' . $lote->producto->unit->codigo }}</div>
                                </td>

                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="font-medium text-slate-800 dark:text-slate-50">
                                            {{ $lote->fecha_vencimiento ? $lote->fecha_vencimiento->format('d-m-Y') : '' }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="text-left text-slate-800 dark:text-slate-50">
                                        {{ $lote->producto->laboratorio }}</div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="text-left text-slate-800 dark:text-slate-50">
                                        {{ $lote->producto->presentacion }}</div>
                                </td>

                                <td class="px-2 first:pl-5 last:pr-5 py-3">
                                    <div class="text-left text-slate-800 dark:text-slate-50">
                                        {{ $lote->proveedor ? $lote->proveedor->razon_social : '' }}</div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3  whitespace-nowrap">
                                    <div class="text-center">
                                        @if ($lote->estado == 'vencido')
                                            <x-form.badge negative label="{{ $lote->estado }}" />
                                        @else
                                            <x-form.badge positive label="{{ $lote->estado }}" />
                                        @endif


                                    </div>
                                </td>

                                @canany(['roductos.lotes.editar', 'productos.lotes.eliminar'])
                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                        @can('productos.lotes.editar')
                                            <button wire:click.prevent="openModalEdit({{ $lote->id }})"
                                                class="text-slate-400 hover:text-slate-500 rounded-full">
                                                <span class="sr-only">Editar</span>
                                                <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                    <path
                                                        d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                                </svg>
                                            </button>
                                        @endcan
                                        @if ($lote->estado == 'vencido')
                                            @can('productos.lotes.eliminar')
                                                <button wire:click.prevent="openModalDelete({{ $lote->id }})"
                                                    aria-controls="danger-modal"
                                                    class="text-rose-500 hover:text-rose-600 rounded-full">
                                                    <span class="sr-only">Eliminar</span>
                                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                        <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                                        <path
                                                            d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                                    </svg>
                                                </button>
                                            @endcan
                                        @endif
                                        {{-- <x-dropdown-actions>
                                            @can('productos.editar')
                                                <li>
                                                    <a href="javascript: void(0)"
                                                        wire:click.prevent="openModalEdit({{ $lote->id }})"
                                                        class="text-slate-800 dark:text-slate-100 group flex items-center px-4 py-2 text-sm font-normal"
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
                                            @if ($lote->estado == 'vencido')
                                                @can('productos.eliminar')
                                                    <li>
                                                        <a href="javascript: void(0)"
                                                            wire:click.prevent="openModalDelete({{ $lote->id }})"
                                                            class="text-slate-800 dark:text-slate-100 group flex items-center px-4 py-2 text-sm font-normal"
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
                                            @endif

                                        </x-dropdown-actions> --}}
                                    </td>
                                @endcanany

                            </tr>
                        @endforeach
                        @if ($lotes->count() < 1)
                            <tr>
                                <td colspan="10"
                                    class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                    <div class="text-center">No hay Registros</div>
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <!-- Pagination -->
    <div class="mt-8 w-full">
        {{ $lotes->links() }}

    </div>
</div>
