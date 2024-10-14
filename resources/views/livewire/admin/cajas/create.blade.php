<x-form.modal.card persistent title="Aperturar Caja chica POS" wire:model.live="showModal" align="center">
    <div class="grid grid-cols-12 gap-6">
        <!-- Campo de Vendedor -->
        <div class="col-span-12 sm:col-span-6">
            <x-form.select wire:model.live="user_id" label="Vendedor" placeholder="Selecciona un vendedor"
                :async-data="[
                    'api' => route('api.user.index'),
                    'params' => [
                        'user_id' => auth()->user()->id,
                    ],
                ]" option-label="name" option-value="id" />
        </div>

        <!-- Campo de Número de Referencia -->
        <div class="col-span-12 sm:col-span-6">
            <x-form.input wire:model.live="numero_referencia" label="Número de Referencia"
                placeholder="Escribe el número de referencia" />
        </div>

        <!-- Campo de Saldo Inicial -->
        <div class="col-span-12 sm:col-span-6">
            <x-form.input wire:model.live="monto_inicial" label="Saldo inicial" placeholder="0" type="number" />
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
            <!-- Botones de acciones -->
            <x-form.button flat label="Cancelar" wire:click.prevent="close" />
            <x-form.button primary label="Guardar" wire:click.prevent="save" spinner="save" />
        </div>
    </x-slot>
</x-form.modal.card>
