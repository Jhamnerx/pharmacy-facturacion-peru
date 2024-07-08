<div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">

    <div>
        <!-- Table -->
        <div class="overflow-x-auto h-full ">
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
                            <div class="font-semibold text-left">Dirección</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">Accioness</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Row -->

                    @foreach ($locales as $key => $local)
                        <tr wire:key="local-{{ $local->id }}">
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
                                        {{ strtoupper($local->nombre) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="text-left">{{ $local->direccion }}</div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <x-dropdown-actions>
                                    <li>
                                        <a href="javascript: void(0)"
                                            wire:click.prevent="openModalEdit({{ $local->id }})"
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

                                </x-dropdown-actions>
                            </td>
                        </tr>
                    @endforeach

                    @if ($locales->count() < 1)
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
