<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['data','id','name','disabled','readonly']));

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

foreach (array_filter((['data','id','name','disabled','readonly']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal2fd24dc8685646730b80a53b131cbc77 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fd24dc8685646730b80a53b131cbc77 = $attributes; } ?>
<?php $component = WireUi\Components\Wrapper\TextField::resolve(['data' => $data,'id' => $id,'name' => $name,'disabled' => $disabled,'readonly' => $readonly] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Wrapper\TextField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
 <?php $__env->slot('append', null, ['class' => 'flex items-center pr-2.5 gap-x-1']); ?> <?php echo e($append); ?> <?php $__env->endSlot(); ?>
 <?php $__env->slot('after', null, []); ?> <?php echo e($after); ?> <?php $__env->endSlot(); ?>
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
<?php endif; ?><?php /**PATH C:\laragon2\www\pharmacy\storage\framework\views/7fe1cc29b3dc0f3f9a5b5bb70a0da181.blade.php ENDPATH**/ ?>