<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(Storage::url('imagenes/logo.png')); ?>" width="250" alt="">

            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- MODULOS GRUPO -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden xl:sidebar-expanded:block 2xl:block">MODULOS</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.ver')): ?>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['dashboard', ''])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['inbox'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="<?php echo e(route('dashboard')); ?>">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current <?php if(in_array(Request::segment(1), ['dashboard', ''])): ?> <?php echo e('text-teal-500'); ?><?php else: ?><?php echo e('text-slate-400'); ?> <?php endif; ?>"
                                            d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                        <path
                                            class="fill-current <?php if(in_array(Request::segment(1), ['dashboard', ''])): ?> <?php echo e('text-teal-600'); ?><?php else: ?><?php echo e('text-slate-600'); ?> <?php endif; ?>"
                                            d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                        <path
                                            class="fill-current <?php if(in_array(Request::segment(1), ['dashboard', ''])): ?> <?php echo e('text-teal-200'); ?><?php else: ?><?php echo e('text-slate-400'); ?> <?php endif; ?>"
                                            d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Dashboard
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    

                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['punto.venta.ver', 'caja.crear'])): ?>

                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['pos', 'caja'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>"
                            x-data="{ open: <?php echo e(in_array(Request::segment(1), ['pos', 'caja']) ? 1 : 0); ?> }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['pos', 'caja'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php if (isset($component)) { $__componentOriginalfae433fcf24d138c9b16106d04f0f39d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfae433fcf24d138c9b16106d04f0f39d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.basket','data' => ['class' => 'shrink-0 h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.basket'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfae433fcf24d138c9b16106d04f0f39d)): ?>
<?php $attributes = $__attributesOriginalfae433fcf24d138c9b16106d04f0f39d; ?>
<?php unset($__attributesOriginalfae433fcf24d138c9b16106d04f0f39d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfae433fcf24d138c9b16106d04f0f39d)): ?>
<?php $component = $__componentOriginalfae433fcf24d138c9b16106d04f0f39d; ?>
<?php unset($__componentOriginalfae433fcf24d138c9b16106d04f0f39d); ?>
<?php endif; ?>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            POS
                                        </span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 <?php if(in_array(Request::segment(1), ['pos', 'caja'])): ?> <?php echo e('rotate-180'); ?> <?php endif; ?>"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 <?php if(!in_array(Request::segment(1), ['ventas'])): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
                                    :class="open ? '!block' : 'hidden'">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('punto.venta.ver')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.pos.create')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.pos.create')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Punto de Venta
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('caja.crear')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.caja.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.caja.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Caja Chica POS
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>


                    <!-- Comprobantes -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['comprobantes.ver', 'comprobantes.crear', 'comprobantes.anular'])): ?>

                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['emitir', 'ventas', 'devoluciones'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>"
                            x-data="{ open: <?php echo e(in_array(Request::segment(1), ['emitir', 'ventas', 'devoluciones']) ? 1 : 0); ?> }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['emitir', 'ventas', 'devoluciones'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php if (isset($component)) { $__componentOriginale2edad0a1b1063b60be13a77af0ff290 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2edad0a1b1063b60be13a77af0ff290 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.invoice','data' => ['class' => 'shrink-0 h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.invoice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2edad0a1b1063b60be13a77af0ff290)): ?>
<?php $attributes = $__attributesOriginale2edad0a1b1063b60be13a77af0ff290; ?>
<?php unset($__attributesOriginale2edad0a1b1063b60be13a77af0ff290); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2edad0a1b1063b60be13a77af0ff290)): ?>
<?php $component = $__componentOriginale2edad0a1b1063b60be13a77af0ff290; ?>
<?php unset($__componentOriginale2edad0a1b1063b60be13a77af0ff290); ?>
<?php endif; ?>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Comprobantes
                                        </span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 <?php if(in_array(Request::segment(1), ['comprobantes'])): ?> <?php echo e('rotate-180'); ?> <?php endif; ?>"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 <?php if(!in_array(Request::segment(1), ['ventas'])): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
                                    :class="open ? '!block' : 'hidden'">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comprobantes.ver')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.ventas.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.ventas.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Administrar Ventas
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comprobantes.crear')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.invoice.create')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.invoice.create')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Emitir comprobante
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['devoluciones.crear', 'devoluciones.index'])): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.devoluciones.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.devoluciones.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Ver Devoluciones
                                                </span>
                                            </a>
                                        </li>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.devoluciones.create')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.devoluciones.create')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Registrar Devolucion
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <!-- Guias remision -->
                    
                    <!-- Cotizaciones -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cotizaciones.ver')): ?>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['cotizaciones'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['cotizaciones'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="<?php echo e(route('admin.cotizaciones.index')); ?>">
                                <div class="flex items-center">
                                    <?php if (isset($component)) { $__componentOriginale2edad0a1b1063b60be13a77af0ff290 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2edad0a1b1063b60be13a77af0ff290 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.invoice','data' => ['class' => 'shrink-0 h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.invoice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2edad0a1b1063b60be13a77af0ff290)): ?>
<?php $attributes = $__attributesOriginale2edad0a1b1063b60be13a77af0ff290; ?>
<?php unset($__attributesOriginale2edad0a1b1063b60be13a77af0ff290); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2edad0a1b1063b60be13a77af0ff290)): ?>
<?php $component = $__componentOriginale2edad0a1b1063b60be13a77af0ff290; ?>
<?php unset($__componentOriginale2edad0a1b1063b60be13a77af0ff290); ?>
<?php endif; ?>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Cotizaciones
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- Cotizaciones -->
                    

                    <!-- Reportes -->
                    

                    <!-- Compras -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['compras.ver', 'compras.crear'])): ?>

                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['compras'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>"
                            x-data="{ open: <?php echo e(in_array(Request::segment(1), ['compras']) ? 1 : 0); ?> }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['compras'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php if (isset($component)) { $__componentOriginale04235447e74ddd4f6fb497a5a8c29eb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale04235447e74ddd4f6fb497a5a8c29eb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.cart','data' => ['class' => 'shrink-0 h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale04235447e74ddd4f6fb497a5a8c29eb)): ?>
<?php $attributes = $__attributesOriginale04235447e74ddd4f6fb497a5a8c29eb; ?>
<?php unset($__attributesOriginale04235447e74ddd4f6fb497a5a8c29eb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale04235447e74ddd4f6fb497a5a8c29eb)): ?>
<?php $component = $__componentOriginale04235447e74ddd4f6fb497a5a8c29eb; ?>
<?php unset($__componentOriginale04235447e74ddd4f6fb497a5a8c29eb); ?>
<?php endif; ?>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Compras
                                        </span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 <?php if(in_array(Request::segment(1), ['comprobantes'])): ?> <?php echo e('rotate-180'); ?> <?php endif; ?>"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 <?php if(!in_array(Request::segment(1), ['ventas'])): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
                                    :class="open ? '!block' : 'hidden'">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras.crear')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.compras.create')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.compras.create')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Registrar Compra
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compras.ver')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.compras.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.compras.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Ver Compras
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>



                    <!-- Productos -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['productos.ver', 'productos.lotes.ver'])): ?>

                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['productos', 'lotes'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>"
                            x-data="{ open: <?php echo e(in_array(Request::segment(1), ['productos', 'lotes']) ? 1 : 0); ?> }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['productos', 'lotes'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <?php if (isset($component)) { $__componentOriginal17b7204e30da2feed61116eabbfa7ce8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17b7204e30da2feed61116eabbfa7ce8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.tag','data' => ['class' => 'shrink-0 h-6 w-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.tag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal17b7204e30da2feed61116eabbfa7ce8)): ?>
<?php $attributes = $__attributesOriginal17b7204e30da2feed61116eabbfa7ce8; ?>
<?php unset($__attributesOriginal17b7204e30da2feed61116eabbfa7ce8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal17b7204e30da2feed61116eabbfa7ce8)): ?>
<?php $component = $__componentOriginal17b7204e30da2feed61116eabbfa7ce8; ?>
<?php unset($__componentOriginal17b7204e30da2feed61116eabbfa7ce8); ?>
<?php endif; ?>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            Almacen
                                        </span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 <?php if(in_array(Request::segment(1), ['comprobantes'])): ?> <?php echo e('rotate-180'); ?> <?php endif; ?>"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 <?php if(!in_array(Request::segment(1), ['productos', 'lotes'])): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
                                    :class="open ? '!block' : 'hidden'">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.ver')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.productos.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.productos.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Productos/Servicios
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.lotes.ver')): ?>
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.lotes.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('admin.lotes.index')); ?>">
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                    Lotes
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <!-- Categorias -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categoria_productos.ver')): ?>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['categorias'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['categorias'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="<?php echo e(route('admin.categorias.index')); ?>">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path
                                            class="fill-current <?php if(in_array(Request::segment(1), ['categorias'])): ?> <?php echo e('text-teal-500'); ?><?php else: ?><?php echo e('text-slate-600'); ?> <?php endif; ?>"
                                            d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                                        <path
                                            class="fill-current <?php if(in_array(Request::segment(1), ['categorias'])): ?> <?php echo e('text-teal-300'); ?><?php else: ?><?php echo e('text-slate-400'); ?> <?php endif; ?>"
                                            d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Categorias
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- Clientes -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.ver')): ?>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['clientes'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['clientes'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="<?php echo e(route('admin.clientes.index')); ?>">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                        <g fill="currentColor" stroke="currentColor" class="nc-icon-wrapper">
                                            <path d="M38,39H26A18,18,0,0,0,8,57H8s9,4,24,4,24-4,24-4h0A18,18,0,0,0,38,39Z"
                                                fill="none" stroke="currentColor" stroke-linecap="square"
                                                stroke-miterlimit="10" stroke-width="2"></path>
                                            <path data-color="color-2"
                                                d="M19,17.067a13,13,0,1,1,26,0C45,24.283,39.18,32,32,32S19,24.283,19,17.067Z"
                                                fill="none" stroke-linecap="square" stroke-miterlimit="10"
                                                stroke-width="2"></path>
                                        </g>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Clientes
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- Proveedores -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores.ver')): ?>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['proveedores'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['proveedores'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="<?php echo e(route('admin.proveedores.index')); ?>">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                        <g fill="currentColor" stroke="currentColor" class="nc-icon-wrapper">
                                            <path d="M38,39H26A18,18,0,0,0,8,57H8s9,4,24,4,24-4,24-4h0A18,18,0,0,0,38,39Z"
                                                fill="none" stroke="currentColor" stroke-linecap="square"
                                                stroke-miterlimit="10" stroke-width="2"></path>
                                            <path data-color="color-2"
                                                d="M19,17.067a13,13,0,1,1,26,0C45,24.283,39.18,32,32,32S19,24.283,19,17.067Z"
                                                fill="none" stroke-linecap="square" stroke-miterlimit="10"
                                                stroke-width="2"></path>
                                        </g>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        Proveedores
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!-- Administracion -->
                    <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(in_array(Request::segment(1), ['ajustes', 'usuarios'])): ?> <?php echo e('bg-slate-900'); ?> <?php endif; ?>"
                            x-data="{ open: <?php echo e(in_array(Request::segment(1), ['ajustes', 'usuarios']) ? 1 : 0); ?> }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 <?php if(in_array(Request::segment(1), ['ajustes'])): ?> <?php echo e('hover:text-slate-200'); ?> <?php endif; ?>"
                                href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path
                                                class="fill-current <?php if(in_array(Request::segment(1), ['ajustes'])): ?> <?php echo e('text-teal-500'); ?><?php else: ?><?php echo e('text-slate-600'); ?> <?php endif; ?>"
                                                d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                            <path
                                                class="fill-current <?php if(in_array(Request::segment(1), ['ajustes'])): ?> <?php echo e('text-teal-300'); ?><?php else: ?><?php echo e('text-slate-400'); ?> <?php endif; ?>"
                                                d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Administracion</span>
                                    </div>
                                    <!-- Icon -->
                                    <div
                                        class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 <?php if(in_array(Request::segment(1), ['administracion'])): ?> <?php echo e('rotate-180'); ?> <?php endif; ?>"
                                            :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 <?php if(!in_array(Request::segment(1), ['ajustes', 'usuarios', ''])): ?> <?php echo e('hidden'); ?> <?php endif; ?>"
                                    :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is([
                                                'admin.ajustes.empresa',
                                                'admin.ajustes.cuenta',
                                                'admin.ajustes.series',
                                                'admin.ajustes.notificaciones',
                                                'admin.ajustes.roles',
                                            ])): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                            href="<?php echo e(route('admin.ajustes.empresa')); ?>">
                                            <span
                                                class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                Ajustes de Empresa
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is(['admin.ajustes.sunat'])): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                            href="<?php echo e(route('admin.ajustes.sunat')); ?>">
                                            <span
                                                class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                Ajustes de Sunat
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate <?php if(Route::is('admin.usuarios.index')): ?> <?php echo e('!text-teal-500'); ?> <?php endif; ?>"
                                            href="<?php echo e(route('admin.usuarios.index')); ?>">
                                            <span
                                                class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                                Usuarios
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                    
            </div>

            <!-- Expand / collapse button -->
            <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400"
                                d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                            <path class="text-slate-600" d="M3 23H1V1h2z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/components/app/sidebar.blade.php ENDPATH**/ ?>