<div>

    <div
        class="my-4 container px-10 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="{{ route('admin.ventas.index') }}">
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back w-5 h-5"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                <span class="hidden xs:block ml-2">Ver Ventas</span>
            </button>
        </a>
        <div class="mt-2 lg:mt-0">
            <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
                PUNTO DE VENTA

                <ul aria-label="current Status"
                    class="flex flex-col lg:flex-row items-start lg:items-center text-gray-600 dark:text-gray-400 text-sm mt-3">
                </ul>
        </div>
    </div>
    <div class="p-2 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-slate-100 dark:bg-gray-700 sm:p-2">
            <!-- Page header -->
            {{-- <div
                class="flex flex-wrap justify-between items-center bg-white dark:bg-gray-800 p-1 border rounded-md m-3">
                <!-- Exchange Rate -->
                <div class="w-full text-right p-1">
                    <p class="text-gray-900 dark:text-gray-300 text-sm">
                        T.C. <span>S/ 3.814</span> Cambiar Moneda
                        <button
                            class="ml-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300 px-2 py-1 rounded">
                            <strong>S/</strong>
                        </button>
                    </p>
                </div>
            </div> --}}

            <div class="grid grid-cols-12 gap-4 m-3">
                {{-- IZQUIERDA PRODUCTOS Y BUSCADOR --}}
                <div class="col-span-12 xl:col-span-8">

                    <div class="grid grid-cols-12 gap-2">
                        {{-- BUSCADOR --}}
                        <div class="col-span-12">
                            <x-form.input placeholder="Buscar producto" wire:model.live="search">
                                <x-slot name="append">
                                    <x-form.button class="h-full" icon="plus" rounded="rounded-r-md" primary flat />
                                </x-slot>
                            </x-form.input>
                        </div>
                        {{-- CATEGORIAS FILA --}}
                        <div class="col-span-12 lg:col-start-3 lg:col-end-11" x-data="{ active: 0, loadMore() { @this.call('loadMore') } }"
                            x-init="$el.querySelector('.category-container').addEventListener('scroll', function() {
                                let container = $el.querySelector('.category-container');
                                if (container.scrollWidth - container.scrollLeft <= container.clientWidth + 100) {
                                    loadMore();
                                }
                            })">

                            <div
                                class="flex justify-start space-x-4 p-1 lg:p-2 overflow-x-auto pb-3 category-container">
                                <button @click="active = 0" wire:click="getProductos(null)"
                                    :class="{
                                        'border-2 border-cyan-700 bg-cyan-600 shadow-md': active === 0
                                    }"
                                    class="whitespace-nowrap rounded-md bg-gradient-to-r from-blue-500 to-blue-800 px-2 lg:px-4 py-1 lg:py-3 text-white">
                                    Todos
                                </button>
                                @foreach ($categorias as $categoria)
                                    <button @click="active = {{ $categoria->id }}"
                                        wire:click="getProductos({{ $categoria->id }})"
                                        :class="{
                                            'border-2 border-cyan-700 bg-cyan-600 shadow-md': active ===
                                                {{ $categoria->id }}
                                        }"
                                        class="whitespace-nowrap rounded-md bg-gradient-to-r from-blue-500 to-blue-800 px-2 lg:px-4 py-1 lg:py-3 text-white">

                                        {{ $categoria->nombre }}
                                    </button>
                                @endforeach
                            </div>
                            @if ($categorias->hasMorePages())
                                <div class="flex justify-center mt-4">
                                    <button wire:click="loadMore" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Cargar más
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="col-span-12 grid grid-cols-12 gap-2">
                            {{-- <div
                                class="col-span-6 md:col-span-4 lg:col-span-3 relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                                <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                                    <img class="object-cover"
                                        src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                        alt="product image" />
                                    <span
                                        class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39%
                                        OFF</span>
                                </a>
                                <div class="mt-4 px-5 pb-5">
                                    <a href="#">
                                        <h5 class="text-xl tracking-tight text-slate-900">Nike Air MX Super 2500 - Red
                                        </h5>
                                    </a>
                                    <div class="mt-2 mb-5 flex items-center justify-between">
                                        <p>
                                            <span class="text-3xl font-bold text-slate-900">$449</span>
                                            <span class="text-sm text-slate-900 line-through">$699</span>
                                        </p>
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <span
                                                class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">5.0</span>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Add to cart</a>
                                </div>
                            </div> --}}
                            @foreach ($productos as $producto)
                                <div
                                    class="col-span-6 md:col-span-4 lg:col-span-3 relative flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                                        <img class="object-cover"
                                            src="{{ $producto->imagen ? Storage::url($producto->image->url) : Storage::url('productos/default.png') }}"
                                            alt="product image" />
                                        <span
                                            class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">{{ $producto->stock }}</span>
                                    </a>
                                    <div class="mt-4 px-2 lg:px-5 pb-5">
                                        <a href="#">
                                            <h5
                                                class="text-lg lg:text-xl tracking-tight text-slate-900 dark:text-white">
                                                {{ $producto->nombre }}
                                                {{ $producto->forma_farmaceutica ? '-' . $producto->forma_farmaceutica : '' }}
                                            </h5>
                                        </a>

                                        <div class="mt-2 mb-5 text-sm lg:text-base">
                                            <div class="flex flex-col xl:flex-row justify-between">

                                                <p class="flex items-center mb-2 lg:mb-0">
                                                    <span
                                                        class="text-xl lg:text-1xl font-bold text-slate-900 dark:text-white">${{ $producto->precio_unitario }}</span>
                                                    <span
                                                        class="ml-2 text-xs lg:text-sm text-slate-900 line-through dark:text-gray-300">${{ $producto->precio_minimo }}</span>
                                                </p>
                                                @if ($producto->numero_registro_sanitario)
                                                    <div class="flex items-center">

                                                        <span
                                                            class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold dark:bg-yellow-300">{{ $producto->numero_registro_sanitario }}</span>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 px-2 lg:px-5 pb-5">

                                        <a href="#" wire:click.prevent="addToCart({{ $producto->id }})"
                                            class="flex items-center justify-center rounded-md bg-slate-900 px-3 lg:px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span class="hidden lg:inline">Añadir al carrito</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Pagination -->
                            <div class="mt-8 col-span-full">
                                {{ $productos->links() }}

                            </div>
                        </div>
                    </div>

                </div>


                {{-- DERECHA CARRITO Y TOTAL --}}
                <div
                    class="col-span-12 xl:col-span-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-slate-300 dark:border-gray-900 p-2">

                    <div class="grid grid-cols-12 gap-2">

                        <div class="col-span-12">
                            <div class="overflow-x-auto rounded-lg">

                                <table class="w-full">
                                    <thead
                                        class="text-xs font-semibold uppercase text-white bg-gradient-to-r from-slate-800 to-indigo-500 border-t border-b rounded-lg border-slate-200 dark:border-slate-600 dark:bg-gradient-to-r dark:from-slate-900 dark:to-indigo-600">
                                        <tr>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">DESCRIPCION</div>
                                            </th>

                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">CANTIDAD</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">PRECIO</div>
                                            </th>

                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">IMPORTE DE TOTAL</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">BORRAR</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="text-xs divide-y divide-slate-300 dark:divide-gray-900 border border-slate-300 dark:border-gray-900">

                                        @if ($cart)

                                            {{-- @if (app()->environment('local'))
                                                <tr class="main bg-slate-100 dark:bg-slate-800">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3" colspan="4">
                                                        <div class="font-medium text-sm text-left">
                                                            {{ json_encode($cart) }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif --}}
                                            @foreach ($cart as $clave => $item)
                                                <tr class="main bg-slate-100 dark:bg-slate-800"
                                                    wire:key="item-{{ $clave }}">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-medium text-sm text-left">
                                                            {{ $item['descripcion'] }}
                                                        </div>


                                                        <small>{{ $item['unit'] }}</small>
                                                    </td>

                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-2">

                                                        {{-- <x-form.input class="text-right text-base"
                                                        wire:model.live.debounce.500ms="quantities.{{ $item->rowId }}"
                                                        wire:change="updateQuantity('{{ $item->rowId }}', $event.target.value)" /> --}}
                                                        <input type="text" class="form-input w-20"
                                                            wire:model.live="cart.{{ $item['rowId'] }}.qty"
                                                            wire:change="updateQuantity('{{ $item['rowId'] }}', $event.target.value)">
                                                    </td>

                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-32">
                                                        <x-form.currency id="total" name="total"
                                                            wire:model.blur="cart.{{ $item['rowId'] }}.precio_unitario"
                                                            precision="2" />
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-32">

                                                        <div class="font-medium text-sm text-left">
                                                            {{ $item['total'] }}
                                                        </div>
                                                    </td>

                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <div class="space-x-1">

                                                            <x-form.button
                                                                wire:click.prevent="removeItem('{{ $item['rowId'] }}')"
                                                                outline red sm icon="trash" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if (Cart::count() <= 0)
                                            <tr>
                                                <td colspan="4"
                                                    class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                                    <div class="text-center">Añade productos al carrito </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <x-section-border />


                        </div>
                        <div class="col-span-9">
                            <x-form.select autocomplete="off" id="cliente_id" name="cliente_id"
                                wire:model.live="cliente_id"
                                placeholder="Escriba el nombre o número de documento del cliente" :async-data="[
                                    'api' => route('api.clientes.index'),
                                ]"
                                option-label="razon_social" option-value="id" option-description="numero_documento">

                                <x-slot name="afterOptions" class="p-2 flex justify-center"
                                    x-show="displayOptions.length === 0">
                                    <x-form.button wire:click.prevent="OpenModalSaveCliente(`${search}`)"
                                        x-on:click="close" primary flat full>
                                        <span x-html="`Crear cliente <b>${search}</b>`"></span>
                                    </x-form.button>
                                </x-slot>

                            </x-form.select>
                        </div>

                        <div class="col-span-3 flex items-center justify-center">
                            <x-form.button icon="plus" positive />
                        </div>
                        @if (app()->environment('local'))
                            <div class="col-span-12">
                                <div class="w-full">
                                    {{ $cliente }}
                                </div>
                            </div>
                        @endif

                        <div class="col-span-12">
                            <div class="py-2 ml-auto mt-5 w-full mx-4">
                                <div class="text-right mb-4 border-b border-gray-300 dark:border-gray-700">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">RESUMEN</h4>
                                </div>

                                <div class="flex justify-between">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                        SUB TOTAL</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            {{ $simbolo }} <span>{{ round($sub_total, 2) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                        OP. GRAVADAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            {{ $simbolo }} <span>{{ round($op_gravadas, 2) }}</span>
                                        </div>
                                    </div>
                                </div>

                                @if ($op_exoneradas > 0)
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. EXONERADAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                {{ $simbolo }} <span>{{ round($op_exoneradas, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($op_inafectas > 0)
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. INAFECTAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                {{ $simbolo }} <span>{{ round($op_inafectas, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($op_gratuitas > 0)
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. GRATUITAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                {{ $simbolo }} <span>{{ round($op_gratuitas, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex justify-between mb-4 mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                        IGV(18%)</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            {{ $simbolo }} <span>{{ round($igv, 2) }}</span>
                                        </div>
                                    </div>
                                </div>

                                @if ($icbper > 0)
                                    <div class="flex justify-between mb-4 mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                            ICBPER</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                {{ $simbolo }} <span>{{ number_format($icbper, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                        TOTAL A COBRAR</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            {{ $simbolo }} <span>{{ round($total, 2) }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="py-2">
                                    <div class="flex justify-between">
                                        @if ($cart->count() > 0)
                                            <x-form.button wire:click.prevent="nextStep" class="w-full" md warning
                                                label="PAGAR {{ $simbolo }} {{ round($total, 2) }}"
                                                right-icon="arrow-right" />
                                        @else
                                            <x-form.button disabled class="w-full" md warning
                                                label="AÑADE PRODUCTOS AL CARRITO" right-icon="arrow-right" />
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- MODAL DE PAGAR --}}
    <x-form.modal.card title="Resumen de venta" width="7xl" wire:model.live="showModal" align="center"
        persistent>

        <div>
            <div class="p-2 shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-2 bg-slate-100 dark:bg-gray-700 sm:p-2">
                    <div class="grid grid-cols-12 gap-8 m-3">

                        <div class="col-span-12">
                            <div class="grid grid-cols-12 justify-center pt-2 lg:mx-4 gap-3">
                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="flex flex-col lg:flex-row justify-between gap-6">
                                            {{-- <x-form.button wire:click="previousStep" label="Regresar" warning md icon="chevron-left" /> --}}
                                            <div class="w-full lg:w-1/3">
                                                <x-form.select id="serie" name="serie" wire:model.live="serie"
                                                    placeholder="Selecciona una serie" :options="$series"
                                                    option-label="serie" option-value="serie" :clearable="false" />
                                            </div>

                                            <div class="w-full lg:w-1/3">
                                                <x-form.select id="metodo_pago_id" name="metodo_pago_id"
                                                    :options="[
                                                        ['name' => 'En efectivo', 'id' => '009'],
                                                        ['name' => 'Depósito en cuenta', 'id' => '001'],
                                                        ['name' => 'Tarjeta de débito', 'id' => '005'],
                                                        ['name' => 'Tarjeta de crédito', 'id' => '006'],
                                                        ['name' => 'Transferencia bancaria', 'id' => '003'],
                                                        ['name' => 'Giro', 'id' => '002'],
                                                    ]" option-label="name" option-value="id"
                                                    wire:model.live="metodo_pago_id" :clearable="false" />
                                            </div>
                                            <div
                                                class="flex justify-center md:flex-row md:space-x-2 border dark:border-gray-600 rounded-lg overflow-hidden w-full lg:w-1/3 items-center md:items-start">
                                                @if ($cliente->tipo_documento_id == '6')
                                                    <button wire:click="setTipoComprobante('01')" disabled
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 @if ($tipo_comprobante_id == '01') bg-blue-500 text-white @endif">
                                                        FACTURA
                                                    </button>
                                                @else
                                                    <button wire:click="setTipoComprobante('01')" disabled
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 @if ($tipo_comprobante_id == '01') bg-blue-500 text-white @endif">
                                                        FACTURA
                                                    </button>
                                                @endif

                                                <button wire:click="setTipoComprobante('03')"
                                                    class="px-4 py-2 text-gray-700 dark:text-gray-300 @if ($tipo_comprobante_id == '03') bg-blue-500 text-white @endif">
                                                    BOLETA
                                                </button>

                                                <button wire:click="setTipoComprobante('02')"
                                                    class="px-4 py-2 text-gray-700 dark:text-gray-300 @if ($tipo_comprobante_id == '02') bg-blue-500 text-white @endif">
                                                    N. VENTA
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (app()->environment('local'))
                                    <div class="col-span-12 mt-2">
                                        <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                            <p class="my-0 text-sm text-gray-700 dark:text-gray-300">
                                                {{ $serie }} - {{ $correlativo }} | {{ $serie_correlativo }}
                                                - Tipo:
                                                {{ $tipo_comprobante_id }}
                                            </p>

                                        </div>
                                    </div>
                                @endif


                                <div class="col-span-12 mt-2">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                        <p class="my-0 text-sm text-gray-700 dark:text-gray-300">Monto a cobrar</p>
                                        <h1 class="mb-2 mt-0 text-2xl text-gray-900 dark:text-gray-100">S/
                                            {{ $total }}</h1>
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="grid grid-cols-12 gap-4 text-center">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <label class="block text-gray-700 dark:text-gray-300">Ingrese
                                                        monto</label>
                                                    <div class="relative">

                                                        <x-form.currency wire:model.live="pago" placeholder="100"
                                                            precision="2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <label
                                                        class="block text-gray-700 dark:text-gray-300">Vuelto</label>
                                                    <h4
                                                        class="text-lg font-semibold text-gray-900 dark:text-gray-100 m-0">
                                                        S/ {{ round($vuelto, 2) }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (app()->environment('local'))
                                    <div class="col-span-12 mt-2">
                                        <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                            <p class="my-0 text-sm text-gray-700 dark:text-gray-300">
                                                {{ $pago }} - {{ $total }} - vuelto:
                                                {{ $vuelto }}
                                            </p>

                                        </div>
                                    </div>
                                @endif

                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="grid grid-cols-12 gap-4 text-center">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    {{ $app_descuento }}
                                                    <x-form.toggle id="color-positive" name="app_decuento"
                                                        wire:model.live="app_descuento" label="Aplicar descuento"
                                                        positive xl value="true" />
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <div class="relative">
                                                        @if ($app_descuento)
                                                            <x-form.currency wire:model.blur="descuento_monto"
                                                                placeholder="Ingresa desc." precision="2" />
                                                        @else
                                                            <x-form.currency wire:model.blur="descuento_monto"
                                                                placeholder="Ingresa desc." precision="2" disabled />
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            {{ $descuento_monto }}-{{ $descuento }} -{{ $descuento_factor }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="form-group">

                                            <x-form.textarea label="Comentario:" id="comentario" name="comentario"
                                                wire:model.live="comentario" placeholder="Escribe tu comentario" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <div class="py-2 ml-auto mt-5 w-full mx-4">
                                        <div class="text-right mb-4 border-b border-gray-300 dark:border-gray-700">
                                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">RESUMEN</h4>
                                        </div>

                                        <div class="flex justify-between">
                                            <div
                                                class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                SUB TOTAL</div>
                                            <div class="text-right w-40">
                                                <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                    {{ $simbolo }} <span>{{ round($sub_total, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between mt-2">
                                            <div
                                                class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                OP. GRAVADAS</div>
                                            <div class="text-right w-40">
                                                <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                    {{ $simbolo }} <span>{{ round($op_gravadas, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($op_exoneradas > 0)
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. EXONERADAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        {{ $simbolo }}
                                                        <span>{{ round($op_exoneradas, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($op_inafectas > 0)
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. INAFECTAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        {{ $simbolo }} <span>{{ round($op_inafectas, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($op_gratuitas > 0)
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. GRATUITAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        {{ $simbolo }} <span>{{ round($op_gratuitas, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex justify-between mb-4 mt-2">
                                            <div
                                                class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                IGV(18%)</div>
                                            <div class="text-right w-40">
                                                <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                    {{ $simbolo }} <span>{{ round($igv, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($icbper > 0)
                                            <div class="flex justify-between mb-4 mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                    ICBPER</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        {{ $simbolo }}
                                                        <span>{{ number_format($icbper, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="py-2 border-t border-b border-indigo-500">
                                            <div class="flex justify-between">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                    Importe Total
                                                </div>
                                                <div class="text-right w-40">
                                                    <div class="text-xl text-gray-800 dark:text-gray-200 font-bold">
                                                        {{ $simbolo }}<span>{{ round($total, 4) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (app()->environment('local'))
                                            {{ json_encode($errors->all()) }}
                                        @endif
                                        <div class="py-2">
                                            <div class="flex justify-between">
                                                <x-form.button wire:click.prevent="save" class="w-full" md warning
                                                    label="PAGAR" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <x-slot name="footer">
            <div class="flex justify-end gap-x-4">
                <div class="flex gap-2">
                    <x-form.button flat label="Cancelar Compra" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-form.modal.card>
</div>
