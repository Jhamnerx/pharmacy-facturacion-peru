<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<?php if (isset($component)) { $__componentOriginal5f2e0d8aacbdae3f29d890683fd5d19c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f2e0d8aacbdae3f29d890683fd5d19c = $attributes; } ?>
<?php $component = WireUi\Components\Popover\Index::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Popover\Index::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f2e0d8aacbdae3f29d890683fd5d19c)): ?>
<?php $attributes = $__attributesOriginal5f2e0d8aacbdae3f29d890683fd5d19c; ?>
<?php unset($__attributesOriginal5f2e0d8aacbdae3f29d890683fd5d19c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f2e0d8aacbdae3f29d890683fd5d19c)): ?>
<?php $component = $__componentOriginal5f2e0d8aacbdae3f29d890683fd5d19c; ?>
<?php unset($__componentOriginal5f2e0d8aacbdae3f29d890683fd5d19c); ?>
<?php endif; ?><?php /**PATH C:\laragon2\www\pharmacy\storage\framework\views/f4af5d478b590602653a4f1e2c5d6cc7.blade.php ENDPATH**/ ?>