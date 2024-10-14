<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['data','rightIcon']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['data','rightIcon']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal2fd24dc8685646730b80a53b131cbc77 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fd24dc8685646730b80a53b131cbc77 = $attributes; } ?>
<?php $component = WireUi\Components\Wrapper\TextField::resolve(['data' => $data,'rightIcon' => $rightIcon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Wrapper\TextField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
 <?php $__env->slot('prepend', null, []); ?> <?php echo e($prepend); ?> <?php $__env->endSlot(); ?>
 <?php $__env->slot('append', null, []); ?> <?php echo e($append); ?> <?php $__env->endSlot(); ?>
<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2fd24dc8685646730b80a53b131cbc77)): ?>
<?php $attributes = $__attributesOriginal2fd24dc8685646730b80a53b131cbc77; ?>
<?php unset($__attributesOriginal2fd24dc8685646730b80a53b131cbc77); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fd24dc8685646730b80a53b131cbc77)): ?>
<?php $component = $__componentOriginal2fd24dc8685646730b80a53b131cbc77; ?>
<?php unset($__componentOriginal2fd24dc8685646730b80a53b131cbc77); ?>
<?php endif; ?><?php /**PATH C:\laragon2\www\pharmacy\storage\framework\views/2e70b53d8afad48811473ecc8b4feb78.blade.php ENDPATH**/ ?>