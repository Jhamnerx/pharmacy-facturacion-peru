<x-form.modal.card name="modal_stock_out" title=" " wire:model.live="showModal">
    <div class="w-full p-4">
        <!-- Expired Medicine Table -->
        <div class="mb-4">
            <h4 class="text-center text-lg font-semibold">Medicina Vencida</h4>
        </div>
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200">
                    <th class="text-center py-2 px-4">Medicina Nombre</th>
                    <th class="text-center py-2 px-4">Codigo Lote</th>
                    <th class="text-center py-2 px-4">Fecha Vencimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expiredProducts as $lote)
                    <tr>
                        <td class="text-center py-2 px-4">{{ $lote->producto->nombre }}</td>
                        <td class="text-center py-2 px-4">{{ $lote->codigo_lote }}</td>
                        <td class="text-center py-2 px-4">
                            {{ $lote->fecha_vencimiento ? $lote->fecha_vencimiento->format('d-m-Y') : '' }}</td>
                    </tr>
                @endforeach
                @if ($expiredProducts->isEmpty())
                    <tr>
                        <td class="text-center py-2 px-4" colspan="3">No hay medicina vencida</td>
                    </tr>
                @endif
                <!-- Add more rows here -->
            </tbody>
            <!-- Pagination -->
            <div class="mt-8 w-full">
                {{ $expiredProducts->links() }}

            </div>
        </table>

        <!-- Out of Stock Medicine Table -->
        <div class="mt-8 mb-4">
            <h4 class="text-center text-lg font-semibold">Medicina agotada</h4>
        </div>
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200">
                    <th class="text-center py-2 px-4">Medicina Nombre</th>
                    <th class="text-center py-2 px-4">Proveedor</th>
                    <th class="text-center py-2 px-4">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outOfStockProducts as $producto)
                    <tr>
                        <td class="text-center py-2 px-4">{{ $producto->nombre }}</td>
                        <td class="text-center py-2 px-4">{{ $producto->proveedor }}</td>
                        <td class="text-center py-2 px-4 text-red-500">{{ $producto->stock }}</td>
                    </tr>
                @endforeach
                @if ($outOfStockProducts->isEmpty())
                    <tr>
                        <td class="text-center py-2 px-4" colspan="3">No hay medicina agotada</td>
                    </tr>
                @endif
            </tbody>
            <!-- Pagination -->
            <div class="mt-8 w-full">
                {{ $expiredProducts->links() }}

            </div>
        </table>
    </div>
</x-form.modal.card>
