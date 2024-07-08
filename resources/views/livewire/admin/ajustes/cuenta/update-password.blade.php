<x-form.modal.card title="Actualizar contraseña" wire:model.live="showModal" align="center">
    <form wire:submit="updatePassword">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-6 sm:col-span-12">

                <x-form.password wire:model.change="state.current_password" label="Contraseña Actual:"
                    autocomplete="current-password" />

            </div>

            <div class="col-span-6 sm:col-span-12">

                <x-form.password wire:model.change="state.password" label="Contraseña Nueva:"
                    autocomplete="new-password" />
            </div>

            <div class="col-span-6 sm:col-span-12">

                <x-form.password wire:model.change="state.password_confirmation" label="Confirmar contraseña:"
                    autocomplete="new-password" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">

                <div class="flex gap-2">
                    <x-form.button flat label="Cancelar" wire:click="close" />
                    <x-form.button type="submit" primary label="Guardar" wire:click.prevent="save" spinner="save" />
                </div>
            </div>
        </x-slot>
    </form>
</x-form.modal.card>
