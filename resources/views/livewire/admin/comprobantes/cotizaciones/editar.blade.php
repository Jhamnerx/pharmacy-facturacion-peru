<div>
    <div
        class="my-4 container px-10 mx-auto flex flex-col md:flex-row items-start md:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="{{ route('admin.cotizaciones.index') }}">
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
            <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">ACTUALIZAR COTIZACION</h4>
            <ul aria-label="current Status"
                class="flex flex-col md:flex-row items-start md:items-center text-gray-600 dark:text-gray-400 text-sm mt-3">
            </ul>
        </div>
    </div>
    <!-- Code block ends -->
    <div class="p-2 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-slate-100 dark:bg-gray-700 sm:p-2">
            <div class="grid grid-cols-12 gap-2">
                {{-- COLUMNA IZQUIERDA --}}
                <div class="col-span-12">
                    {{-- PRIMERA FILA --}}
                    <div
                        class="grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        {{-- LOGO --}}
                        <div class="col-span-12 lg:col-span-2">
                            <div>
                                <img src="{{ Storage::url($empresa->logo) }}">
                            </div>
                        </div>

                        {{-- DATOS DE LA EMPRESA --}}
                        <div
                            class="col-span-12 lg:col-span-4 xl:col-span-4 pl-6 self-center overflow-hidden text-ellipsis">
                            <div class="mb-0" style="line-height: initial;">
                                <span class="font-bold text-slate-800 dark:text-gray-200">
                                    {{ $empresa->nombre_comercial }}
                                </span>
                                <br>
                                <span class="text-slate-600 dark:text-gray-400">{{ $empresa->correo }}</span>
                            </div>
                        </div>

                        {{-- FECHAS --}}
                        <div class="col-span-12 lg:col-span-6 self-end">

                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <x-form.datetime.picker label="Fec. Emision:" id="fecha_emision"
                                        name="fecha_emision" wire:model.live="fecha_emision" without-time
                                        parse-format="YYYY-MM-DD" display-format="DD-MM-YYYY" :clearable="false" />
                                </div>

                                <div class="col-span-6">
                                    <x-form.datetime.picker label="Fec. Vencimiento:" id="fecha_vencimiento"
                                        name="fecha_vencimiento" wire:model.live="fecha_vencimiento" without-time
                                        parse-format="YYYY-MM-DD" display-format="DD-MM-YYYY" :clearable="false" />
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- SEGUNDA FILA --}}
                    <div
                        class="col-span-12 md:col-span-9 grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        <div class="col-span-12 xs:col-span-4">

                            <x-form.input value="COTIZACIÓN" readonly label="Tipo comprobante:" />
                        </div>

                        {{-- SERIE --}}
                        <div class="col-span-12 xs:col-span-4 xl:col-span-3">
                            <x-form.select id="serie" name="serie" label="Serie:" wire:model.live="serie"
                                placeholder="Selecciona una serie" :options="$series" option-label="serie"
                                option-value="serie" :clearable="false" />
                        </div>

                        {{-- CORRELATIVO --}}
                        <div class="col-span-12 xs:col-span-4 xl:col-span-2">
                            <x-form.number readonly id="correlativo" name="correlativo" wire:model.live="correlativo"
                                label="Correlativo:" />
                        </div>

                        {{-- MONEDA --}}
                        <div class="col-span-12 xs:col-span-6 xl:col-span-3">
                            <x-form.select label="Divisa:" id="divisa" name="divisa" :options="[['name' => 'SOLES', 'id' => 'PEN'], ['name' => 'DOLARES', 'id' => 'USD']]"
                                option-label="name" option-value="id" wire:model.live="divisa" :clearable="false"
                                icon='currency-dollar' />
                        </div>


                        <div class="col-span-12 xs:col-span-6 xl:col-span-3">
                            <x-form.select id="forma_pago" name="forma_pago" label="Forma Pago:" :options="[
                                ['name' => 'CONTADO', 'id' => 'CONTADO'],
                                ['name' => 'CREDITO', 'id' => 'CREDITO'],
                            ]"
                                option-label="name" option-value="id" wire:model.live="forma_pago" :clearable="false" />
                        </div>

                    </div>

                    <div
                        class="col-span-12 md:col-span-9 grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        <div class="col-span-12 md:col-span-6">
                            <x-form.select autocomplete="off" id="cliente_id" name="cliente_id"
                                label="Selecciona un cliente:" wire:model.live="cliente_id" :clearable="false"
                                placeholder="Escriba el nombre o número de documento del cliente" :async-data="[
                                    'api' => route('api.clientes.index'),
                                    'params' => [
                                        'tipo_comprobante' => $tipo_comprobante_id,
                                        'local_id' => session('local_id'),
                                    ],
                                ]"
                                option-label="razon_social" option-value="id" option-description="numero_documento"
                                x-on:clear="$wire.direccion = ''">
                                <x-slot name="afterOptions" class="p-2 flex justify-center"
                                    x-show="displayOptions.length === 0">
                                    <x-form.button wire:click.prevent="OpenModalCliente(`${search}`)" primary flat full>
                                        <span x-html="`Crear cliente <b>${search}</b>`"></span>
                                    </x-form.button>
                                </x-slot>
                            </x-form.select>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <x-form.input autocomplete="off" id="direccion" name="direccion" label="Direccion:"
                                wire:model.live="direccion" placeholder="Ingresa direccion" />
                        </div>
                    </div>
                </div>
                {{-- componente venta al credito --}}
                @if ($showCredit)
                    <div
                        class="col-span-12 xl:col-span-6 grid grid-cols-12 gap-2 bg-white items-start border border-gray-300 rounded-md m-3">

                        <x-ventas.cotizaciones.detalle-cuotas-table :cuotas="$detalle_cuotas" :totalcuotas="$total_cuotas">
                        </x-ventas.cotizaciones.detalle-cuotas-table>

                    </div>
                    @if (app()->environment('local'))
                        {{ $total_cuotas }} - {{ $total }}
                    @endif
                @endif
            </div>
        </div>



        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-700 sm:p-1">
            @error('tipo_cambio')
                <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                    {{ $message }}
                </p>
            @enderror

            <div class="grid grid-cols-12 gap-2">

                <div class="col-span-12 mt-2 pt-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg px-3">

                    <div class="grid grid-cols-5 gap-2 mt-2 pt-2 pb-2 px-3 mb-2">

                        <div class="col-span-6 sm:col-span-2">

                            <x-form.button wire:click="openModalAddProducto" label="AÑADIR PRODUCTO" primary md
                                icon="plus">
                                <x-slot name="append" wire:ignore>
                                    <x-form.badge white label="F2" />
                                </x-slot>
                            </x-form.button>

                        </div>

                    </div>

                    {{-- LISTA DE PRODUCTOS --}}

                    <x-ventas.tabla-detalle :items="$items" :prepayments="$prepayments" :tipo="$tipo_comprobante_id">

                    </x-ventas.tabla-detalle>

                    <div class="block md:flex gap-2">
                        {{-- LADO IZQUIERDO --}}
                        <div class="grid grid-cols-12 gap-4 w-full px-4 mx-4 py-2 ml-auto mt-5">

                            {{-- TIPO DESCUENTO --}}
                            <div class="col-span-12 border-b border-cyan-600">
                                <h4 class="font-semibold">DESCUENTO</h4>
                            </div>

                            <div class="col-span-12 md:col-span-12">

                                <div class="flex flex-wrap gap-4">
                                    <div class="mt-2 flex gap-5">
                                        <x-form.radio value="cantidad" id="left-label" md left-label="S/"
                                            wire:model.live="tipo_descuento" />
                                        {{-- <x-radio value="porcentaje" id="right-label" md label="%"
                                            wire:model.live="tipo_descuento" /> --}}
                                    </div>


                                    <x-form.currency id="descuento_monto" name="descuento_monto"
                                        icon="currency-dollar" placeholder="Monto descuento"
                                        wire:model.blur="descuento_monto" precision="2" />
                                    @if (app()->environment('local'))
                                        {{ $descuento_monto }}-{{ $descuento }} -{{ $descuento_factor }}
                                    @endif
                                </div>

                            </div>

                            {{-- FORMA DE PAGO --}}
                            <div class="col-span-12 md:col-span-6">

                                <x-form.select id="metodo_pago_id" name="metodo_pago_id" label="MÉTODO DE PAGO:"
                                    :options="[
                                        ['name' => 'En efectivo', 'id' => '009'],
                                        ['name' => 'Depósito en cuenta', 'id' => '001'],
                                        ['name' => 'Tarjeta de débito', 'id' => '005'],
                                        ['name' => 'Tarjeta de crédito', 'id' => '006'],
                                        ['name' => 'Transferencia bancaria', 'id' => '003'],
                                        ['name' => 'Giro', 'id' => '002'],
                                        ['name' => 'Otros medios de pago', 'id' => '999'],
                                    ]" option-label="name" option-value="id"
                                    wire:model.live="metodo_pago_id" :clearable="false" />

                            </div>

                            {{-- COMENTARIO --}}
                            <div class="col-span-12">

                                <x-form.textarea label="Comentario:" id="comentario" name="comentario"
                                    wire:model.live="comentario" placeholder="Escribe tu comentario" />
                            </div>

                        </div>

                        {{-- DIV PARA SUB Y TOTALES DERECHA --}}
                        <div class="py-2 ml-auto mt-5 w-full mx-4">
                            <div class="text-right mb-4 border-b border-gray-300 dark:border-gray-700">
                                <h4 class="font-semibold text-gray-900 dark:text-gray-200">RESUMEN</h4>
                            </div>

                            <div class="flex justify-between ">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    SUB TOTAL</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        {{ $simbolo }} <span>{{ round($sub_total, 2) }}</span>
                                    </div>
                                </div>
                            </div>


                            <div class="flex justify-between mt-2">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    OP. GRAVADAS</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        {{ $simbolo }} <span>{{ round($op_gravadas, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            @if ($op_exoneradas > 0)
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. EXONERADAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            {{ $simbolo }} <span>{{ round($op_exoneradas, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($op_inafectas > 0)
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. INAFECTAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            {{ $simbolo }} <span>{{ round($op_inafectas, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($op_gratuitas > 0)
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. GRATUITAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            {{ $simbolo }} <span>{{ round($op_gratuitas, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="flex justify-between mt-2">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    DESCUENTO (-)</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        {{ $simbolo }} <span>{{ round($descuento, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mb-4 mt-2">
                                <div class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                    IGV(18%)</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">{{ $simbolo }}
                                        <span>{{ round($igv, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mb-4 mt-2">
                                <div class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                    ICBPER</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">{{ $simbolo }}
                                        <span>{{ number_format($icbper, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2 border-t border-b border-indigo-500 dark:border-gray-700">
                                <div class="flex justify-between">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                        Importe Total</div>
                                    <div class="text-right w-40">
                                        <div class="text-xl text-gray-800 font-bold dark:text-gray-300">
                                            {{ $simbolo }}<span>{{ round($total, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @if (app()->environment('local'))
                {{ json_encode($errors->all()) }}
            @endif

            <div
                class="px-4 py-3 text-right sm:px-6 sticky my-2 bg-white dark:bg-gray-800 border-b border-slate-200 dark:border-slate-900 z-5">
                <div class="grid { gap-2 content-end">

                    <div class="text-center md:text-right">
                        <x-form.button wire:click.prevent="save" spinner="save" label="Actualizar" black md
                            icon="shopping-cart" />
                    </div>
                </div>
            </div>


        </div>

    </div>
    <livewire:admin.productos.modal-add-producto :deduce_anticipos="$deduce_anticipos" :comprobante_slug="$comprobante_slug" :divisa="$divisa"
        :tipo_comprobante_id="$tipo_comprobante_id" key="producto-add-">

</div>

@push('scripts')
    <script>
        document.addEventListener('keydown', function(event) {
            try {
                if (event.key === 'F2') {
                    // Ejecutar la acción deseada
                    ejecutarAccion();
                    // Prevenir la acción por defecto de la tecla F2 (renombrar en el Explorador de archivos de Windows)
                    event.preventDefault();
                }
            } catch (error) {
                console.error('Se produjo un error al presionar la tecla F2:', error);
            }
        });

        function ejecutarAccion() {
            // Aquí va la lógica de la acción a ejecutar
            @this.openModalAddProducto();
            console.log('Tecla F2 presionada. Acción ejecutada.');
        }
    </script>
@endpush
