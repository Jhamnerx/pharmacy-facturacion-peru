<div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Roles ✨</h1>
            <span>Configura los roles y permisos de esta empresa</span>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Search form -->
            <form class="relative">
                <label for="action-search" class="sr-only">Search</label>
                <input wire:model.live="search" id="action-search" class="form-input pl-9 focus:border-slate-300"
                    type="search" placeholder="Buscar Rol por Nombre…" />
                <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                        <path
                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                    </svg>
                </button>
            </form>

            <!-- Create button -->

            <button wire:click.prevent="openModalSave" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="hidden xs:block ml-2">Crear Rol</span>
            </button>



        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <!-- Table header -->
            <thead
                class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                <tr>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Rol</div>
                    </th>

                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold">Acciones</div>
                    </th>

                </tr>
            </thead>
            <!-- Table body -->
            <tbody class="text-sm divide-y divide-slate-200">
                <!-- Row -->

                @foreach ($roles as $rol)
                    <tr>

                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="text-left">{{ $rol->name }}</div>
                        </td>

                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                            <div class="space-x-1">

                                <button wire:click.prevent="openModalEdit({{ $rol->id }})"
                                    class="text-slate-400 hover:text-slate-500 rounded-full">
                                    <span class="sr-only">Editar</span>
                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                        <path
                                            d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                    </svg>
                                </button>



                                {{-- <button class="text-rose-500 hover:text-rose-600 rounded-full">
                                    <span class="sr-only">Eliminar</span>
                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                        <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                        <path
                                            d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                    </svg>
                                </button> --}}

                            </div>
                        </td>

                    </tr>
                @endforeach

                @if ($roles->isEmpty())
                    <tr>
                        <td colspan="2" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                            <div class="text-center">No hay Registros</div>
                        </td>
                    </tr>
                @endif


            </tbody>
        </table>

    </div>
    <div class="mt-8
                            w-full">
        {{ $roles->links() }}

    </div>
</div>
