<x-form.modal.card title="CREAR LOCAL" wire:model.live="showModal" align="center" width="lg" persistent>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 ">

            <x-form.input wire:model.change="nombre" label="Nombre:" placeholder="Escribe el nombre" />

        </div>
        <div class="col-span-12 ">

            <x-form.input wire:model="direccion" label="Dirección:" placeholder="Escribe la direccion" />

        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">

            <div class="flex gap-2">
                <x-form.button flat label="Cancelar" wire:click="close" />
                <x-form.button primary label="Guardar" wire:click.prevent="save" spinner="save" />
            </div>
        </div>
    </x-slot>
</x-form.modal.card>
