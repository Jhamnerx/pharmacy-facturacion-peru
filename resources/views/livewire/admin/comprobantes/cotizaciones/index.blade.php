    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-400 font-bold">COTIZACIONES ✨</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">


                <!-- Search form -->
                <x-search-form placeholder="Buscar Cotizacion" />

                <!-- Create invoice button -->
                @can('cotizaciones.crear')
                    <a href="{{ route('admin.cotizaciones.create') }}">
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                <path
                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                            </svg>
                            <span class="hidden xs:block ml-2">Crear</span>
                        </button>
                    </a>
                @endcan
            </div>

        </div>


        <!-- More actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left side -->
            <div class="mb-4 sm:mb-0 text-slate-500" x-data="{ clickeado: 0 }">
                <ul class="flex flex-wrap -m-1">

                    <li class="m-1">
                        <button wire:click.prevent="status('null')"
                            :class="clickeado === 0 && 'border-transparent shadow-sm bg-indigo-500 text-white'"
                            @click="clickeado = 0"
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-4 py-1 border border-slate-200 hover:border-slate-300 shadow-sm duration-150 ease-in-out">
                            Todas
                            <span class="ml-1 text-indigo-200">{{ $totales['total'] }}</span></button>
                    </li>
                    <li class="m-1">
                        <button wire:click.prevent="status('0')"
                            :class="clickeado === 1 && 'border-transparent shadow-sm bg-indigo-500 text-white'"
                            @click="clickeado = 1"
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-4 py-1 border border-slate-200 hover:border-slate-300 shadow-sm duration-150 ease-in-out">
                            Pendientes
                            <span class="ml-1 text-slate-400">{{ $totales['pendientes'] }}</span></button>
                    </li>
                    <li class="m-1">
                        <button wire:click.prevent="status('1')"
                            :class="clickeado === 2 && 'border-transparent shadow-sm bg-indigo-500 text-white'"
                            @click="clickeado = 2"
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-4 py-1 border border-slate-200 hover:border-slate-300 shadow-sm duration-150 ease-in-out">
                            Aceptadas
                            <span class="ml-1 text-slate-400">{{ $totales['aceptadas'] }}</span></button>
                    </li>
                    <li class="m-1">
                        <button wire:click.prevent="status('2')"
                            :class="clickeado === 3 && 'border-transparent shadow-sm bg-indigo-500 text-white'"
                            @click="clickeado = 3"
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-4 py-1 border border-slate-200 hover:border-slate-300 shadow-sm duration-150 ease-in-out">
                            Rechazadas
                            <span class="ml-1 text-slate-400">{{ $totales['rechazadas'] }}</span></button>
                    </li>
                </ul>
            </div>

            <!-- Right side -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <!-- Eliminar button -->
                <div class="table-items-action hidden">
                    <div class="flex items-center">
                        <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span
                                class="table-items-count"></span> Items Seleccionados</div>
                        <button
                            class="btn bg-white border-slate-200 hover:border-slate-300 text-rose-500 hover:text-rose-600">Eliminar</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- Table -->
        <x-ventas.cotizaciones :presupuestos="$presupuestos" />

        <!-- Pagination -->
        <div class="mt-8">
            {{ $presupuestos->links() }}
        </div>

    </div>
