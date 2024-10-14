<?php if (isset($component)) { $__componentOriginal6a7d148983ed3ace55a3e668006b80a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a7d148983ed3ace55a3e668006b80a5 = $attributes; } ?>
<?php $component = WireUi\Components\Modal\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.modal.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Modal\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['persistent' => true,'title' => 'Pagos del comprobante: '.e($venta ? $venta->serie_correlativo : '').'','wire:model.live' => 'showModal','align' => 'start','width' => '7xl']); ?>
    <div class="p-6">
        <!-- Tabla de Pagos Existentes -->
        <div class="overflow-x-auto ">
            <table class="min-w-full table-auto border-collapse border ">
                <thead class="bg-gray-100">
                    <tr class="text-sm">

                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">#</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Fecha de pago</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Método de pago</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Destino</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Monto</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-center">¿Pago recibido?</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                            <div class="font-normal text-left">Acciones</div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-1">PAGO-<?php echo e($pago->id); ?></td>
                            <td class="px-4 py-1"><?php echo e($pago->fecha->format('d-m-Y')); ?></td>
                            <td class="px-4 py-1"><?php echo e($pago->metodoPago->descripcion); ?></td>
                            <td class="px-4 py-1">CAJA GENERAL</td>
                            <td class="px-4 py-1 text-right"><?php echo e(number_format($pago->monto, 2)); ?>

                            </td>
                            <td class="px-4 py-1 text-center"><?php echo e($pago->payed ? 'SI' : 'NO'); ?></td>
                            <td class="px-4 py-1 text-left">
                                <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'eliminarPago('.e($pago->id).')','icon' => 'trash','class' => 'bg-red-500 text-white','xs' => true]); ?>Eliminar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($payments->count() < 1): ?>
                        <tr>
                            <td colspan="7" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap col-span-full">
                                <div class="text-center">No hay pagos para esta venta</div>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>


        <!-- Formulario de Nuevo Pago -->
        <!--[if BLOCK]><![endif]--><?php if($nuevoPago): ?>
            <?php echo e(json_encode($errors->all())); ?>

            <div class="mt-6 p-4 border border-gray-300 rounded-lg">
                <div class="grid grid-cols-12 gap-2 mb-4">

                    <div class="col-span-4 md:col-span-2">
                        <?php if (isset($component)) { $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $attributes; } ?>
<?php $component = WireUi\Components\DatetimePicker\Picker::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.datetime.picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\DatetimePicker\Picker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Fecha de pago:','id' => 'fecha','name' => 'fecha','wire:model.live' => 'fecha','min' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->subDays(180)),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->addDays(30)),'without-time' => true,'parse-format' => 'YYYY-MM-DD','display-format' => 'DD-MM-YYYY','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $attributes = $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $component = $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
                    </div>

                    <div class="col-span-4 md:col-span-2">
                        <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','label' => 'Medio de pago:','wire:model.live' => 'metodo_pago_id','placeholder' => 'Selecciona','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['api' => route('api.metodos.pago.index')]),'option-label' => 'descripcion','option-value' => 'codigo']); ?>
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

                    <div class="col-span-4 md:col-span-2">
                        <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'caja_chica_id','name' => 'caja_chica_id','label' => 'Destino','wire:model.live' => 'caja_chica_id']); ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cajas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $caja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginala4f38432c8908ddbfb286ebfc0889ede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4f38432c8908ddbfb286ebfc0889ede = $attributes; } ?>
<?php $component = WireUi\Components\Select\Option::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Option::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'CAJA GENERAL-'.e($index).'','value' => ''.e($caja).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4f38432c8908ddbfb286ebfc0889ede)): ?>
<?php $attributes = $__attributesOriginala4f38432c8908ddbfb286ebfc0889ede; ?>
<?php unset($__attributesOriginala4f38432c8908ddbfb286ebfc0889ede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4f38432c8908ddbfb286ebfc0889ede)): ?>
<?php $component = $__componentOriginala4f38432c8908ddbfb286ebfc0889ede; ?>
<?php unset($__componentOriginala4f38432c8908ddbfb286ebfc0889ede); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

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

                    <div class="col-span-4 md:col-span-2">
                        <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Monto','wire:model.live' => 'monto','type' => 'number']); ?>
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

                    <div class="col-span-4 md:col-span-1 mt-4">
                        <?php if (isset($component)) { $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Radio::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'SÍ','wire:model.defer' => 'payed','value' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $attributes = $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $component = $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Radio::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'NO','wire:model.defer' => 'payed','value' => 'false']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $attributes = $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $component = $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Número de Referencia','placeholder' => 'Referencia y/o N° Operación','wire:model.live' => 'numero_referencia']); ?>
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
                    <div class="flex space-x-2 col-span-3 md:col-span-1 mt-4">

                        <?php if (isset($component)) { $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Mini::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.mini.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Mini::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rounded' => true,'icon' => 'check','positive' => true,'wire:click.prevent' => 'guardarPago','spinner' => 'guardarPago']); ?>
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
                        <?php if (isset($component)) { $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Mini::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.mini.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Mini::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rounded' => true,'icon' => 'trash','negative' => true,'wire:click.prevent' => 'cancelarPago']); ?>
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

                    </div>
                </div>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <!-- Resumen de Pagos -->
        <div class="mt-6">
            <div class="text-right">
                <div class="space-y-2">
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">TOTAL PAGADO</p>
                        <p class="text-gray-900 font-bold inline-block"><?php echo e(number_format($totalPagado, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">TOTAL A PAGAR</p>
                        <p class="text-gray-900 font-bold inline-block"><?php echo e(number_format($totalAPagar, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-semibold inline-block mr-2">PENDIENTE DE PAGO</p>
                        <p class="text-gray-900 font-bold inline-block"><?php echo e(number_format($pendienteDePago, 2)); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón para agregar nuevo pago -->
        <!--[if BLOCK]><![endif]--><?php if(!$nuevoPago && $pendienteDePago > 0): ?>
            <div class="mt-4">

                <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rounded' => 'md','positive' => true,'label' => 'Nuevo','icon' => 'plus','wire:click' => 'agregarPago']); ?>
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
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
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
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/payments/create.blade.php ENDPATH**/ ?>