<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('switcher')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => $wrapperData,'attributes' => $attrs->only(['wire:key'])]); ?>
    <?php echo $__env->make('wireui-wrapper::components.slots', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <input
        <?php echo e($attrs
            ->class([
                'form-radio transition ease-in-out duration-100',
                $roundedClasses,
                $colorClasses,
                $sizeClasses,

                'invalidated:focus:ring-negative-500 invalidated:ring-negative-500 invalidated:border-negative-400 invalidated:text-negative-600',
                'invalidated:focus:border-negative-400 invalidated:dark:focus:border-negative-600 invalidated:dark:ring-negative-600',
                'invalidated:dark:border-negative-600 invalidated:dark:bg-negative-700 invalidated:dark:checked:bg-negative-700',
                'invalidated:dark:focus:ring-offset-secondary-800 invalidated:dark:checked:border-negative-700',
            ])
            ->merge(['type' => 'radio'])); ?>

    />
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
<?php /**PATH C:\laragon2\www\pharmacy\vendor\wireui\wireui\src/Components/Switcher/views/radio.blade.php ENDPATH**/ ?>