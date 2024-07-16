<div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Total Categorias <span
                class="text-slate-400 dark:text-slate-500 font-medium">{{ $categorias->total() }}</span>
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
                            <div class="font-semibold text-left">Nombre</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Descripcion</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left"># Productos</div>
                        </th>
                        @can('categoria_productos.cambiar_estado')
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Estado</div>
                            </th>
                        @endcan
                        @canany(['categoria_productos.editar', 'categoria_productos.eliminar'])
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-center">Accioness</div>
                            </th>
                        @endcanany
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Row -->

                    @foreach ($categorias as $key => $categoria)
                        <tr wire:key="cat-{{ $categoria->id }}">
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center">

                                    <div class="font-medium text-sky-500">
                                        {{ $key + 1 }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="font-medium text-slate-800 dark:text-slate-100">
                                        {{ strtoupper($categoria->nombre) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left">{{ $categoria->descripcion }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-center">{{ $categoria->productos->count() }}</div>
                            </td>
                            @can('categoria_productos.cambiar_estado')
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="text-center">
                                        <div class="m-3 w-48">
                                            <div class="flex items-center mt-2" x-data="{ checked: {{ $categoria->estado ? 'true' : 'false' }} }">
                                                <span class="text-sm mr-3">Activo: </span>
                                                <div class="form-switch">
                                                    <input wire:click="toggleStatus({{ $categoria->id }})" type="checkbox"
                                                        id="switch-f{{ $categoria->id }}" class="sr-only"
                                                        x-model="checked" />
                                                    <label class="bg-slate-400" for="switch-f{{ $categoria->id }}">
                                                        <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                                        <span class="sr-only">Estado</span>
                                                    </label>
                                                </div>
                                                <div class="text-sm text-slate-400 italic ml-2"
                                                    x-text="checked ? 'ACTIVO' : 'INACTIVO'"></div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @canany(['categoria_productos.editar', 'categoria_productos.eliminar'])
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <x-dropdown-actions>
                                        @can('categoria_productos.editar')
                                            <li>
                                                <a href="javascript: void(0)"
                                                    wire:click.prevent="openModalEdit({{ $categoria->id }})"
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
                                        @can('categoria_productos.eliminar')
                                            <li>
                                                <a href="javascript: void(0)"
                                                    wire:click.prevent="openModalDelete({{ $categoria->id }})"
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
                    @if ($categorias->count() < 1)
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
