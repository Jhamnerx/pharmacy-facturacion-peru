<div class="bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold  dark:text-slate-100">Total usuarios: <span
                class="text-slate-400 dark:text-slate-500 font-medium">{{ $usuarios->total() }}</span>
        </h2>

    </header>
    <div>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-slate-300">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-b border-slate-200 dark:border-slate-700">
                    <tr>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Nombres</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Email</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Roles</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Local</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Estado</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Acciones</div>
                        </th>

                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Row -->
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->email !== 'jhamnerx1x@gmail.com')
                            <tr wire:key='u-{{ $usuario->id }}'>

                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium text-blue-500">{{ $usuario->name }}</div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium ">{{ $usuario->email }}</div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium ">
                                        @if (!empty($usuario->getRoleNames()))
                                            <ul class="list-disc list-inside">
                                                @foreach ($usuario->getRoleNames() as $rolName)
                                                    <li>{{ $rolName }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-medium ">
                                        {{ $usuario->local ? $usuario->local->nombre : 'Sin asignar' }}
                                    </div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div>
                                        <div class="m-3 ">
                                            <div class="flex items-center mt-2" x-data="{ checked: {{ $usuario->estado ? 'true' : 'false' }} }">
                                                <div class="form-switch">
                                                    <input wire:click="toggleStatus({{ $usuario->id }})"
                                                        type="checkbox" id="switch-e{{ $usuario->id }}" class="sr-only"
                                                        x-model="checked" />
                                                    <label class="bg-slate-400" for="switch-e{{ $usuario->id }}">
                                                        <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                                        <span class="sr-only">Estado</span>
                                                    </label>
                                                </div>
                                                <div class="text-sm text-slate-400 italic ml-2"
                                                    x-text="checked ? 'Activo' : 'Inactivo'"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>



                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="space-x-1">

                                        <button wire:click.prevent="openModalEdit({{ $usuario->id }})"
                                            class="text-slate-400 hover:text-slate-500 rounded-full">
                                            <span class="sr-only">Editar</span>
                                            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <path
                                                    d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                            </svg>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($usuarios->count() < 1)
                        <td colspan="6" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                            <div class="text-center">No hay Registros</div>
                        </td>
                    @endif


                </tbody>
            </table>

        </div>
    </div>
</div>
