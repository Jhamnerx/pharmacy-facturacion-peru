<div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-lg ">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Total Cajas <span
                class="text-slate-400 dark:text-slate-500 font-medium">{{ $cajas->total() }}</span>
        </h2>

    </header>
    <div class="overflow-x-auto min-h-screen">
        <table class="table-auto w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        #
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider whitespace-nowrap">
                        # Referencia
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Vendedor
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Apertura
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Cierre
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Saldo inicial
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Saldo final
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Estado
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($cajas as $index => $caja)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $index + 1 }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ $caja->numero_referencia }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ $caja->vendedor->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ $caja->fecha_apertura }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ $caja->fecha_cierre }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ number_format($caja->monto_inicial, 2) }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-300">
                            {{ number_format($caja->monto_final, 2) }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            @if ($caja->estado == 'abierta')
                                <x-form.badge positive label="Aperturada" />
                            @else
                                <x-form.badge negative label="Cerrada" />
                            @endif
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex space-x-1">

                                <x-form.dropdown>
                                    <x-slot name="trigger">
                                        <x-form.button xs label="Reporte" primary />
                                    </x-slot>

                                    <x-dropdown.item label="PDF A4" target="_blank"
                                        href="{{ route('caja.chica.reporte', $caja) }}" />
                                    <x-dropdown.item separator label="Excel" />
                                    <x-dropdown.item separator label="Resumen de Operaciones Diarias" />
                                    <x-dropdown.item separator label="Reporte general caja" />
                                </x-form.dropdown>

                                <x-form.dropdown>
                                    <x-slot name="trigger">
                                        <x-form.button xs label="Reporte Efectivo" primary />
                                    </x-slot>

                                    <x-dropdown.item label="PDF A4" />
                                    <x-dropdown.item separator label="Excel" />
                                    <x-dropdown.item separator label="Ingresos y egresos" />
                                    <x-dropdown.item separator label="Pagos asociados a caja" />
                                </x-form.dropdown>

                                <x-form.button xs positive label="R. Ingreso" />

                                <x-form.button xs success label="Cerrar Caja"
                                    wire:click.prevent="closeCaja({{ $caja->id }})" />
                                <x-form.button xs warning label="Editar"
                                    wire:click.prevent="openModalEdit({{ $caja->id }})" />
                                <x-form.button xs negative label="Eliminar"
                                    wire:click.prevent="deleteCaja({{ $caja->id }})" />
                                <x-form.button xs info label="C. Electrónico" />
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($cajas->count() < 1)
                    <tr>
                        <td colspan="9" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                            <div class="text-center">No hay Registros</div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>


</div>
