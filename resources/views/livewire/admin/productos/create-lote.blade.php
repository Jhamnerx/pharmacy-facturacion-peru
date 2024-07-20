<x-form.modal.card persistent title="{{ $producto ? $producto->nombre : '' }}" wire:model.live="showModal" align="center">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 sm:col-span-6">
            <x-form.select autocomplete="off" id="proveedor_id" name="proveedor_id" label="Selecciona un Proveedor:"
                wire:model.live="proveedor_id" :clearable="false"
                placeholder="Escriba el nombre o número de documento del proveedor" :async-data="[
                    'api' => route('api.proveedores.index'),
                ]"
                option-label="razon_social" option-value="id" option-description="numero_documento">

            </x-form.select>
        </div>

        <div class="col-span-12 sm:col-span-6">

            <x-form.number label="Stock:" wire:model.change="stock" min="1" step="1"
                placeholder="Ingresa stock" />
        </div>

        <div class="col-span-12 md:col-span-6">
            <x-form.input name="codigo_lote" wire:model.live="codigo_lote" label="Lote:" placeholder="Lote" />
        </div>

        <div class="col-span-12 md:col-span-6">

            <x-form.datetime.picker label="Fec. Vencimiento:" id="fecha_vencimiento" name="fecha_vencimiento"
                wire:model.live="fecha_vencimiento" :min="now()->subYears(5)" without-time parse-format="YYYY-MM-DD"
                display-format="DD-MM-YYYY" :clearable="false" />

        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">

            <div class="flex">
                <x-form.button flat label="Cancelar" wire:click.prevent="closeModal" />
                <x-form.button primary label="Guardar Cambios" wire:click.prevent="save" spinner="save" />
            </div>
        </div>
    </x-slot>
</x-form.modal.card>
