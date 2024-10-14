<div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800">Devoluciones <span
                class="text-slate-400 font-medium"><?php echo e($devoluciones->total()); ?></span></h2>
    </header>
    <div>

        <!-- Table -->
        <div class="overflow-x-auto min-h-screen">
            <table class="table-auto  w-full">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                    <tr>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">FECHA EMISION</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">COMPROBANTE</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">CLIENTE</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">MOTIVO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">DETALLE</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">PDF</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ACCIONES</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200">
                    <!-- Row -->
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $devoluciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devolucion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div><?php echo e($devolucion->fecha_emision->format('d-m-Y / H:i:s')); ?>

                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-sky-500">
                                    <!--[if BLOCK]><![endif]--><?php switch($devolucion->venta->tipo_comprobante_id):
                                        case ('01'): ?>
                                            FACTURA-<?php echo e($devolucion->venta->serie_correlativo); ?>

                                        <?php break; ?>

                                        <?php case ('02'): ?>
                                            NOTA DE VENTA-<?php echo e($devolucion->venta->serie_correlativo); ?>

                                        <?php break; ?>

                                        <?php case ('03'): ?>
                                            BOLETA DE VENTA-<?php echo e($devolucion->venta->serie_correlativo); ?>

                                        <?php break; ?>
                                    <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="font-medium text-slate-900">
                                    <?php echo e($devolucion->venta->cliente->razon_social); ?>

                                </div>
                                <div class="font-sm text-slate-700">
                                    <p class="text-xs">
                                        <?php echo e($devolucion->venta->cliente->numero_documento); ?>

                                    </p>

                                </div>

                            </td>


                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium">

                                    <?php echo e($devolucion->venta->divisa == 'PEN' ? 'S/ ' : '$'); ?> <?php echo e($devolucion->total); ?>


                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3  text-center">

                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open"
                                        class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-sky-600 border border-sky-600 hover:bg-opacity-25 dark:hover:bg-opacity-15 hover:text-sky-700 hover:bg-sky-400 dark:hover:text-sky-500 dark:hover:bg-sky-600 focus:bg-opacity-25 focus:border-transparent dark:focus:border-transparent dark:focus:bg-opacity-15 focus:ring-offset-0 focus:text-sky-700 focus:bg-sky-400 focus:ring-sky-600 dark:focus:text-sky-500 dark:focus:bg-sky-600 dark:focus:ring-sky-700 rounded-md gap-x-2 text-sm px-4 py-2"
                                        type="button">
                                        <svg class="w-4 h-4 shrink-0" stroke="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M2.03555 12.3224C1.96647 12.1151 1.9664 11.8907 2.03536 11.6834C3.42372 7.50972 7.36079 4.5 12.0008 4.5C16.6387 4.5 20.5742 7.50692 21.9643 11.6776C22.0334 11.8849 22.0335 12.1093 21.9645 12.3166C20.5761 16.4903 16.6391 19.5 11.9991 19.5C7.36119 19.5 3.42564 16.4931 2.03555 12.3224Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                            <path
                                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="origin-top-left z-20 absolute top-full -left-4 min-w-44 bg-white border border-slate-300 py-1.5 rounded shadow-xl overflow-hidden mt-1"
                                        @click.outside="open = false" @keydown.escape.window="open = false"
                                        x-show="open" x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        x-cloak>
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        #
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Nombre
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Cantidad/Precio
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Total
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $devolucion->detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr
                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                            <?php echo e($key + 1); ?>


                                                        </th>
                                                        <td class="px-6 py-4">
                                                            <?php echo e($detalle->producto->nombre); ?>

                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <?php echo e(round($detalle->cantidad, 2)); ?> |
                                                            <?php echo e($devolucion->divisa == 'PEN' ? 'S/ ' : '$'); ?><?php echo e(round($detalle->precio_unitario, 2)); ?>

                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <?php echo e($devolucion->divisa == 'PEN' ? 'S/ ' : '$'); ?>

                                                            <?php echo e(round($detalle->total, 2)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">

                                <div class="space-x-1">

                                    
                                    <a target="_blank"
                                        href="<?php echo e(route('devolucion.ver.pdf', ['devolucion' => $devolucion, 'formato' => 'pdf'])); ?>">
                                        <button type="button" class="bg-white ">
                                            <?php if (isset($component)) { $__componentOriginal49d09e17b7d1798ef61839c5dc9f7160 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49d09e17b7d1798ef61839c5dc9f7160 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.pdf','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.pdf'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49d09e17b7d1798ef61839c5dc9f7160)): ?>
<?php $attributes = $__attributesOriginal49d09e17b7d1798ef61839c5dc9f7160; ?>
<?php unset($__attributesOriginal49d09e17b7d1798ef61839c5dc9f7160); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49d09e17b7d1798ef61839c5dc9f7160)): ?>
<?php $component = $__componentOriginal49d09e17b7d1798ef61839c5dc9f7160; ?>
<?php unset($__componentOriginal49d09e17b7d1798ef61839c5dc9f7160); ?>
<?php endif; ?>
                                        </button>
                                    </a> <a target="_blank"
                                        href="<?php echo e(route('devolucion.ver.pdf', ['devolucion' => $devolucion, 'formato' => 'ticket'])); ?>">
                                        <button type="button" class="bg-white ">
                                            <?php if (isset($component)) { $__componentOriginal9fc124795d7d438ee2ba52bbe0709570 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9fc124795d7d438ee2ba52bbe0709570 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.iconos.ticket','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconos.ticket'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9fc124795d7d438ee2ba52bbe0709570)): ?>
<?php $attributes = $__attributesOriginal9fc124795d7d438ee2ba52bbe0709570; ?>
<?php unset($__attributesOriginal9fc124795d7d438ee2ba52bbe0709570); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9fc124795d7d438ee2ba52bbe0709570)): ?>
<?php $component = $__componentOriginal9fc124795d7d438ee2ba52bbe0709570; ?>
<?php unset($__componentOriginal9fc124795d7d438ee2ba52bbe0709570); ?>
<?php endif; ?>
                                        </button>
                                    </a>

                                </div>

                            </td>



                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">

                                <div class=" text-center space-x-1">
                                    <?php if (isset($component)) { $__componentOriginal18750b693f5654ce36c0da9097c948ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18750b693f5654ce36c0da9097c948ab = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-60']); ?>

                                        <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'imprimirTicket('.e($devolucion->id).')','label' => 'Imprimir']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13)): ?>
<?php $attributes = $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13; ?>
<?php unset($__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13)): ?>
<?php $component = $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13; ?>
<?php unset($__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13); ?>
<?php endif; ?>

                                        

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18750b693f5654ce36c0da9097c948ab)): ?>
<?php $attributes = $__attributesOriginal18750b693f5654ce36c0da9097c948ab; ?>
<?php unset($__attributesOriginal18750b693f5654ce36c0da9097c948ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18750b693f5654ce36c0da9097c948ab)): ?>
<?php $component = $__componentOriginal18750b693f5654ce36c0da9097c948ab; ?>
<?php unset($__componentOriginal18750b693f5654ce36c0da9097c948ab); ?>
<?php endif; ?>
                                </div>
                            </td>

                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($devoluciones->count() < 1): ?>
                        <tr>
                            <td colspan="12" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay Registros</div>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/components/devoluciones/table.blade.php ENDPATH**/ ?>