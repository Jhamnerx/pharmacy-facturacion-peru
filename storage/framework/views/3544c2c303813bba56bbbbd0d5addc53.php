<div>
    <div
        class="my-4 container px-10 mx-auto flex flex-col md:flex-row items-start md:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="<?php echo e(route('admin.devoluciones.index')); ?>">
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back w-5 h-5"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                <span class="hidden xs:block ml-2">Atras</span>
            </button>
        </a>
        <div class="mt-2 md:mt-0">
            <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
                REGISTRAR DEVOLUCIONES
            </h4>
            <ul aria-label="current Status"
                class="flex flex-col md:flex-row items-start md:items-center text-gray-600 dark:text-gray-400 text-sm mt-3">
            </ul>
        </div>
    </div>

    <!-- Code block ends -->
    <div class="p-6 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-700 sm:p-6">
            <div class="grid grid-cols-12 gap-2">

                <div class="col-span-12 grid grid-cols-12 md:col-span-6 border-dashed lg:border-r-2 pr-0 md:pr-4 gap-2">

                    <div class="col-span-12 md:col-span-6 lg:col-span-6 mb-3">

                        <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'invoice_id','name' => 'invoice_id','label' => 'Selecciona un comprobante','wire:model.live' => 'invoice_id','placeholder' => 'Ingrese serie y número','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'api' => route('api.invoices.index'),
                            ]),'option-label' => 'serie_correlativo','template' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'name' => 'user-option',
                                'config' => ['src' => 'imagen'],
                            ]),'always-fetch' => true,'option-value' => 'id','option-description' => 'option_description','empty-message' => 'No se encuentran comprobantes','x-on:selected' => '$wire.selectInvoice()','x-on:clear' => '$wire.clearSelected()']); ?>
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

                    
                    <div class="col-span-12 sm:col-span-6 lg:col-span-5 gap-2">
                        <div class="col-span-12 md:col-span-6">

                            <?php if (isset($component)) { $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $attributes; } ?>
<?php $component = WireUi\Components\DatetimePicker\Picker::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.datetime.picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\DatetimePicker\Picker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Fecha de Emision:','wire:model.live' => 'fecha_emision','min' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->subDays(1)),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()),'without-time' => true,'parse-format' => 'YYYY-MM-DD','display-format' => 'DD-MM-YYYY','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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
                    </div>

                    <div class="col-span-12 ">

                        <?php if (isset($component)) { $__componentOriginal766d51b9779a62d55606e4facdbf6fa8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal766d51b9779a62d55606e4facdbf6fa8 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rows' => '2','wire:model.live' => 'motivo','label' => 'Motivo o sustento por el cual se emitirá la devolución']); ?>
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

                <div class="col-span-12 grid grid-cols-12 md:col-span-6 border-red-600 lg:pl-6 mb-2 gap-2">
                    <div class="col-span-12 md:col-span-10 border p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Detalles del Comprobante</h3>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Número de Comprobante</h4>

                            <p class="text-lg font-medium">
                                <?php echo e($invoice ? $invoice->serie_correlativo : 'No seleccionado'); ?></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Cliente</h4>
                            <p class="text-lg font-medium">
                                <?php echo e($invoice ? $invoice->cliente->razon_social : 'No disponible'); ?></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Fecha de Emisión</h4>
                            <p class="text-lg font-medium"><?php echo e($invoice ? $invoice->fecha_emision : 'No disponible'); ?>

                            </p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm text-gray-600">Monto Total</h4>
                            <p class="text-lg font-medium"><?php echo e($simbolo); ?>

                                <?php echo e($invoice ? number_format($invoice->total, 2) : '0.00'); ?></p>
                        </div>


                    </div>

                </div>

                
                <div class="col-span-12 mt-10 pt-4 bg-white shadow-lg rounded-lg px-3">

                    

                    <?php if (isset($component)) { $__componentOriginal2868a653ba876118acb6da55a8e38479 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2868a653ba876118acb6da55a8e38479 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.devoluciones.tabla-detalle','data' => ['items' => $items]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('devoluciones.tabla-detalle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2868a653ba876118acb6da55a8e38479)): ?>
<?php $attributes = $__attributesOriginal2868a653ba876118acb6da55a8e38479; ?>
<?php unset($__attributesOriginal2868a653ba876118acb6da55a8e38479); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2868a653ba876118acb6da55a8e38479)): ?>
<?php $component = $__componentOriginal2868a653ba876118acb6da55a8e38479; ?>
<?php unset($__componentOriginal2868a653ba876118acb6da55a8e38479); ?>
<?php endif; ?>

                </div>
            </div>
            <?php echo e(json_encode($errors->all())); ?>


            <div class="px-4 py-3 text-right sm:px-6 sticky my-2 bg-white border-b border-slate-200">

                <div class="grid sm:grid-cols-2 gap-2 content-end">

                    <div class="text-right col-span-2 ">

                        <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'save','spinner' => 'save','label' => 'REGISTRAR','black' => true,'md' => true,'icon' => 'shopping-cart']); ?>
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
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/devoluciones/create.blade.php ENDPATH**/ ?>