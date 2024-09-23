<div class="px-4 sm:px-6 lg:px-8 py-8 w-full mx-auto">
    <!-- Título y botones de acción -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-xl font-bold text-gray-800 dark:text-slate-100">Listado de cajas</h1>
        <div class="space-x-2 xs:space-y-1 sm:space-x-0">
            <x-form.button primary label="Reporte general" icon="printer" />
            <x-form.button positive label="Aperturar caja chica POS" icon="plus-circle"
                wire:click.prevent="openModalCreate" />
        </div>

    </div>

    <!-- Filtros -->
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/3">
            <x-form.select label="Filtrar por:" placeholder="Selecciona" :options="['Ingresos', 'Egresos']" wire:model="filtro"
                class="rounded" />
        </div>
        <div class="w-1/3">
            <x-form.input label="Buscar" wire:model.live="search" placeholder="Buscar..." class="rounded" />
        </div>
    </div>
    <!-- Tabla -->
    <x-cajas.tabla :cajas="$cajas" />

    <!-- Pagination -->
    <div class="mt-8 w-full">
        {{ $cajas->links() }}

    </div>

</div>
