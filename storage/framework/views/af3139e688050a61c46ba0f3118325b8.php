<div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-slate-800">Ventas <span
                class="text-slate-400 font-medium"><?php echo e($ventas->total()); ?></span></h2>
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
                            <div class="font-semibold text-left">FORMA PAGO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">TOTAL</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">DETALLE</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ESTADO</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ESTADO PAGO</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">PDF</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">XML</div>
                        </th>

                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-center">CDR</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">SUNAT</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">ACCIONES</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-200">
                    <!-- Row -->
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div><?php echo e($venta->fecha_hora_emision->format('d-m-Y / H:i:s')); ?>

                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium <?php echo e($venta->envioResumen ? 'text-red-500' : 'text-sky-500'); ?>">
                                    <!--[if BLOCK]><![endif]--><?php switch($venta->tipo_comprobante_id):
                                        case ('01'): ?>
                                            FACTURA-<?php echo e($venta->serie_correlativo); ?>

                                        <?php break; ?>

                                        <?php case ('02'): ?>
                                            NOTA DE VENTA-<?php echo e($venta->serie_correlativo); ?>

                                        <?php break; ?>

                                        <?php case ('03'): ?>
                                            BOLETA DE VENTA-<?php echo e($venta->serie_correlativo); ?>

                                        <?php break; ?>
                                    <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="font-medium text-slate-900">
                                    <?php echo e($venta->cliente->razon_social); ?>

                                </div>
                                <div class="font-sm text-slate-700">
                                    <p class="text-xs">
                                        <?php echo e($venta->cliente->numero_documento); ?>

                                    </p>

                                </div>

                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <!--[if BLOCK]><![endif]--><?php if($venta->forma_pago == 'CREDITO'): ?>
                                    <div>
                                        <div class="relative inline-flex" x-data="{ open: false }">
                                            <button class="inline-flex justify-center items-center group"
                                                aria-haspopup="true" @click.prevent="open = !open"
                                                :aria-expanded="open">
                                                <div class="flex items-center truncate">
                                                    <span
                                                        class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">
                                                        <?php echo e($venta->forma_pago); ?>

                                                    </span>
                                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                        viewBox="0 0 12 12">
                                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                    </svg>
                                                </div>
                                            </button>
                                            <div class="origin-top-right z-10 absolute top-full left-0 min-w-44 bg-white border border-slate-300 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                                @click.outside="open = false" @keydown.escape.window="open = false"
                                                x-show="open"
                                                x-transition:enter="transition ease-out duration-200 transform"
                                                x-transition:enter-start="opacity-0 -translate-y-2"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                x-transition:leave="transition ease-out duration-200"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0" x-cloak>
                                                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                                                    <div class="font-medium text-slate-800">Detalle de cuotas.
                                                    </div>
                                                    <div class="text-sm text-slate-600">
                                                        Adelanto:
                                                        <?php echo e($venta->divisa == 'USD' ? "$ " . $venta->adelanto : 'S/. ' . $venta->adelanto); ?>

                                                    </div>

                                                </div>
                                                <table
                                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead
                                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                N° Cuota
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Fecha
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Importe
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $venta->detalle_cuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cuota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                <th scope="row"
                                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                                    Cuota-<?php echo e($key + 1); ?>


                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    <?php echo e($cuota['fecha']); ?>

                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <?php echo e($venta->divisa == 'PEN ' ? 'S/ ' : '$ '); ?>

                                                                    <?php echo e($cuota['importe']); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End -->
                                    </div>
                                <?php else: ?>
                                    <div class="font-medium text-slate-800">
                                        <?php echo e($venta->forma_pago); ?>

                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium <?php echo e($venta->estado->color()); ?>">

                                    <?php echo e($venta->divisa == 'PEN' ? 'S/ ' : '$'); ?> <?php echo e($venta->total); ?>


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

                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $venta->detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php echo e($venta->divisa == 'PEN' ? 'S/ ' : '$'); ?><?php echo e(round($detalle->precio_unitario, 2)); ?>

                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <?php echo e($venta->divisa == 'PEN' ? 'S/ ' : '$'); ?>

                                                            <?php echo e(round($detalle->total, 2)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->



                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div
                                    class="inline-flex font-medium rounded-full text-center px-2.5 py-0.5 <?php echo e($venta->estado->statusColor()); ?>">
                                    <?php echo e($venta->estado->name); ?>

                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <!--[if BLOCK]><![endif]--><?php switch($venta->pago_estado):
                                    case ('UNPAID'): ?>
                                        <div
                                            class="inline-flex font-medium bg-orange-100 text-orange-600 rounded-full text-center px-2.5 py-0.5">
                                            Por Pagar</div>
                                    <?php break; ?>

                                    <?php case ('PAID'): ?>
                                        <div
                                            class="inline-flex font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-0.5">
                                            Pagado</div>
                                    <?php break; ?>
                                <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->

                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">

                                <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id != '02'): ?>
                                    <div class="space-x-1">

                                        
                                        <a target="_blank"
                                            href="<?php echo e(route('facturacion.ver.pdf', ['ventas' => $venta, 'formato' => 'pdf'])); ?>">
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
                                            href="<?php echo e(route('facturacion.ver.pdf', ['ventas' => $venta, 'formato' => 'ticket'])); ?>">
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
                                <?php else: ?>
                                    <div class="space-x-1">

                                        
                                        <a target="_blank"
                                            href="<?php echo e(route('facturacion.ver.pdf.nota', ['ventas' => $venta, 'formato' => 'pdf'])); ?>">
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
                                        </a>
                                        <a target="_blank"
                                            href="<?php echo e(route('facturacion.ver.pdf.nota', ['ventas' => $venta, 'formato' => 'ticket'])); ?>">
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
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px text-center">
                                <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id != '02'): ?>
                                    <div class="space-x-1">
                                        
                                        <a href="<?php echo e(route('facturacion.ver.xml', $venta)); ?>">
                                            <button type="button" class="bg-white">
                                                <svg aria-hidden="true" class="w-8 h-8" viewBox="0 0 56 56"
                                                    style="enable-background:new 0 0 56 56;" xml:space="preserve">
                                                    <g>
                                                        <path style="fill:#E9E9E0;"
                                                            d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z" />
                                                        <polygon style="fill:#D9D7CA;"
                                                            points="37.5,0.151 37.5,12 49.349,12" />
                                                        <path style="fill:#F29C1F;"
                                                            d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z" />
                                                        <g>
                                                            <path style="fill:#FFFFFF;"
                                                                d="M19.379,48.105L21.936,53h-1.9l-1.6-3.801h-0.137L16.576,53h-1.9l2.557-4.895l-2.721-5.182h1.873 l1.777,4.102h0.137l1.928-4.102H22.1L19.379,48.105z" />
                                                            <path style="fill:#FFFFFF;"
                                                                d="M31.998,42.924h1.668V53h-1.668v-6.932l-2.256,5.605h-1.449l-2.27-5.605V53h-1.668V42.924h1.668 l2.994,6.891L31.998,42.924z" />
                                                            <path style="fill:#FFFFFF;"
                                                                d="M37.863,42.924v8.832h4.635V53h-6.303V42.924H37.863z" />
                                                        </g>
                                                        <path style="fill:#F29C1F;"
                                                            d="M15.5,24c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l6-6 c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-6,6C16.012,23.902,15.756,24,15.5,24z" />
                                                        <path style="fill:#F29C1F;"
                                                            d="M21.5,30c-0.256,0-0.512-0.098-0.707-0.293l-6-6c-0.391-0.391-0.391-1.023,0-1.414 s1.023-0.391,1.414,0l6,6c0.391,0.391,0.391,1.023,0,1.414C22.012,29.902,21.756,30,21.5,30z" />
                                                        <path style="fill:#F29C1F;"
                                                            d="M33.5,30c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l6-6 c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-6,6C34.012,29.902,33.756,30,33.5,30z" />
                                                        <path style="fill:#F29C1F;"
                                                            d="M39.5,24c-0.256,0-0.512-0.098-0.707-0.293l-6-6c-0.391-0.391-0.391-1.023,0-1.414 s1.023-0.391,1.414,0l6,6c0.391,0.391,0.391,1.023,0,1.414C40.012,23.902,39.756,24,39.5,24z" />
                                                        <path style="fill:#F29C1F;"
                                                            d="M24.5,32c-0.11,0-0.223-0.019-0.333-0.058c-0.521-0.184-0.794-0.755-0.61-1.276l6-17 c0.185-0.521,0.753-0.795,1.276-0.61c0.521,0.184,0.794,0.755,0.61,1.276l-6,17C25.298,31.744,24.912,32,24.5,32z" />
                                                    </g>

                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="space-x-1">
                                        -
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            </td>


                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">

                                <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id != '02'): ?>
                                    <div class="space-x-1">

                                        <!--[if BLOCK]><![endif]--><?php switch($venta->fe_estado):
                                            
                                            case ('0'): ?>
                                                <?php if (isset($component)) { $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Mini::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.mini.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Mini::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['flat' => true,'wire:click.prevent' => 'getCdr('.e($venta->id).')','teal' => true,'icon' => 'arrow-path','spinner' => 'getCdr('.e($venta->id).')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $attributes = $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $component = $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
                                            <?php break; ?>

                                            
                                            <?php case ('1'): ?>
                                                <button type="button" class="bg-white cursor-default">
                                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" height="511pt"
                                                        version="1.1" viewBox="-38 0 511 511.99956" width="511pt">
                                                        <g id="surface1">
                                                            <path
                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.507812 512 C 216.105469 512 213.691406 511.757812 211.296875 511.289062 C 209.605469 510.949219 207.945312 510.488281 206.339844 509.9375 C 157.117188 492.769531 116.386719 468.675781 85.289062 438.339844 C 57.984375 411.6875 37.175781 379.277344 23.433594 341.980469 C -1.554688 274.167969 -0.132812 199.464844 1.011719 139.433594 L 1.03125 138.511719 C 1.261719 133.554688 1.410156 128.347656 1.492188 122.597656 C 1.910156 94.367188 24.355469 71.011719 52.589844 69.4375 C 111.457031 66.152344 156.996094 46.953125 195.90625 9.027344 L 196.246094 8.714844 C 202.707031 2.789062 210.847656 -0.117188 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,86.666667%,50.196078%);fill-opacity:1;" />
                                                            <path
                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,66.666667%,38.823529%);fill-opacity:1;" />
                                                            <path
                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.5 383.605469 C 148.144531 383.605469 90.894531 326.359375 90.894531 256 C 90.894531 185.644531 148.144531 128.398438 218.5 128.398438 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" />
                                                            <path
                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(88.235294%,92.156863%,94.117647%);fill-opacity:1;" />
                                                            <path
                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 206.53125 307.519531 C 203.597656 310.453125 199.75 311.917969 195.90625 311.917969 C 192.058594 311.917969 188.214844 310.453125 185.277344 307.519531 L 158.578125 280.808594 C 152.710938 274.941406 152.710938 265.4375 158.578125 259.566406 C 164.4375 253.699219 173.953125 253.699219 179.820312 259.566406 L 195.90625 275.652344 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(70.588235%,82.352941%,84.313725%);fill-opacity:1;" />
                                                            <path
                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 218.949219 252.605469 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(43.529412%,64.705882%,66.666667%);fill-opacity:1;" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            <?php break; ?>

                                            
                                            <?php case ('2'): ?>
                                                <div x-data="{ open: false }" class="relative inline-block text-left">
                                                    <div>
                                                        <button
                                                            class="inline-flex justify-center items-center grou text-sm font-medium"
                                                            aria-haspopup="true" @click="open = !open" type="button"
                                                            :aria-expanded="open">
                                                            <div class="flex items-center truncate">
                                                                <svg class="w-8 h-8" id="icons"
                                                                    enable-background="new 0 0 64 64" height="512"
                                                                    viewBox="0 0 64 64" width="512"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g>
                                                                        <g>
                                                                            <path
                                                                                d="m41 52c.55 0 1 .45 1 1v6.152 1.005s-.433.128-.962.278c0 0-5.519 1.566-9.038 1.566-2.06 0-5.014-.487-5.014-.487-.542-.089-.986-.613-.986-1.162v-7.352c0-.55.45-1 1-1h.01 2 9.99z"
                                                                                fill="#656d78" />
                                                                        </g>
                                                                        <g>
                                                                            <path
                                                                                d="m43.95 20.05c-.22-1.16-1.23-2.03-2.45-2.03-1.38 0-2.5 1.12-2.5 2.5v-5.02c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v-3c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v3c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v18.5l-3.89-3.41-.11-.09c-.42-.31-.94-.5-1.5-.5-1.38 0-2.5 1.12-2.5 2.5 0 .46.12.89.34 1.26l5.99 7.91 2.09 2.771c.96 1.42 2.17 2.659 3.59 3.569v3.99h11.99v-.17-3.83c2.39-1.4 4-4.01 4-7v-20.48c0-.16-.02-.32-.05-.47z"
                                                                                fill="#eac6bb" />
                                                                        </g>
                                                                        <g>
                                                                            <path
                                                                                d="m51.8 12.2c-5.07-5.06-12.07-8.2-19.8-8.2-15.46 0-28 12.54-28 28 0 7.73 3.14 14.73 8.2 19.8 3.72 3.71 8.479 6.391 13.8 7.55v-7.35h2.01v-3.99c-1.42-.91-2.63-2.149-3.59-3.569l-2.09-2.771-5.99-7.91c-.22-.37-.34-.8-.34-1.26 0-1.38 1.12-2.5 2.5-2.5.56 0 1.08.19 1.5.5l.11.09 3.89 3.41v-18.5c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v-3c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v3c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v5.02c0-1.38 1.12-2.5 2.5-2.5 1.22 0 2.23.87 2.45 2.03.03.15.05.31.05.47v20.48c0 2.99-1.61 5.6-4 7v3.83.17h2v6.15c10.52-4.02 18-14.21 18-26.15 0-7.73-3.14-14.73-8.2-19.8z"
                                                                                fill="#f5f7fa" />
                                                                        </g>
                                                                        <g>
                                                                            <path
                                                                                d="m28.998 15.259c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5v18.51l-3.89-3.408-.11-.102c-.42-.309-.94-.5-1.5-.5-1.38 0-2.5 1.121-2.5 2.5 0 .441.11.861.32 1.221l8.1 10.73c.97 1.41 2.17 2.66 3.59 3.559v3.99h11.99v-3.99c2.39-1.398 4-4.01 4-7.01v-20.479c0-1.381-1.12-2.5-2.5-2.5s-2.5 1.119-2.5 2.5v-5.021c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5v-3c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5z"
                                                                                fill="#eac6bb" />
                                                                            <g fill="#d3b1a9">
                                                                                <path
                                                                                    d="m28.981 14.272c.006 0 .011-.004.017-.004.553 0 1 .447 1 1v13.5c0 .553-.447 1-1 1-.006 0-.011-.004-.017-.004z" />
                                                                                <path
                                                                                    d="m38.981 20.278c.006 0 .011-.004.017-.004.553 0 1 .447 1 1v7.494c0 .553-.447 1-1 1-.006 0-.011-.004-.017-.004z" />
                                                                                <path
                                                                                    d="m33.998 29.769v-14.502c0-.814.396-1.531 1-1.988v15.49c0 .552-.447 1-1 1z" />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <g>
                                                                                <path
                                                                                    d="m12.201 52.799c-.256 0-.512-.098-.707-.293-.391-.391-.391-1.023 0-1.414l39.598-39.598c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-39.598 39.598c-.195.195-.451.293-.707.293z"
                                                                                    fill="#da4453" />
                                                                            </g>
                                                                        </g>
                                                                        <g>
                                                                            <path
                                                                                d="m1 32c0-17.12 13.88-31 31-31s31 13.88 31 31-13.88 31-31 31-31-13.88-31-31zm25 27.35c1.93.43 3.94.65 6 .65 3.52 0 6.89-.65 10-1.84v-.01c10.52-4.02 18-14.21 18-26.15 0-7.73-3.14-14.73-8.2-19.8-5.07-5.06-12.07-8.2-19.8-8.2-15.46 0-28 12.54-28 28 0 7.73 3.14 14.73 8.2 19.8 3.72 3.71 8.48 6.39 13.8 7.55z"
                                                                                fill="#ed5565" />
                                                                        </g>
                                                                    </g>
                                                                </svg>

                                                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                                    viewBox="0 0 12 12">
                                                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </div>

                                                    <div x-show="open" @click.away="open = false"
                                                        class="origin-top-right z-10 absolute top-full overflow-x-auto right-0 mt-2 min-w-44 max-w-md rounded-md bg-white border border-slate-300 shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                        <div class="py-1 min-w-80" role="menu" aria-orientation="vertical"
                                                            aria-labelledby="options-menu">

                                                            <div
                                                                class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                <div class="w-full">
                                                                    <span>COMPROBANTE: </span>
                                                                </div>
                                                                <div class="w-full">
                                                                    <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->serie_correlativo).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                <div class="w-full">
                                                                    <span>Estado:</span>
                                                                </div>
                                                                <div class="w-full">
                                                                    <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->estado_texto).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                <div class="w-full">
                                                                    <span>Código:</span>
                                                                </div>
                                                                <div class="w-full">
                                                                    <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->fe_codigo_error).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 whitespace-normal">
                                                                <div class="w-full">
                                                                    <span>Descripción: </span>
                                                                </div>
                                                                <div class="w-full">
                                                                    <?php echo e($venta->fe_mensaje_error); ?>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php break; ?>

                                            
                                            <?php case ('3'): ?>
                                                <button type="button" class="bg-white cursor-default">
                                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" height="511pt"
                                                        version="1.1" viewBox="-38 0 511 511.99956" width="511pt">
                                                        <g id="surface1">
                                                            <path
                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.507812 512 C 216.105469 512 213.691406 511.757812 211.296875 511.289062 C 209.605469 510.949219 207.945312 510.488281 206.339844 509.9375 C 157.117188 492.769531 116.386719 468.675781 85.289062 438.339844 C 57.984375 411.6875 37.175781 379.277344 23.433594 341.980469 C -1.554688 274.167969 -0.132812 199.464844 1.011719 139.433594 L 1.03125 138.511719 C 1.261719 133.554688 1.410156 128.347656 1.492188 122.597656 C 1.910156 94.367188 24.355469 71.011719 52.589844 69.4375 C 111.457031 66.152344 156.996094 46.953125 195.90625 9.027344 L 196.246094 8.714844 C 202.707031 2.789062 210.847656 -0.117188 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,86.666667%,50.196078%);fill-opacity:1;" />
                                                            <path
                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,66.666667%,38.823529%);fill-opacity:1;" />
                                                            <path
                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.5 383.605469 C 148.144531 383.605469 90.894531 326.359375 90.894531 256 C 90.894531 185.644531 148.144531 128.398438 218.5 128.398438 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" />
                                                            <path
                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(88.235294%,92.156863%,94.117647%);fill-opacity:1;" />
                                                            <path
                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 206.53125 307.519531 C 203.597656 310.453125 199.75 311.917969 195.90625 311.917969 C 192.058594 311.917969 188.214844 310.453125 185.277344 307.519531 L 158.578125 280.808594 C 152.710938 274.941406 152.710938 265.4375 158.578125 259.566406 C 164.4375 253.699219 173.953125 253.699219 179.820312 259.566406 L 195.90625 275.652344 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(70.588235%,82.352941%,84.313725%);fill-opacity:1;" />
                                                            <path
                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 218.949219 252.605469 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(43.529412%,64.705882%,66.666667%);fill-opacity:1;" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            <?php break; ?>
                                        <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->


                                    </div>
                                <?php else: ?>
                                    <div class="space-x-1">
                                        -
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id != '02'): ?>
                                    <div class="space-x-1">
                                        <!--[if BLOCK]><![endif]--><?php if($venta->anulado == 'no'): ?>
                                            <!--[if BLOCK]><![endif]--><?php switch($venta->fe_estado):
                                                
                                                case ('0'): ?>
                                                    <?php if (isset($component)) { $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Mini::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.mini.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Mini::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['flat' => true,'wire:click.prevent' => 'getCdr('.e($venta->id).')','teal' => true,'icon' => 'arrow-path','spinner' => 'getCdr('.e($venta->id).')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $attributes = $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $component = $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
                                                <?php break; ?>

                                                
                                                <?php case ('1'): ?>
                                                    <div x-data="{ open: false }" class="relative inline-block text-left">
                                                        <div>
                                                            <button
                                                                class="inline-flex justify-center items-center grou text-sm font-medium"
                                                                aria-haspopup="true" @click="open = !open" type="button"
                                                                :aria-expanded="open">
                                                                <div class="flex items-center truncate">
                                                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                                                        height="511pt" version="1.1"
                                                                        viewBox="-38 0 511 511.99956" width="511pt">
                                                                        <g id="surface1">
                                                                            <path
                                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.507812 512 C 216.105469 512 213.691406 511.757812 211.296875 511.289062 C 209.605469 510.949219 207.945312 510.488281 206.339844 509.9375 C 157.117188 492.769531 116.386719 468.675781 85.289062 438.339844 C 57.984375 411.6875 37.175781 379.277344 23.433594 341.980469 C -1.554688 274.167969 -0.132812 199.464844 1.011719 139.433594 L 1.03125 138.511719 C 1.261719 133.554688 1.410156 128.347656 1.492188 122.597656 C 1.910156 94.367188 24.355469 71.011719 52.589844 69.4375 C 111.457031 66.152344 156.996094 46.953125 195.90625 9.027344 L 196.246094 8.714844 C 202.707031 2.789062 210.847656 -0.117188 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,86.666667%,50.196078%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,66.666667%,38.823529%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.5 383.605469 C 148.144531 383.605469 90.894531 326.359375 90.894531 256 C 90.894531 185.644531 148.144531 128.398438 218.5 128.398438 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(88.235294%,92.156863%,94.117647%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 206.53125 307.519531 C 203.597656 310.453125 199.75 311.917969 195.90625 311.917969 C 192.058594 311.917969 188.214844 310.453125 185.277344 307.519531 L 158.578125 280.808594 C 152.710938 274.941406 152.710938 265.4375 158.578125 259.566406 C 164.4375 253.699219 173.953125 253.699219 179.820312 259.566406 L 195.90625 275.652344 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(70.588235%,82.352941%,84.313725%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 218.949219 252.605469 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(43.529412%,64.705882%,66.666667%);fill-opacity:1;" />
                                                                        </g>
                                                                    </svg>

                                                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                                        viewBox="0 0 12 12">
                                                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </div>

                                                        <div x-show="open" @click.away="open = false"
                                                            class="origin-top-right z-10 absolute top-full right-0 mt-2 min-w-44 rounded-md bg-white border border-slate-300 shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                            <div class="py-1" role="menu" aria-orientation="vertical"
                                                                aria-labelledby="options-menu">

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>FACTURA:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->serie_correlativo).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>Estado:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->estado_texto).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>Código:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->code_sunat).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>Descripción: </span>
                                                                    </div>
                                                                    <div class="w-full mx-2">

                                                                        <span><?php echo e($venta->fe_mensaje_sunat); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php break; ?>

                                                
                                                <?php case ('2'): ?>
                                                    <button type="button" class="bg-white cursor-default">
                                                        <svg class="w-8 h-8" id="icons" enable-background="new 0 0 64 64"
                                                            height="512" viewBox="0 0 64 64" width="512"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="m41 52c.55 0 1 .45 1 1v6.152 1.005s-.433.128-.962.278c0 0-5.519 1.566-9.038 1.566-2.06 0-5.014-.487-5.014-.487-.542-.089-.986-.613-.986-1.162v-7.352c0-.55.45-1 1-1h.01 2 9.99z"
                                                                        fill="#656d78" />
                                                                </g>
                                                                <g>
                                                                    <path
                                                                        d="m43.95 20.05c-.22-1.16-1.23-2.03-2.45-2.03-1.38 0-2.5 1.12-2.5 2.5v-5.02c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v-3c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v3c0-1.39-1.12-2.5-2.5-2.5s-2.5 1.11-2.5 2.5v18.5l-3.89-3.41-.11-.09c-.42-.31-.94-.5-1.5-.5-1.38 0-2.5 1.12-2.5 2.5 0 .46.12.89.34 1.26l5.99 7.91 2.09 2.771c.96 1.42 2.17 2.659 3.59 3.569v3.99h11.99v-.17-3.83c2.39-1.4 4-4.01 4-7v-20.48c0-.16-.02-.32-.05-.47z"
                                                                        fill="#eac6bb" />
                                                                </g>
                                                                <g>
                                                                    <path
                                                                        d="m51.8 12.2c-5.07-5.06-12.07-8.2-19.8-8.2-15.46 0-28 12.54-28 28 0 7.73 3.14 14.73 8.2 19.8 3.72 3.71 8.479 6.391 13.8 7.55v-7.35h2.01v-3.99c-1.42-.91-2.63-2.149-3.59-3.569l-2.09-2.771-5.99-7.91c-.22-.37-.34-.8-.34-1.26 0-1.38 1.12-2.5 2.5-2.5.56 0 1.08.19 1.5.5l.11.09 3.89 3.41v-18.5c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v-3c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v3c0-1.39 1.12-2.5 2.5-2.5s2.5 1.11 2.5 2.5v5.02c0-1.38 1.12-2.5 2.5-2.5 1.22 0 2.23.87 2.45 2.03.03.15.05.31.05.47v20.48c0 2.99-1.61 5.6-4 7v3.83.17h2v6.15c10.52-4.02 18-14.21 18-26.15 0-7.73-3.14-14.73-8.2-19.8z"
                                                                        fill="#f5f7fa" />
                                                                </g>
                                                                <g>
                                                                    <path
                                                                        d="m28.998 15.259c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5v18.51l-3.89-3.408-.11-.102c-.42-.309-.94-.5-1.5-.5-1.38 0-2.5 1.121-2.5 2.5 0 .441.11.861.32 1.221l8.1 10.73c.97 1.41 2.17 2.66 3.59 3.559v3.99h11.99v-3.99c2.39-1.398 4-4.01 4-7.01v-20.479c0-1.381-1.12-2.5-2.5-2.5s-2.5 1.119-2.5 2.5v-5.021c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5v-3c0-1.379-1.12-2.5-2.5-2.5s-2.5 1.121-2.5 2.5z"
                                                                        fill="#eac6bb" />
                                                                    <g fill="#d3b1a9">
                                                                        <path
                                                                            d="m28.981 14.272c.006 0 .011-.004.017-.004.553 0 1 .447 1 1v13.5c0 .553-.447 1-1 1-.006 0-.011-.004-.017-.004z" />
                                                                        <path
                                                                            d="m38.981 20.278c.006 0 .011-.004.017-.004.553 0 1 .447 1 1v7.494c0 .553-.447 1-1 1-.006 0-.011-.004-.017-.004z" />
                                                                        <path
                                                                            d="m33.998 29.769v-14.502c0-.814.396-1.531 1-1.988v15.49c0 .552-.447 1-1 1z" />
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="m12.201 52.799c-.256 0-.512-.098-.707-.293-.391-.391-.391-1.023 0-1.414l39.598-39.598c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-39.598 39.598c-.195.195-.451.293-.707.293z"
                                                                            fill="#da4453" />
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <path
                                                                        d="m1 32c0-17.12 13.88-31 31-31s31 13.88 31 31-13.88 31-31 31-31-13.88-31-31zm25 27.35c1.93.43 3.94.65 6 .65 3.52 0 6.89-.65 10-1.84v-.01c10.52-4.02 18-14.21 18-26.15 0-7.73-3.14-14.73-8.2-19.8-5.07-5.06-12.07-8.2-19.8-8.2-15.46 0-28 12.54-28 28 0 7.73 3.14 14.73 8.2 19.8 3.72 3.71 8.48 6.39 13.8 7.55z"
                                                                        fill="#ed5565" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                <?php break; ?>

                                                
                                                <?php case ('3'): ?>
                                                    <div x-data="{ open: false }" class="relative inline-block text-left">
                                                        <div>
                                                            <button
                                                                class="inline-flex justify-center items-center grou text-sm font-medium"
                                                                aria-haspopup="true" @click="open = !open" type="button"
                                                                :aria-expanded="open">
                                                                <div class="flex items-center truncate">
                                                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                                                        height="511pt" version="1.1"
                                                                        viewBox="-38 0 511 511.99956" width="511pt">
                                                                        <g id="surface1">
                                                                            <path
                                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.507812 512 C 216.105469 512 213.691406 511.757812 211.296875 511.289062 C 209.605469 510.949219 207.945312 510.488281 206.339844 509.9375 C 157.117188 492.769531 116.386719 468.675781 85.289062 438.339844 C 57.984375 411.6875 37.175781 379.277344 23.433594 341.980469 C -1.554688 274.167969 -0.132812 199.464844 1.011719 139.433594 L 1.03125 138.511719 C 1.261719 133.554688 1.410156 128.347656 1.492188 122.597656 C 1.910156 94.367188 24.355469 71.011719 52.589844 69.4375 C 111.457031 66.152344 156.996094 46.953125 195.90625 9.027344 L 196.246094 8.714844 C 202.707031 2.789062 210.847656 -0.117188 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,86.666667%,50.196078%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 413.476562 341.910156 C 399.714844 379.207031 378.902344 411.636719 351.609375 438.289062 C 320.542969 468.625 279.863281 492.730469 230.699219 509.925781 C 229.085938 510.488281 227.402344 510.949219 225.710938 511.289062 C 223.476562 511.730469 221.203125 511.96875 218.949219 512 L 218.949219 0.00390625 C 226.761719 0.105469 234.542969 3.007812 240.773438 8.714844 L 241.105469 9.027344 C 280.023438 46.953125 325.5625 66.152344 384.429688 69.4375 C 412.664062 71.011719 435.109375 94.367188 435.527344 122.597656 C 435.609375 128.386719 435.757812 133.585938 435.988281 138.511719 L 436 138.902344 C 437.140625 199.046875 438.554688 273.898438 413.476562 341.910156 Z M 413.476562 341.910156 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,66.666667%,38.823529%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.5 383.605469 C 148.144531 383.605469 90.894531 326.359375 90.894531 256 C 90.894531 185.644531 148.144531 128.398438 218.5 128.398438 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 346.101562 256 C 346.101562 326.207031 289.097656 383.355469 218.949219 383.605469 L 218.949219 128.398438 C 289.097656 128.648438 346.101562 185.796875 346.101562 256 Z M 346.101562 256 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(88.235294%,92.156863%,94.117647%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 206.53125 307.519531 C 203.597656 310.453125 199.75 311.917969 195.90625 311.917969 C 192.058594 311.917969 188.214844 310.453125 185.277344 307.519531 L 158.578125 280.808594 C 152.710938 274.941406 152.710938 265.4375 158.578125 259.566406 C 164.4375 253.699219 173.953125 253.699219 179.820312 259.566406 L 195.90625 275.652344 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(70.588235%,82.352941%,84.313725%);fill-opacity:1;" />
                                                                            <path
                                                                                d="M 276.417969 237.625 L 218.949219 295.101562 L 218.949219 252.605469 L 255.175781 216.382812 C 261.042969 210.511719 270.558594 210.511719 276.417969 216.382812 C 282.285156 222.25 282.285156 231.765625 276.417969 237.625 Z M 276.417969 237.625 "
                                                                                style=" stroke:none;fill-rule:nonzero;fill:rgb(43.529412%,64.705882%,66.666667%);fill-opacity:1;" />
                                                                        </g>
                                                                    </svg>

                                                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                                        viewBox="0 0 12 12">
                                                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </div>

                                                        <div x-show="open" @click.away="open = false"
                                                            class="origin-top-right z-10 absolute top-full overflow-x-auto right-0 mt-2 min-w-44 max-w-md rounded-md bg-white border border-slate-300 shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                            <div class="py-1" role="menu" aria-orientation="vertical"
                                                                aria-labelledby="options-menu">

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>COMPROBANTE:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->serie_correlativo).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>Estado:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->estado_texto).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                                    <div class="w-full">
                                                                        <span>Código:</span>
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->code_sunat).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 whitespace-normal">
                                                                    <div class="w-full">
                                                                        <span>Descripción: </span>
                                                                    </div>
                                                                    <div class="w-full">


                                                                        <?php echo e($venta->fe_mensaje_sunat); ?>

                                                                    </div>
                                                                </div>
                                                                <table
                                                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead
                                                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                        <tr>
                                                                            <th scope="col" class="px-6 py-3">
                                                                                #
                                                                            </th>
                                                                            <th scope="col" class="px-6 py-3">
                                                                                Nota
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $venta->nota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr
                                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                                <th scope="row"
                                                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                                                                                    <?php echo e($key + 1); ?>


                                                                                </th>
                                                                                <td class="px-6 py-4 text-wrap">
                                                                                    <?php echo e($nota); ?>

                                                                                </td>

                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php break; ?>
                                            <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php else: ?>
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <div>
                                                    <button
                                                        class="inline-flex justify-center items-center grou text-sm font-medium"
                                                        aria-haspopup="true" @click="open = !open" type="button"
                                                        :aria-expanded="open">
                                                        <div class="flex items-center truncate">

                                                            <svg class="w-8 h-8" version="1.1" id="Capa_1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 50 50"
                                                                style="enable-background:new 0 0 50 50;"
                                                                xml:space="preserve">
                                                                <circle style="fill:#D75A4A;" cx="25"
                                                                    cy="25" r="25" />
                                                                <polyline
                                                                    style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;"
                                                                    points="16,34 25,25 34,16" />
                                                                <polyline
                                                                    style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;"
                                                                    points="16,16 25,25 34,34" />
                                                            </svg>

                                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                                                viewBox="0 0 12 12">
                                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </div>

                                                <div x-show="open" @click.away="open = false"
                                                    class="origin-top-right z-10 absolute top-full right-0 mt-2 min-w-44 rounded-md bg-white border border-slate-300 shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                    <div class="py-1" role="menu" aria-orientation="vertical"
                                                        aria-labelledby="options-menu">

                                                        <div
                                                            class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                            <div class="w-full">
                                                                <span>FACTURA:</span>
                                                            </div>
                                                            <div class="w-full">
                                                                <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->serie_correlativo).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                            <div class="w-full">
                                                                <span>Estado:</span>
                                                            </div>
                                                            <div class="w-full">
                                                                <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->estado_texto).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                            <div class="w-full">
                                                                <span>Código:</span>
                                                            </div>
                                                            <div class="w-full">
                                                                <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indigo' => true,'md' => true,'label' => ''.e($venta->code_sunat).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="flex flex-nowrap px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900">
                                                            <div class="w-full">
                                                                <span>Descripción: </span>
                                                            </div>
                                                            <div class="w-full mx-2">

                                                                <span><?php echo e($venta->fe_mensaje_sunat); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                <?php else: ?>
                                    <div class="space-x-1">
                                        -
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
<?php $component->withAttributes(['wire:click.prevent' => 'imprimirTicket('.e($venta->id).')','label' => 'Imprimir']); ?>
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

                                        <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id !== '02'): ?>
                                            <!--[if BLOCK]><![endif]--><?php if(!$venta->clase && $venta->fe_estado == '0'): ?>
                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'createXml('.e($venta->id).')','icon' => 'arrow-path','label' => 'Crear XML']); ?>
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
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                        

                                        <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id == '01'): ?>
                                            <!--[if BLOCK]><![endif]--><?php if($venta->anulado == 'no' && $venta->estado_texto == 'ACEPTADA' && $venta->envioResumen == false): ?>
                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'anularComprobante('.e($venta->id).')','icon' => 'minus-circle','separator' => true,'label' => 'Anular comprobante']); ?>
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
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            <!--[if BLOCK]><![endif]--><?php if($venta->envioResumen && $venta->envioResumen->fe_estado != '1'): ?>
                                                <?php if (isset($component)) { $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Comunicación de baja']); ?>
                                                    <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'getCdrAnulacion('.e($venta->envioResumen->id).')','icon' => 'arrow-path','label' => 'Consultar Estado A.']); ?>
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
<?php if (isset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $attributes = $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $component = $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            <!--[if BLOCK]><![endif]--><?php if($venta->anulado == 'si' && $venta->envioResumen == true && $venta->envioResumen->fe_estado == '1'): ?>
                                                <?php if (isset($component)) { $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Comunicación de baja']); ?>

                                                    <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'document','target' => '_blank','href' => ''.e(route('facturacion.anulacion.ver.pdf', [
                                                            'id' => $venta->envioResumen->id,
                                                            'envio_resumen' => $venta->envioResumen,
                                                        ])).'']); ?>
                                                        Descargar PDF

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

                                                    <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'document','label' => 'Descargar XML','href' => ''.e(route('facturacion.anulacion.ver.xml', [
                                                            'id' => $venta->envioResumen->id,
                                                            'envio_resumen' => $venta->envioResumen,
                                                        ])).'']); ?>
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

                                                    <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'document','label' => 'Descargar CDR','href' => ''.e(route('facturacion.anulacion.ver.cdr', [
                                                            'id' => $venta->envioResumen->id,
                                                            'envio_resumen' => $venta->envioResumen,
                                                        ])).'']); ?>
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
<?php if (isset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $attributes = $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $component = $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <?php if (isset($component)) { $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Estado de pago']); ?>
                                            <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => 'true','icon' => 'banknotes','wire:click.prevent' => 'openModalPayments('.e($venta->id).')','label' => 'Pagos']); ?>
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
                                            <!--[if BLOCK]><![endif]--><?php if($venta->pago_estado == 'PAID'): ?>
                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => 'true','icon' => 'check-circle','label' => 'Marcar como Pagada']); ?>
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


                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'markUnPaid('.e($venta->id).')','icon' => 'x-mark','label' => 'Marcar como No Pagada']); ?>
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
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'markPaid('.e($venta->id).')','icon' => 'check-circle','label' => 'Marcar como Pagada']); ?>
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

                                                <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => true,'icon' => 'x-mark','label' => 'Marcar como No Pagada']); ?>
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
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $attributes = $__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__attributesOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1)): ?>
<?php $component = $__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1; ?>
<?php unset($__componentOriginal5ff57bcc7ae0bd32b41a54be743fece1); ?>
<?php endif; ?>
                                        <!--[if BLOCK]><![endif]--><?php if($venta->tipo_comprobante_id == '02'): ?>
                                            <?php if (isset($component)) { $__componentOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e0c733fc4b7d84791e38fa8e7a5bb13 = $attributes; } ?>
<?php $component = WireUi\Components\Dropdown\Item::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Dropdown\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'deleteComprobante('.e($venta->id).')','icon' => 'trash','label' => 'Eliminar']); ?>
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
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

                    <!--[if BLOCK]><![endif]--><?php if($ventas->count() < 1): ?>
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
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/components/ventas/table.blade.php ENDPATH**/ ?>