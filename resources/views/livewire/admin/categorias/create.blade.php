<x-form.modal.card persistent title="Crear Categoria" wire:model.live="showModal" align="center">

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6">

            <x-form.input wire:model.change="nombre" label="Nombre:" placeholder="Escribe el nombre" />

        </div>
        <div class="col-span-12 sm:col-span-6">

            <x-form.textarea wire:model="descripcion" label="Descripción:" placeholder="Escribe la descripción" />

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
