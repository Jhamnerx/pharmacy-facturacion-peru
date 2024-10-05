<x-form.modal.card persistent title="Pagos del comprobante: {{ $venta ? $venta->serie_correlativo : '' }}"
    wire:model.live="showModal" align="start" width="7xl">
    <div class="p-6">
        <!-- Tabla de Pagos Existentes -->
        <div class="overflow-x-auto ">
            <table class="min-w-full table-auto border-collapse border ">
                <thead class="bg-gray-100">
                    <tr class="text-sm">

                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">#</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Fecha de pago</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Método de pago</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Destino</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Monto</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-center">¿Pago recibido?</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Acciones</div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $index => $pago)
                        <tr>
                            <td class="px-4 py-1">PAGO-{{ $pago->id }}</td>
                            <td class="px-4 py-1">{{ $pago->fecha->format('d-m-Y') }}</td>
                            <td class="px-4 py-1">{{ $pago->metodoPago->descripcion }}</td>
                            <td class="px-4 py-1">CAJA GENERAL</td>
                            <td class="px-4 py-1 text-right">{{ number_format($pago->monto, 2) }}
                            </td>
                            <td class="px-4 py-1 text-center">{{ $pago->payed ? 'SI' : 'NO' }}</td>
                            <td class="px-4 py-1 text-left">
                                <x-form.button wire:click="eliminarPago({{ $pago->id }})" icon="trash"
                                    class="bg-red-500 text-white" xs>Eliminar</x-form.button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($payments->count() < 1)
                        <tr>
                            <td colspan="7" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay pagos para esta venta</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


        <!-- Formulario de Nuevo Pago -->
        @if ($nuevoPago)
            {{ json_encode($errors->all()) }}
            <div class="mt-6 p-4 border border-gray-300 rounded-lg">
                <div class="grid grid-cols-12 gap-2 mb-4">

                    <div class="col-span-4 md:col-span-2">
                        <x-form.datetime.picker label="Fecha de pago:" id="fecha" name="fecha"
                            wire:model.live="fecha" :min="now()->subDays(180)" :max="now()->addDays(30)" without-time
                            parse-format="YYYY-MM-DD" display-format="DD-MM-YYYY" :clearable="false" />
                    </div>

                    <div class="col-span-4 md:col-span-2">
                        <x-form.select autocomplete="off" label="Medio de pago:" wire:model.live="metodo_pago_id"
                            placeholder="Selecciona" :async-data="['api' => route('api.metodos.pago.index')]" option-label="descripcion"
                            option-value="codigo" />
                    </div>

                    <div class="col-span-4 md:col-span-2">
                        <x-form.select autocomplete="off" id="caja_chica_id" name="caja_chica_id" label="Destino"
                            wire:model.live="caja_chica_id">
                            @foreach ($cajas as $index => $caja)
                                <x-select.option label="CAJA GENERAL-{{ $index }}" value="{{ $caja }}" />
                            @endforeach

                        </x-form.select>
                    </div>

                    <div class="col-span-4 md:col-span-2">
                        <x-form.input label="Monto" wire:model.live="monto" type="number" />
                    </div>

                    <div class="col-span-4 md:col-span-1 mt-4">
                        <x-form.radio label="SÍ" wire:model.defer="payed" value="true" />
                        <x-form.radio label="NO" wire:model.defer="payed" value="false" />
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <x-form.input label="Número de Referencia" placeholder="Referencia y/o N° Operación"
                            wire:model.live="numero_referencia" />
                    </div>
                    <div class="flex space-x-2 col-span-3 md:col-span-1 mt-4">

                        <x-form.mini.button rounded icon="check" positive wire:click.prevent="guardarPago"
                            spinner="guardarPago" />
                        <x-form.mini.button rounded icon="trash" negative wire:click.prevent="cancelarPago" />

                    </div>
                </div>

            </div>
        @endif


        <!-- Resumen de Pagos -->
        <div class="mt-6">
            <div class="text-right">
                <div class="space-y-2">
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">TOTAL PAGADO</p>
                        <p class="text-gray-900 font-bold inline-block">{{ number_format($totalPagado, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">TOTAL A PAGAR</p>
                        <p class="text-gray-900 font-bold inline-block">{{ number_format($totalAPagar, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">PENDIENTE DE PAGO</p>
                        <p class="text-gray-900 font-bold inline-block">{{ number_format($pendienteDePago, 2) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón para agregar nuevo pago -->
        @if (!$nuevoPago && $pendienteDePago > 0)
            <div class="mt-4">

                <x-form.button rounded="md" positive label="Nuevo" icon="plus" wire:click="agregarPago" />
            </div>
        @endif
    </div>
</x-form.modal.card>
