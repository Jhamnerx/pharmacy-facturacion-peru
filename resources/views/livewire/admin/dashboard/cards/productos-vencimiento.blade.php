<div
    class="col-span-full xl:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">MEDICAMENTOS POR VENCER</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-slate-300">
                <!-- Table header -->
                <thead
                    class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                    <tr>
                        <th class="p-2">
                            <div class="font-semibold text-left">Imagen</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Nombre</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Categoria</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">N° Lote</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Stock</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Fecha Vencimiento</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                    <!-- Row -->
                    @foreach ($lotesVencidos as $lote)
                        <tr>
                            <td class="p-2">
                                <div class="flex items-center">

                                    @if ($lote->producto->image)
                                        <img class="shrink-0 mr-2 sm:mr-3"
                                            src="{{ Storage::url($lote->producto->image->url) }}" width="36"
                                            height="36" alt="Icon 01" />
                                    @else
                                        <img class="shrink-0 mr-2 sm:mr-3"
                                            src="{{ Storage::url('productos/default.png') }}" width="36"
                                            height="36" alt="Icon 01" />
                                    @endif

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-center">{{ $lote->producto->nombre }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-center">
                                    {{ $lote->producto->categoria ? $lote->producto->categoria->nombre : '' }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-center text-emerald-500">{{ $lote->codigo_lote }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-center">{{ $lote->producto->stock }}</div>
                            </td>
                            <td class="p-2">
                                <div class="text-center {{ $lote->producto->getColorFechaVencimiento() }}">
                                    {{ $lote->producto->fecha_vencimiento ? $producto->fecha_vencimiento->format('d-m-Y') : '' }}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($lotesVencidos->count() < 1)
                        <tr>
                            <td colspan="9" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay productos por vencer</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
