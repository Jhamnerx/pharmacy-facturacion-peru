<?php if (isset($component)) { $__componentOriginalcf7987a006d38a781c9fdde5a56ecc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf7987a006d38a781c9fdde5a56ecc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.delete-modal','data' => ['wire:model.live' => 'showModal','titulo' => 'ELIMINAR CAJA','body' => 'Estás seguro de eliminar esta caja?.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.delete-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'showModal','titulo' => 'ELIMINAR CAJA','body' => 'Estás seguro de eliminar esta caja?.']); ?>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf7987a006d38a781c9fdde5a56ecc69)): ?>
<?php $attributes = $__attributesOriginalcf7987a006d38a781c9fdde5a56ecc69; ?>
<?php unset($__attributesOriginalcf7987a006d38a781c9fdde5a56ecc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf7987a006d38a781c9fdde5a56ecc69)): ?>
<?php $component = $__componentOriginalcf7987a006d38a781c9fdde5a56ecc69; ?>
<?php unset($__componentOriginalcf7987a006d38a781c9fdde5a56ecc69); ?>
<?php endif; ?>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/cajas/delete.blade.php ENDPATH**/ ?>