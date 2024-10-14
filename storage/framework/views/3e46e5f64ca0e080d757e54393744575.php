<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('text-field')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => $wrapperData,'attributes' => $attrs->only(['wire:key', 'class']),'x-data' => 'wireui_inputs_currency','x-props' => WireUi::toJs([
        'emitFormatted' => $emitFormatted,
        'thousands'     => $thousands,
        'decimal'       => $decimal,
        'precision'     => $precision,
        'wireModel'     => WireUi::wireModel(isset($__livewire) ? $this : null, $attributes),
        'alpineModel'   => WireUi::alpineModel($attributes),
    ])]); ?>
    <?php echo $__env->make('wireui-wrapper::components.slots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="hidden">
        <?php if (isset($component)) { $__componentOriginal2af3f1a290b9b9f909d15f575cc80468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2af3f1a290b9b9f909d15f575cc80468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.element','data' => ['xBind:value' => 'value','xRef' => 'rawInput','name' => $name,'value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::element'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-bind:value' => 'value','x-ref' => 'rawInput','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2af3f1a290b9b9f909d15f575cc80468)): ?>
<?php $attributes = $__attributesOriginal2af3f1a290b9b9f909d15f575cc80468; ?>
<?php unset($__attributesOriginal2af3f1a290b9b9f909d15f575cc80468); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2af3f1a290b9b9f909d15f575cc80468)): ?>
<?php $component = $__componentOriginal2af3f1a290b9b9f909d15f575cc80468; ?>
<?php unset($__componentOriginal2af3f1a290b9b9f909d15f575cc80468); ?>
<?php endif; ?>
    </div>

    <?php if (isset($component)) { $__componentOriginal2af3f1a290b9b9f909d15f575cc80468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2af3f1a290b9b9f909d15f575cc80468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.element','data' => ['xModel' => 'input','xRef' => 'input','xOn:blur' => 'onBlur','attributes' => $attrs->whereStartsWith(['placeholder', 'dusk', 'cy', 'readonly', 'disabled'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::element'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'input','x-ref' => 'input','x-on:blur' => 'onBlur','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attrs->whereStartsWith(['placeholder', 'dusk', 'cy', 'readonly', 'disabled']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2af3f1a290b9b9f909d15f575cc80468)): ?>
<?php $attributes = $__attributesOriginal2af3f1a290b9b9f909d15f575cc80468; ?>
<?php unset($__attributesOriginal2af3f1a290b9b9f909d15f575cc80468); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2af3f1a290b9b9f909d15f575cc80468)): ?>
<?php $component = $__componentOriginal2af3f1a290b9b9f909d15f575cc80468; ?>
<?php unset($__componentOriginal2af3f1a290b9b9f909d15f575cc80468); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH C:\laragon2\www\pharmacy\vendor\wireui\wireui\src/Components/TextField/views/currency.blade.php ENDPATH**/ ?>