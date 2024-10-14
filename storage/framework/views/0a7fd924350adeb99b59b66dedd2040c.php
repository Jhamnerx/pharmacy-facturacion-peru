<div>

    <div
        class="my-4 container px-10 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="<?php echo e(route('admin.ventas.index')); ?>">
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
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-slate-100 dark:bg-gray-700 sm:p-2">
            <!-- Page header -->
            

            <div class="grid grid-cols-12 gap-4 m-3">
                
                <div class="col-span-12 xl:col-span-6">

                    <div class="grid grid-cols-12 gap-2">
                        
                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Buscar producto','wire:model.live' => 'search']); ?>
                                 <?php $__env->slot('append', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full','icon' => 'plus','rounded' => 'rounded-r-md','primary' => true,'flat' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $attributes = $__attributesOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__attributesOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $component = $__componentOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__componentOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
                        </div>
                        
                        <div class="col-span-12 lg:col-start-3 lg:col-end-11" x-data="{ active: 0, loadMore() { window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('loadMore') } }"
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
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button @click="active = <?php echo e($categoria->id); ?>"
                                        wire:click="getProductos(<?php echo e($categoria->id); ?>)"
                                        :class="{
                                            'border-2 border-cyan-700 bg-cyan-600 shadow-md': active ===
                                                <?php echo e($categoria->id); ?>

                                        }"
                                        class="whitespace-nowrap rounded-md bg-gradient-to-r from-blue-500 to-blue-800 px-2 lg:px-2 py-1 lg:py-2 text-white">

                                        <?php echo e($categoria->nombre); ?>

                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($categorias->hasMorePages()): ?>
                                <div class="flex justify-center mt-4">
                                    <button wire:click="loadMore" class="bg-blue-500 text-white px-1 py-1 rounded">
                                        Cargar más
                                    </button>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <div class="col-span-12 grid grid-cols-12 gap-2">

                            <div class="col-span-12 overflow-x-auto">
                                <table class="table-auto w-full">
                                    <thead
                                        class="text-xs font-semibold uppercase text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-t border-b border-slate-200 dark:border-slate-700">
                                        <tr>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                <div class="font-semibold text-left">#</div>
                                            </th>

                                            <th
                                                class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap hidden 2xl:block">
                                                <div class="font-semibold text-left">IMAGEN</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">NOMBRE</div>
                                            </th>
                                            <th
                                                class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap hidden 2xl:block">
                                                <div class="font-semibold text-left">N° REG. SANITARIO</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">STOCK</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-left">PRECIO VENTA</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">-</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-slate-200 dark:divide-slate-700">
                                        <!-- Row -->

                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr wire:key="productos-<?php echo e($producto->id); ?>">
                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                    <div class="flex items-center ">

                                                        <div class="font-medium  text-left">
                                                            <?php echo e($producto->codigo); ?>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap hidden 2xl:block">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="w-14 h-10 shrink-0 flex items-center justify-center bg-slate-100 rounded-full mr-2 sm:mr-3">

                                                            <!--[if BLOCK]><![endif]--><?php if($producto->image): ?>
                                                                <img class="rounded-full"
                                                                    src="<?php echo e(Storage::url($producto->image->url)); ?>"
                                                                    width="56" alt="Icon 01" />
                                                            <?php else: ?>
                                                                <img class="rounded-full"
                                                                    src="<?php echo e(Storage::url('productos/default.png')); ?>"
                                                                    width="56" alt="Icon 01" />
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>

                                                    </div>
                                                </td>

                                                <td class="px-2 first:pl-5 last:pr-5 py-3 ">
                                                    <div class="flex items-center ">

                                                        <div
                                                            class="font-medium 0 <?php echo e($producto->stock < 1 ? 'text-red-600' : 'text-slate-80'); ?> dark:text-slate-50 text-left">
                                                            <?php echo e($producto->nombre); ?>

                                                            <?php echo e($producto->forma_farmaceutica != '' ? '-' . $producto->forma_farmaceutica : ''); ?>

                                                            <?php echo e($producto->presentacion != '' ? '-' . $producto->presentacion : ''); ?>


                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="px-2 first:pl-5 last:pr-5 py-3 hidden 2xl:block">
                                                    <div class="text-left text-slate-800 dark:text-slate-50">
                                                        <?php echo e($producto->numero_registro_sanitario); ?></div>
                                                </td>

                                                <td class="px-2 first:pl-5 last:pr-5 py-3">
                                                    <div
                                                        class="text-left <?php echo e($producto->stock < 2 ? 'text-red-600' : ''); ?>">
                                                        <?php echo e($producto->stock); ?>

                                                    </div>
                                                </td>

                                                <td class="px-2 first:pl-5 last:pr-5 py-3">
                                                    <div class="text-left text-lg font-medium text-emerald-500">

                                                        <?php echo e($producto->divisa = 'USD' ? '$ ' : 'S/ '); ?>

                                                        <?php echo e($producto->precio_unitario); ?>

                                                    </div>
                                                    <div class="text-left text-xs text-red-500">

                                                        <?php echo e($producto->divisa = 'USD' ? '$ ' : 'S/ '); ?>

                                                        <?php echo e($producto->precio_minimo); ?>

                                                    </div>
                                                </td>

                                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                    <a href="#"
                                                        wire:click.prevent="addToCart(<?php echo e($producto->id); ?>)"
                                                        class="flex items-center justify-center rounded-md bg-slate-900 px-2 lg:px-2 py-2 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                        <span class="hidden 2xl:inline">Añadir al carrito</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        <!--[if BLOCK]><![endif]--><?php if($productos->count() < 1): ?>
                                            <tr>
                                                <td colspan="6"
                                                    class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                                    <div class="text-center">No hay Registros</div>
                                                </td>
                                            </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                    </tbody>
                                </table>


                            </div>
                            <!-- Pagination -->
                            <div class="mt-8 col-span-full">
                                <?php echo e($productos->links()); ?>


                            </div>
                        </div>
                    </div>

                </div>


                
                <div
                    class="col-span-12 xl:col-span-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-slate-300 dark:border-gray-900 p-2">

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
                                                <div class="font-semibold text-center">TOTAL</div>
                                            </th>
                                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                <div class="font-semibold text-center">-</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="text-xs divide-y divide-slate-300 dark:divide-gray-900 border border-slate-300 dark:border-gray-900">

                                        <!--[if BLOCK]><![endif]--><?php if($cart): ?>

                                            <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                                                <tr class="main bg-slate-100 dark:bg-slate-800">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3" colspan="4">
                                                        <div class="font-medium text-sm text-left">
                                                            <?php echo e(json_encode($cart)); ?>

                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clave => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="main bg-slate-100 dark:bg-slate-800"
                                                    wire:key="item-<?php echo e($clave); ?>">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-medium text-sm text-left">
                                                            <?php echo e($item['descripcion']); ?>

                                                        </div>

                                                    </td>

                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-2">

                                                        
                                                        <input type="text" class="form-input w-20"
                                                            wire:model.live="cart.<?php echo e($item['rowId']); ?>.qty"
                                                            wire:change="updateQuantity('<?php echo e($item['rowId']); ?>', $event.target.value)">
                                                    </td>

                                                    <td
                                                        class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-52 xl:w-32">
                                                        <?php if (isset($component)) { $__componentOriginal5b0811533b7e6484d46a99f1515e2054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b0811533b7e6484d46a99f1515e2054 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Currency::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Currency::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'total','name' => 'total','wire:model.blur' => 'cart.'.e($item['rowId']).'.precio_unitario','precision' => '2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $attributes = $__attributesOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $component = $__componentOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__componentOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
                                                    </td>
                                                    <td
                                                        class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-52 xl:w-32">

                                                        <div class="font-medium text-sm text-center">
                                                            <?php echo e($item['total']); ?>

                                                        </div>
                                                    </td>

                                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <div class="space-x-1">

                                                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'removeItem(\''.e($item['rowId']).'\')','outline' => true,'red' => true,'sm' => true,'icon' => 'trash']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <!--[if BLOCK]><![endif]--><?php if(Cart::count() <= 0): ?>
                                            <tr>
                                                <td colspan="4"
                                                    class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                                    <div class="text-center">Añade productos al carrito </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>
                            </div>

                            <?php if (isset($component)) { $__componentOriginal7b32e2c8c86a088fa824ad9246edeeea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b32e2c8c86a088fa824ad9246edeeea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b32e2c8c86a088fa824ad9246edeeea)): ?>
<?php $attributes = $__attributesOriginal7b32e2c8c86a088fa824ad9246edeeea; ?>
<?php unset($__attributesOriginal7b32e2c8c86a088fa824ad9246edeeea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b32e2c8c86a088fa824ad9246edeeea)): ?>
<?php $component = $__componentOriginal7b32e2c8c86a088fa824ad9246edeeea; ?>
<?php unset($__componentOriginal7b32e2c8c86a088fa824ad9246edeeea); ?>
<?php endif; ?>


                        </div>
                        <div class="col-span-9">
                            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'cliente_id','name' => 'cliente_id','wire:model.live' => 'cliente_id','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'placeholder' => 'Escriba el nombre o número de documento del cliente','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                    'api' => route('api.clientes.index'),
                                    'params' => ['local_id' => session('local_id')],
                                ]),'option-label' => 'razon_social','option-value' => 'id','option-description' => 'numero_documento']); ?>

                                 <?php $__env->slot('afterOptions', null, ['class' => 'p-2 flex justify-center','x-show' => 'displayOptions.length === 0']); ?> 
                                    <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'OpenModalSaveCliente(`${search}`)','x-on:click' => 'close','primary' => true,'flat' => true,'full' => true]); ?>
                                        <span x-html="`Crear cliente <b>${search}</b>`"></span>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                        </div>

                        <div class="col-span-3 flex items-center justify-center">
                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'plus','positive' => true,'wire:click.prevent' => 'addCliente']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                            <div class="col-span-12">
                                <div class="w-full">
                                    <?php echo e($cliente); ?>

                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($sub_total, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                        OP. GRAVADAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($op_gravadas, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!--[if BLOCK]><![endif]--><?php if($op_exoneradas > 0): ?>
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. EXONERADAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                <?php echo e($simbolo); ?> <span><?php echo e(round($op_exoneradas, 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if($op_inafectas > 0): ?>
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. INAFECTAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                <?php echo e($simbolo); ?> <span><?php echo e(round($op_inafectas, 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if($op_gratuitas > 0): ?>
                                    <div class="flex justify-between mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                            OP. GRATUITAS</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                <?php echo e($simbolo); ?> <span><?php echo e(round($op_gratuitas, 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="flex justify-between mb-4 mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                        IGV(18%)</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($igv, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!--[if BLOCK]><![endif]--><?php if($icbper > 0): ?>
                                    <div class="flex justify-between mb-4 mt-2">
                                        <div
                                            class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                            ICBPER</div>
                                        <div class="text-right w-40">
                                            <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                <?php echo e($simbolo); ?> <span><?php echo e(number_format($icbper, 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                        TOTAL A COBRAR</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 dark:text-gray-200 text-sm">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($total, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="py-2">
                                    <div class="flex justify-between">
                                        <!--[if BLOCK]><![endif]--><?php if($cart->count() > 0): ?>
                                            
                                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'nextStep','class' => 'w-full','md' => true,'warning' => true,'label' => 'PAGAR '.e($simbolo).' '.e(round($total, 2)).'','right-icon' => 'arrow-right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                                        <?php else: ?>
                                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => true,'class' => 'w-full','md' => true,'warning' => true,'label' => 'AÑADE PRODUCTOS AL CARRITO','right-icon' => 'arrow-right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal6a7d148983ed3ace55a3e668006b80a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a7d148983ed3ace55a3e668006b80a5 = $attributes; } ?>
<?php $component = WireUi\Components\Modal\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.modal.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Modal\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Resumen de venta','width' => '7xl','wire:model.live' => 'showModal','align' => 'center','persistent' => true]); ?>

        <div>
            <div class="p-2 shadow overflow-hidden sm:rounded-md">
                <div class="px-4 bg-slate-100 dark:bg-gray-700 sm:p-2">
                    <div class="grid grid-cols-12 gap-8 m-1">

                        <div class="col-span-12">
                            <div class="grid grid-cols-12 justify-center pt-2 lg:mx-4 gap-3">
                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="flex flex-col lg:flex-row justify-between gap-6">
                                            
                                            <div class="w-full lg:w-1/3">
                                                <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'serie','name' => 'serie','wire:model.live' => 'serie','placeholder' => 'Selecciona una serie','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($series),'option-label' => 'serie','option-value' => 'serie','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                                            </div>

                                            <div class="w-full lg:w-1/3">
                                                <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'metodo_pago_id','name' => 'metodo_pago_id','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                                        ['name' => 'En efectivo', 'id' => '009'],
                                                        ['name' => 'Depósito en cuenta', 'id' => '001'],
                                                        ['name' => 'Tarjeta de débito', 'id' => '005'],
                                                        ['name' => 'Tarjeta de crédito', 'id' => '006'],
                                                        ['name' => 'Transferencia bancaria', 'id' => '003'],
                                                        ['name' => 'Giro', 'id' => '002'],
                                                    ]),'option-label' => 'name','option-value' => 'id','wire:model.live' => 'metodo_pago_id','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                                            </div>
                                            <div
                                                class="flex justify-center md:flex-row md:space-x-2 border dark:border-gray-600 rounded-lg overflow-hidden w-full lg:w-1/3 items-center md:items-start">

                                                <!--[if BLOCK]><![endif]--><?php if($empresa->regimen_type == 'NRUS'): ?>

                                                    <!--[if BLOCK]><![endif]--><?php if($cliente->tipo_documento_id == '6'): ?>
                                                        <button wire:click="setTipoComprobante('01')" disabled
                                                            class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '01'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                            FACTURA
                                                        </button>
                                                    <?php else: ?>
                                                        <button wire:click="setTipoComprobante('01')" disabled
                                                            class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '01'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                            FACTURA
                                                        </button>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    <button wire:click="setTipoComprobante('03')"
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '03'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                        BOLETA
                                                    </button>

                                                    <button wire:click="setTipoComprobante('02')"
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '02'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                        N. VENTA
                                                    </button>
                                                <?php else: ?>
                                                    <!--[if BLOCK]><![endif]--><?php if($cliente->tipo_documento_id == '6'): ?>
                                                        <button wire:click="setTipoComprobante('01')"
                                                            class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '01'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                            FACTURA
                                                        </button>
                                                    <?php else: ?>
                                                        <button wire:click="setTipoComprobante('01')" disabled
                                                            class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '01'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                            FACTURA
                                                        </button>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    <button wire:click="setTipoComprobante('03')"
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '03'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                        BOLETA
                                                    </button>

                                                    <button wire:click="setTipoComprobante('02')"
                                                        class="px-4 py-2 text-gray-700 dark:text-gray-300 <?php if($tipo_comprobante_id == '02'): ?> bg-blue-500 text-white <?php endif; ?>">
                                                        N. VENTA
                                                    </button>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                                    <div class="col-span-12 mt-2">
                                        <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                            <p class="my-0 text-sm text-gray-700 dark:text-gray-300">
                                                <?php echo e($serie); ?> - <?php echo e($correlativo); ?> | <?php echo e($serie_correlativo); ?>

                                                - Tipo:
                                                <?php echo e($tipo_comprobante_id); ?>

                                            </p>

                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                <div class="col-span-12 mt-2">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                        <p class="my-0 text-sm text-gray-700 dark:text-gray-300">Monto a cobrar</p>
                                        <h1 class="mb-2 mt-0 text-2xl text-gray-900 dark:text-gray-100">S/
                                            <?php echo e($total); ?></h1>
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

                                                        <?php if (isset($component)) { $__componentOriginal5b0811533b7e6484d46a99f1515e2054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b0811533b7e6484d46a99f1515e2054 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Currency::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Currency::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'pago','placeholder' => '100','precision' => '2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $attributes = $__attributesOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $component = $__componentOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__componentOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <label
                                                        class="block text-gray-700 dark:text-gray-300">Vuelto</label>
                                                    <h4
                                                        class="text-lg font-semibold text-gray-900 dark:text-gray-100 m-0">
                                                        S/ <?php echo e(round($vuelto, 2)); ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                                    <div class="col-span-12 mt-2">
                                        <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
                                            <p class="my-0 text-sm text-gray-700 dark:text-gray-300">
                                                <?php echo e($pago); ?> - <?php echo e($total); ?> - vuelto:
                                                <?php echo e($vuelto); ?>

                                            </p>

                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                        <div class="grid grid-cols-12 gap-4 text-center">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <?php echo e($app_descuento); ?>

                                                    <?php if (isset($component)) { $__componentOriginal12ee426d66882c66c79ce07deee9e49f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal12ee426d66882c66c79ce07deee9e49f = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'color-positive','name' => 'app_decuento','wire:model.live' => 'app_descuento','label' => 'Aplicar descuento','positive' => true,'xl' => true,'value' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $attributes = $__attributesOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $component = $__componentOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__componentOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="form-group">
                                                    <div class="relative">
                                                        <!--[if BLOCK]><![endif]--><?php if($app_descuento): ?>
                                                            <?php if (isset($component)) { $__componentOriginal5b0811533b7e6484d46a99f1515e2054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b0811533b7e6484d46a99f1515e2054 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Currency::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Currency::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'descuento_monto','placeholder' => 'Ingresa desc.','precision' => '2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $attributes = $__attributesOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $component = $__componentOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__componentOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if (isset($component)) { $__componentOriginal5b0811533b7e6484d46a99f1515e2054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b0811533b7e6484d46a99f1515e2054 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Currency::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Currency::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'descuento_monto','placeholder' => 'Ingresa desc.','precision' => '2','disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $attributes = $__attributesOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $component = $__componentOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__componentOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-12">
                                    <div class="card bg-white dark:bg-gray-800 p-2 rounded-lg shadow">
                                        <div class="form-group">

                                            <?php if (isset($component)) { $__componentOriginal766d51b9779a62d55606e4facdbf6fa8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal766d51b9779a62d55606e4facdbf6fa8 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Comentario:','id' => 'comentario','name' => 'comentario','wire:model.live' => 'comentario','placeholder' => 'Escribe tu comentario']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal766d51b9779a62d55606e4facdbf6fa8)): ?>
<?php $attributes = $__attributesOriginal766d51b9779a62d55606e4facdbf6fa8; ?>
<?php unset($__attributesOriginal766d51b9779a62d55606e4facdbf6fa8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal766d51b9779a62d55606e4facdbf6fa8)): ?>
<?php $component = $__componentOriginal766d51b9779a62d55606e4facdbf6fa8; ?>
<?php unset($__componentOriginal766d51b9779a62d55606e4facdbf6fa8); ?>
<?php endif; ?>
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
                                                    <?php echo e($simbolo); ?> <span><?php echo e(round($sub_total, 2)); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between mt-2">
                                            <div
                                                class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                OP. GRAVADAS</div>
                                            <div class="text-right w-40">
                                                <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                    <?php echo e($simbolo); ?> <span><?php echo e(round($op_gravadas, 2)); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!--[if BLOCK]><![endif]--><?php if($op_exoneradas > 0): ?>
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. EXONERADAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        <?php echo e($simbolo); ?>

                                                        <span><?php echo e(round($op_exoneradas, 2)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <!--[if BLOCK]><![endif]--><?php if($op_inafectas > 0): ?>
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. INAFECTAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        <?php echo e($simbolo); ?> <span><?php echo e(round($op_inafectas, 2)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <!--[if BLOCK]><![endif]--><?php if($op_gratuitas > 0): ?>
                                            <div class="flex justify-between mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm text-lg">
                                                    OP. GRATUITAS</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        <?php echo e($simbolo); ?> <span><?php echo e(round($op_gratuitas, 2)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <div class="flex justify-between mb-4 mt-2">
                                            <div
                                                class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                IGV(18%)</div>
                                            <div class="text-right w-40">
                                                <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                    <?php echo e($simbolo); ?> <span><?php echo e(round($igv, 2)); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!--[if BLOCK]><![endif]--><?php if($icbper > 0): ?>
                                            <div class="flex justify-between mb-4 mt-2">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                    ICBPER</div>
                                                <div class="text-right w-40">
                                                    <div class="text-gray-800 dark:text-gray-200 text-sm">
                                                        <?php echo e($simbolo); ?>

                                                        <span><?php echo e(number_format($icbper, 2)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <div class="py-2 border-t border-b border-indigo-500">
                                            <div class="flex justify-between">
                                                <div
                                                    class="text-gray-900 dark:text-gray-300 text-right flex-1 font-medium text-sm">
                                                    Importe Total
                                                </div>
                                                <div class="text-right w-40">
                                                    <div class="text-xl text-gray-800 dark:text-gray-200 font-bold">
                                                        <?php echo e($simbolo); ?><span><?php echo e(round($total, 4)); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                                            <?php echo e(json_encode($errors->all())); ?>

                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <div class="py-2">
                                            <div class="flex justify-between">
                                                <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'save','class' => 'w-full','md' => true,'warning' => true,'label' => 'PAGAR']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
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
         <?php $__env->slot('footer', null, []); ?> 
            <div class="flex justify-end gap-x-4">
                <div class="flex gap-2">
                    <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['flat' => true,'label' => 'Cancelar Compra','x-on:click' => 'close']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                </div>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a7d148983ed3ace55a3e668006b80a5)): ?>
<?php $attributes = $__attributesOriginal6a7d148983ed3ace55a3e668006b80a5; ?>
<?php unset($__attributesOriginal6a7d148983ed3ace55a3e668006b80a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a7d148983ed3ace55a3e668006b80a5)): ?>
<?php $component = $__componentOriginal6a7d148983ed3ace55a3e668006b80a5; ?>
<?php unset($__componentOriginal6a7d148983ed3ace55a3e668006b80a5); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/comprobantes/pos/steps/cart-step.blade.php ENDPATH**/ ?>