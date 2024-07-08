<x-form.modal.card title="Editar Usuario" wire:model.live="showModal" align="center" width="xl">

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-6">

            <x-form.input wire:model.change="name" label="Nombre (*):" />

        </div>
        <div class="col-span-12 sm:col-span-6">

            <x-form.input wire:model.live="email" type="email" label="Correo Electronico (*):" />

        </div>
        <div class="col-span-12 sm:col-span-6">

            <x-form.password label="Contraseña 🙈" wire:model.live="password"
                placeholder="Ingresa tu contraseña (*):" />
        </div>
        <div class="col-span-12 sm:col-span-6">

            <x-form.password label="Confirma tu Contraseña" wire:model.live="password_confirmation"
                placeholder="Confirma tu contraseña (*):" />
        </div>

        <div class="col-span-12 md:col-span-6">

            <x-form.select label="Rol (*):" wire:model.live="roles_id" placeholder="Selecciona" :options="$roles"
                option-label="name" option-value="id" :clearable="false" :searchable="false" multiselect />

        </div>
        <div class="col-span-12 md:col-span-6">

            <x-form.select label="Asignar Local (*):" wire:model.live="local_id" placeholder="Selecciona"
                :options="$locales" option-label="nombre" option-value="id" :clearable="false" :searchable="false" />

        </div>

    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
            <div class="flex gap-2">
                <x-form.button flat label="Cancelar" wire:click="closeModal" />
                <x-form.button primary label="Guardar" wire:click.prevent="save" spinner="save" />
            </div>
        </div>
    </x-slot>

</x-form.modal.card>
