<div class="px-4 sm:px-6 lg:px-8 py-8 w-full mx-auto">
    <!-- Título y botones de acción -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-xl font-bold text-gray-800 dark:text-slate-100">Listado de cajas</h1>
        <div class="space-x-2 xs:space-y-1 sm:space-x-0">
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('caja_chica.crear')): ?>
                <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['positive' => true,'label' => 'Aperturar caja chica POS','icon' => 'plus-circle','wire:click.prevent' => 'openModalCreate']); ?>
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
            <?php endif; ?>
        </div>

    </div>

    <!-- Filtros -->
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/3">
            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Filtrar por:','placeholder' => 'Selecciona','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Ingresos', 'Egresos']),'wire:model' => 'filtro','class' => 'rounded']); ?>
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
        <div class="w-1/3">
            <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Buscar','wire:model.live' => 'search','placeholder' => 'Buscar...','class' => 'rounded']); ?>
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
    </div>
    <!-- Tabla -->
    <?php if (isset($component)) { $__componentOriginal99f1ee105cc3c420a151e473b1ed19a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99f1ee105cc3c420a151e473b1ed19a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cajas.tabla','data' => ['cajas' => $cajas]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cajas.tabla'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cajas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cajas)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99f1ee105cc3c420a151e473b1ed19a0)): ?>
<?php $attributes = $__attributesOriginal99f1ee105cc3c420a151e473b1ed19a0; ?>
<?php unset($__attributesOriginal99f1ee105cc3c420a151e473b1ed19a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99f1ee105cc3c420a151e473b1ed19a0)): ?>
<?php $component = $__componentOriginal99f1ee105cc3c420a151e473b1ed19a0; ?>
<?php unset($__componentOriginal99f1ee105cc3c420a151e473b1ed19a0); ?>
<?php endif; ?>

    <!-- Pagination -->
    <div class="mt-8 w-full">
        <?php echo e($cajas->links()); ?>


    </div>

</div>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/cajas/index.blade.php ENDPATH**/ ?>