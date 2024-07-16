<x-form.modal.card title="Crear Rol" blur wire:model.live="openModalSave" align="center" width='6xl'>


    <div class="px-4 md:px-8 py-4 md:py-6">
        <div class="relative w-full text-left mt-3">
            <label for="rol_name"
                class="flex text-sm not-italic items-center font-medium text-gray-800 whitespace-nowrap justify-between">

                <div>
                    Nombre
                    <span class="text-sm text-red-500"> * </span>
                </div>


            </label>
            <div class="flex flex-col mt-1">

                <div class="relative rounded-md shadow-sm font-base">

                    <input id="rol_name" name="rol_name" wire:model.live="name" type="text"
                        class="font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-indigo-400 focus:border-indigo-400"
                        tabindex="0">


                </div>


            </div>
            @error('name')
                <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <div class="flex justify-between">
        <h6 class="text-sm not-italic font-medium text-gray-800 px-4 md:px-8 py-1.5">
            Permisos
            <span class="text-sm text-red-500"> *</span>
        </h6>
        @error('permission')
            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                {{ $message }}
            </p>
        @enderror
        <div class="text-sm not-italic font-medium text-gray-300 px-4 md:px-8 py-1.5">

            <x-form.button label="Seleccionar todo" flat primary spinner="checkAll" wire:click.prevent="checkAll" />
            /
            <x-form.button label="Ninguno" flat primary spinner="uncheckAll" wire:click.prevent="uncheckAll" />

        </div>
    </div>

    @if (app()->environment('local'))
        <div class="px-4 md:px-8 py-4 md:py-6">
            <div class="w-full text-left mt-3">


                <p class="mt-2 peer-invalid:visible text-sm">
                    {{ json_encode($permission) }}
                </p>

            </div>
        </div>
    @endif


    <div class="border-t border-gray-200 py-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 px-8 sm:px-8">
            @foreach ($categorias as $categoria)
                <div class="flex flex-col space-y-1">
                    <p wire:click="checkCategory({{ $categoria->id }})"
                        class="text-sm text-gray-500 border-b border-gray-200 pb-1 mb-2 cursor-pointer">
                        {{ $categoria->nombre }}</p>

                    @foreach ($categoria->permisos as $permiso)
                        <div class="flex">
                            <div class="relative flex items-start" variant="indigo">
                                <x-form.checkbox id="color-positive" wire:model.live="permission"
                                    value="{{ $permiso->name }}" label="{{ $permiso->description }}" positive
                                    rounded="md" />
                            </div>
                        </div>
                    @endforeach

                </div>
            @endforeach

        </div>

    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">

            <div class="flex">
                <x-form.button flat label="Cancelar" x-on:click="close" />
                <x-form.button primary label="Guardar" wire:click="save" />
            </div>
        </div>
    </x-slot>
</x-form.modal.card>
