<div class="col-span-full bg-white dark:bg-slate-800 shadow-md rounded-sm border border-slate-200 dark:border-slate-700">
    <!-- Card content -->
    <div class="flex flex-col h-full p-5">
        <div class="flex flex-wrap justify-between items-center mb-8">
            <!-- Left side -->
            <h3 class="text-lg text-slate-800 dark:text-slate-100 font-semibold">PRODUCTOS DIGEMID COINCIDENTE
            </h3>

        </div>


        <div class="grow">

            {{-- TABLA DIGEMID --}}
            <div
                class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">

                <div>
                    <!-- Table -->
                    <div class="overflow-x-auto h-full ">
                        <table class="table-auto w-full dark:text-slate-300">
                            <!-- Table header -->
                            <thead
                                class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                        <div class="font-semibold text-left">Codigo Digemid</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-left">Concent</div>
                                    </th>

                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-center">Nom_Form_Farm</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-center">Presentac</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-center">Num_RegSan</div>
                                    </th>
                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-semibold text-center">Nom_Titular</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                                <!-- Row -->

                                @foreach ($productos as $key => $producto)
                                    <tr wire:key="producto-{{ $producto->id }}"
                                        class="hover:bg-slate-100 dark:hover:bg-slate-700 hover:cursor-pointer"
                                        wire:click.prevent="sendData({{ $producto->id }})">
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                            <div class="flex items-center">
                                                <div class="font-medium text-sky-500">
                                                    {{ $producto->Cod_Prod }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-slate-800 dark:text-slate-100">
                                                    {{ strtoupper($producto->Nom_Prod) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3">
                                            <div class="text-left">{{ $producto->Concent }}</div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3">
                                            <div class="text-left">{{ $producto->Nom_Form_Farm }}</div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3">
                                            <div class="text-left">{{ $producto->Presentac }}</div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3">
                                            <div class="text-left">{{ $producto->Num_RegSan }}</div>
                                        </td>
                                        <td class="px-2 first:pl-5 last:pr-5 py-3">
                                            <div class="text-left">{{ $producto->Nom_Titular }}</div>
                                        </td>
                                    </tr>

                                    </tr>
                                @endforeach

                                @if ($productos->count() < 1)
                                    <tr>
                                        <td colspan="6"
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

        </div>
        <!-- Card footer -->
        <footer class="mt-4">
            {{ $productos->links() }}
        </footer>
    </div>
</div>
