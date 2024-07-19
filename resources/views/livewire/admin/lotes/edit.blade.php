<x-form.modal.card persistent title="{{ $lote ? $lote->producto->nombre : '' }}" wire:model.live="showModal"
    align="center">

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 sm:col-span-6">

            <x-form.number label="Stock:" wire:model.change="stock" min="1" step="1"
                placeholder="Ingresa stock" />
        </div>

        <div class="col-span-12 sm:col-span-6">


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
