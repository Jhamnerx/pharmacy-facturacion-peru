<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl 2xl:max-w-full mx-auto ">
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-400 font-bold">Medicamentos ✨</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Search form -->
            <x-search-form placeholder="Buscar Producto" />

            <!-- Add button -->
            @can('productos.crear')
                <button wire:click.prevent="openModalCreate" class="btn bg-teal-500 hover:bg-teal-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Registrar Medicamento</span>
                </button>
            @endcan
        </div>


    </div>

    <!-- More actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Right side -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">



            <!-- Export button -->
            @can('productos.index')
                <div class="relative inline-flex">
                    <x-form.button wire:click.prevent="reporteProductos" primary label="Reporte" icon="clipboard"
                        spinner="reporteProductos" />

                </div>
            @endcan
        </div>

    </div>

    <!-- Table -->
    <x-productos.tabla :productos="$productos" :totales="$totales" />

    <!-- Pagination -->
    <div class="mt-8 w-full">
        {{ $productos->links() }}

    </div>

</div>
