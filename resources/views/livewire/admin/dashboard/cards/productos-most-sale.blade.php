<div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
    <header class="px-5 py-4 border-b border-slate-100">
        <h2 class="font-semibold text-slate-800">MEDICAMENTOS MÁS VENDIDOS</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
                    <tr>
                        <th class="p-2">
                            <div class="font-semibold text-left">#</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-left">IMAGEN</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">NOMBRE</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">DESCRIPC</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">CATEGORIA</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">F. FARMACEUTICA</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">N° REG. SANITARIO</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">STOCK</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">VENTAS</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm font-medium divide-y divide-slate-100">
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

                                    {{ $producto->ventas }} Ventas
                                </div>
                            </td>


                        </tr>
                    @endforeach

                    @if ($productos->count() < 1)
                        <tr>
                            <td colspan="9" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay productos que mostrar</div>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
            <div class="mt-8 w-full">
                {{ $productos->links() }}

            </div>
        </div>
    </div>
    <div class=" text-rose-800 xs:text-emerald-500 md:text-orange-500"></div>
</div>
