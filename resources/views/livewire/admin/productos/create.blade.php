<x-form.modal.card title="Registrar Medicamento" wire:model.live="showModal" align="center" persistent width="6xl">
    <div class="grid grid-cols-12 gap-6" x-data="{ activeTab: 'basic-info' }">

        <!-- General -->
        <div class="mb-4 col-span-12">
            <!-- Filters -->
            <div class="mb-2 border-b border-slate-200 dark:border-slate-700 text-sm">
                <ul class="flex border-b" id="tabs">
                    <li @click="activeTab = 'basic-info'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'basic-info' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
                        <a :class="activeTab === 'basic-info' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="javascript: void(0)">General</a>
                    </li>
                    <li @click="activeTab = 'pricing-stock'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'pricing-stock' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
                        <a :class="activeTab === 'pricing-stock' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="javascript: void(0)">Precios y Stock</a>
                    </li>
                    <li @click="activeTab = 'additional-info'"
                        :class="{ 'border-b-2 border-indigo-500': activeTab === 'additional-info' }"
                        class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
                        <a :class="activeTab === 'additional-info' ? 'text-indigo-500' :
                            'text-slate-500 dark:text-slate-400 hover:text-slate-600 dark:hover:text-slate-300'"
                            href="javascript: void(0)">Adicional</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-12">
            <div x-show="activeTab === 'basic-info'">
                <div class="grid grid-cols-12 gap-6">

                    {{-- <div class="col-span-12 md:col-span-2 ">
                        <x-form.input name="codigo" wire:model.live="codigo" label="Codigo (*):"
                            placeholder="Codigo Medicamento" />
                    </div> --}}
                    <div class="col-span-12 lg:col-span-5">
                        <x-form.input required name="nombre" wire:model="nombre" label="Nombre Medicamento (*):"
                            placeholder="Nombre Medicamento" />
                    </div>

                    <div class="col-span-12 lg:col-span-5">
                        <x-form.input name="descripcion" wire:model="descripcion" label="Descripción:"
                            placeholder="Descripcion del producto" />
                    </div>

                    <div class="col-span-12 md:col-span-2">
                        <x-form.select label="Tipo:" wire:model.live="tipo" placeholder="Selecciona" :options="[
                            ['name' => 'Servicio', 'id' => 'servicio'],
                            ['name' => 'Producto', 'id' => 'producto'],
                        ]"
                            option-label="name" option-value="id" :clearable="false" />
                    </div>

                    <div class="col-span-12 md:col-span-3">


                        <x-form.select name="tipo_afectacion" label="Operación" wire:model.live="tipo_afectacion"
                            placeholder="Selecciona una opción" :async-data="route('api.tipo-afectacion.index')" option-label="descripcion"
                            option-value="codigo" :searchable="false" />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-form.select name="unit_code" label="Medida:" wire:model="unit_code"
                            placeholder="Selecciona una opcion" :async-data="route('api.unit.index')" option-label="name"
                            option-value="codigo" />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-form.input name="numero_registro_sanitario" wire:model.live="numero_registro_sanitario"
                            label="N° Reg. Sanitario:" placeholder="N° Reg. Sanitario">
                            <x-slot name="append">
                                <x-form.button wire:click.prevent="searchMedicamento" class="h-full"
                                    icon="magnifying-glass-circle" rounded="rounded-r-md" primary flat />
                            </x-slot>
                        </x-form.input>
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-form.select id="categoria_id" name="categoria_id" label="Categoria (*):"
                            wire:model.live="categoria_id" placeholder="Selecciona una categoria" :async-data="['api' => route('api.categorias.index')]"
                            option-label="nombre" option-value="id" />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-form.input name="forma_farmaceutica" wire:model="forma_farmaceutica" label="F. Farmaceutica:"
                            placeholder="Forma Farmaceutica" />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-form.input name="presentacion" wire:model="presentacion" label="Presentación:"
                            placeholder="Presentación" />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-form.input name="laboratorio" wire:model.live="laboratorio" label="Laboratorio:"
                            placeholder="Laboratorio" />
                    </div>
                    <div class="col-span-6 md:col-span-3 flex items-center justify-center">
                        <x-form.checkbox id="afecto_icbper" md label="Impuesto a la Bolsa Plástica"
                            wire:model.live="afecto_icbper" />
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'pricing-stock'">
                <div class="grid grid-cols-12 gap-6">

                    <div class="col-span-12 md:col-span-2">
                        <x-form.currency name="precio_unitario" label="Precio unitario (*):" placeholder="9.99"
                            icon="currency-dollar" precision="2" wire:model.live="precio_unitario" />
                    </div>

                    <div class="col-span-12 md:col-span-2">
                        <x-form.currency name="precio_minimo" label="Precio Minimo:" placeholder="9.99"
                            icon="currency-dollar" precision="2" wire:model.live="precio_minimo" />
                    </div>

                    <div class="col-span-12 md:col-span-2">
                        <x-form.currency name="costo_unitario" label="Costo Unitario:" placeholder="9.99"
                            icon="currency-dollar" precision="2" wire:model.live="costo_unitario" />
                    </div>

                    <div class="col-span-12 md:col-span-2">
                        <x-form.number name="stock_minimo" wire:model="stock_minimo" label="Stock Minimo:"
                            min="0" />
                    </div>
                    <div class="col-span-12 md:col-span-2">
                        <x-form.number name="stock" wire:model="stock" label="Stock:" min="0" />
                    </div>


                </div>
            </div>

            <div x-show="activeTab === 'additional-info'">
                <div class="grid grid-cols-12 gap-6">

                    <!-- Additional fields for Lot and Expiry Date -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.input name="lote" wire:model.live="lote" label="Lote:" placeholder="Lote" />
                    </div>
                    <div class="col-span-12 md:col-span-3">

                        <x-form.datetime.picker label="Fecha de Vencimiento:" id="fecha_emision"
                            name="fecha_vencimiento" wire:model.live="fecha_vencimiento" :min="now()->subDays(90)"
                            :max="now()->addYear(20)" without-time parse-format="YYYY-MM-DD" display-format="DD-MM-YYYY"
                            :clearable="false" />
                    </div>

                    <div class="col-span-full">
                        <x-section-border />
                    </div>

                    {{-- imagen --}}
                    <div class="col-span-12 md:col-start-3 md:col-end-10" wire:ignore>
                        <input name="imagen" id="imagen" type="file" class="imagen-upload" accept="image/*">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-full">

            <x-errors />
            <x-section-border />
        </div>

        {{-- informacion de busqueda digemdi --}}
        @if ($numero_registro_sanitario == '')
            <div class="col-span-full text-center">
                <span class="flex items-center justify-center text-pink-800">
                    <p class="text-sm">Si desea obtener el registro de Digemid ingresa el N° Registro
                        sanitario y dale a buscar.</p>
                    <x-form.icon name="magnifying-glass-circle" class="w-5 h-5 ml-2" />
                </span>
            </div>
        @endif

        @livewire('admin.productos.digemid', ['numero_registro_sanitario' => $numero_registro_sanitario])

        {{-- fin informacion de busqueda digemdi --}}

        <div class="col-span-full text-center">
            <p class="text-gray-500 text-xs">Ingrese la información adicional del medicamento, como el
                lote y la fecha
                de vencimiento. También puede adjuntar una imagen del medicamento si es necesario.</p>
        </div>

    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
            <div class="flex gap-2">
                <x-form.button flat label="Cancelar" wire:click="closeModal" />
                <x-form.button primary label="Guardar" wire:click="save" wire:click.prevent="save" spinner="save" />
            </div>
        </div>
    </x-slot>
</x-form.modal.card>

@push('scripts')
    <script>
        // Get a file input reference
        const input = document.querySelector(".imagen-upload");

        // Create a FilePond instance
        $(document).ready(function() {
            var imagen = FilePond.create(input, {
                name: 'producto-imagen',
                labelIdle: `Arrastra y suelta tu imagen o <span class="filepond--label-action">Selecciona</span>`,
                maxFiles: 1,
                credits: false,
            });

            imagen.on('addfile', (error, file) => {
                if (error) {
                    console.log('Oh no');
                    return;
                }
                // Encode the file using the FileReader API
                const reader = new FileReader();
                reader.onloadend = () => {
                    // Use a regex to remove data url part
                    const base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
                    @this.set('file', base64String);
                };
                reader.readAsDataURL(file.file);
            });

            Livewire.on('reset-file-imagen', (event) => {

                imagen.removeFile();

            });


        });
    </script>
@endpush
