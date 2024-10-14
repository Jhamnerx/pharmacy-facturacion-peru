<div>
    <div
        class="my-4 container px-10 mx-auto flex flex-col md:flex-row items-start md:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="{{ route('admin.devoluciones.index') }}">
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back w-5 h-5"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                <span class="hidden xs:block ml-2">Atras</span>
            </button>
        </a>
        <div class="mt-2 md:mt-0">
            <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
                REGISTRAR DEVOLUCIONES
            </h4>
            <ul aria-label="current Status"
                class="flex flex-col md:flex-row items-start md:items-center text-gray-600 dark:text-gray-400 text-sm mt-3">
            </ul>
        </div>
    </div>

    <!-- Code block ends -->
    <div class="p-6 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-700 sm:p-6">
            <div class="grid grid-cols-12 gap-2">

                <div class="col-span-12 grid grid-cols-12 md:col-span-6 border-dashed lg:border-r-2 pr-0 md:pr-4 gap-2">

                    <div class="col-span-12 md:col-span-6 lg:col-span-6 mb-3">

                        <x-form.select autocomplete="off" id="invoice_id" name="invoice_id"
                            label="Selecciona un comprobante" wire:model.live="invoice_id"
                            placeholder="Ingrese serie y número" :async-data="[
                                'api' => route('api.invoices.index'),
                            ]" option-label="serie_correlativo"
                            :template="[
                                'name' => 'user-option',
                                'config' => ['src' => 'imagen'],
                            ]" :always-fetch="true" option-value="id"
                            option-description="option_description" empty-message="No se encuentran comprobantes"
                            x-on:selected="$wire.selectInvoice()" x-on:clear="$wire.clearSelected()" />
                    </div>

                    {{-- FECHA EMISION --}}
                    <div class="col-span-12 sm:col-span-6 lg:col-span-5 gap-2">
                        <div class="col-span-12 md:col-span-6">

                            <x-form.datetime.picker label="Fecha de Emision:" wire:model.live="fecha_emision"
                                :min="now()->subDays(1)" :max="now()" without-time parse-format="YYYY-MM-DD"
                                display-format="DD-MM-YYYY" :clearable="false" />
                        </div>
                    </div>

                    <div class="col-span-12 ">

                        <x-form.textarea rows="2" wire:model.live='motivo'
                            label="Motivo o sustento por el cual se emitirá la devolución" />

                    </div>

                </div>

                <div class="col-span-12 grid grid-cols-12 md:col-span-6 border-red-600 lg:pl-6 mb-2 gap-2">
                    <div class="col-span-12 md:col-span-10 border p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Detalles del Comprobante</h3>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Número de Comprobante</h4>

                            <p class="text-lg font-medium">
                                {{ $invoice ? $invoice->serie_correlativo : 'No seleccionado' }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Cliente</h4>
                            <p class="text-lg font-medium">
                                {{ $invoice ? $invoice->cliente->razon_social : 'No disponible' }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Fecha de Emisión</h4>
                            <p class="text-lg font-medium">{{ $invoice ? $invoice->fecha_emision : 'No disponible' }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Monto Total</h4>
                            <p class="text-lg font-medium">{{ $simbolo }}
                                {{ $invoice ? number_format($invoice->total, 2) : '0.00' }}</p>
                        </div>


                    </div>

                </div>

                {{-- componente venta al credito --}}
                <div class="col-span-12 mt-10 pt-4 bg-white shadow-lg rounded-lg px-3">

                    {{-- LISTA DE PRODUCTOS --}}

                    <x-devoluciones.tabla-detalle :items="$items" />

                </div>
            </div>
            {{ json_encode($errors->all()) }}

            <div class="px-4 py-3 text-right sm:px-6 sticky my-2 bg-white border-b border-slate-200">

                <div class="grid sm:grid-cols-2 gap-2 content-end">

                    <div class="text-right col-span-2 ">

                        <x-form.button wire:click.prevent="save" spinner="save" label="REGISTRAR" black md
                            icon="shopping-cart" />
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@section('js')
@endsection
