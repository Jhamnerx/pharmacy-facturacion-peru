<div
    <?= new \WireUi\View\WireUiAttributeBag([
        'with-validation-colors' => $withValidationColors,
        'group-invalidated'      => $invalidated,
        'aria-disabled'          => $disabled,
        'aria-readonly'          => $readonly,
    ]) ?>
    <?php echo e($attributes
        ->only(['class', 'wire:key', 'form-wrapper', 'x-data', 'x-props'])
        ->merge(['form-wrapper' => $id ?: 'true'])
        ->class([
            'aria-disabled:pointer-events-none aria-disabled:select-none aria-disabled:opacity-60',
            'aria-readonly:pointer-events-none aria-readonly:select-none',
            'w-full relative',
        ])); ?>

>
    <!--[if BLOCK]><![endif]--><?php if($label || $corner): ?>
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex mb-1',
                'justify-end'               => !$label,
                'justify-between items-end' =>  $label,
            ]); ?>"
            name="form.wrapper.header"
        >
            <!--[if BLOCK]><![endif]--><?php if($label): ?>
                <?php if (isset($component)) { $__componentOriginale9e3af7051a07204dc7b43a5acb5455e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9e3af7051a07204dc7b43a5acb5455e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.label','data' => ['attributes' => WireUi::extractAttributes($label),'for' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(WireUi::extractAttributes($label)),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
                    <?php echo e($label); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9e3af7051a07204dc7b43a5acb5455e)): ?>
<?php $attributes = $__attributesOriginale9e3af7051a07204dc7b43a5acb5455e; ?>
<?php unset($__attributesOriginale9e3af7051a07204dc7b43a5acb5455e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9e3af7051a07204dc7b43a5acb5455e)): ?>
<?php $component = $__componentOriginale9e3af7051a07204dc7b43a5acb5455e; ?>
<?php unset($__componentOriginale9e3af7051a07204dc7b43a5acb5455e); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if($corner): ?>
                <?php if (isset($component)) { $__componentOriginale9e3af7051a07204dc7b43a5acb5455e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9e3af7051a07204dc7b43a5acb5455e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.label','data' => ['attributes' => WireUi::extractAttributes($corner),'for' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(WireUi::extractAttributes($corner)),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
                    <?php echo e($corner); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9e3af7051a07204dc7b43a5acb5455e)): ?>
<?php $attributes = $__attributesOriginale9e3af7051a07204dc7b43a5acb5455e; ?>
<?php unset($__attributesOriginale9e3af7051a07204dc7b43a5acb5455e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9e3af7051a07204dc7b43a5acb5455e)): ?>
<?php $component = $__componentOriginale9e3af7051a07204dc7b43a5acb5455e; ?>
<?php unset($__componentOriginale9e3af7051a07204dc7b43a5acb5455e); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <label
        <?php echo e($attributes
            ->whereDoesntStartWith(['x-model', 'wire:model'])
            ->except(['class', 'wire:key', 'form-wrapper', 'x-data', 'x-props'])
            ->merge(['for' => $id])
            ->class([
                Arr::get($roundedClasses, 'input', ''),
                Arr::get($colorClasses, 'input', ''),
                $shadowClasses => !$shadowless,

                'bg-background-white dark:bg-background-dark',
                'relative flex justify-between gap-x-2 items-center',
                'transition-all ease-in-out duration-150',
                'ring-1 ring-inset ring-gray-300 focus-within:ring-2',
                'outline-0',

                '!bg-gray-100' => $disabled && !$invalidated,

                $padding =>  $padding,
                'pl-3'   => !$padding && !isset($prepend),
                'pr-3'   => !$padding && !isset($append),
                'py-2'   => !$padding && !isset($prepend) && !isset($append),
                'h-10'   => isset($prepend) || isset($append),

                'invalidated:bg-negative-50 invalidated:ring-negative-500 invalidated:dark:ring-negative-700',
                'invalidated:dark:bg-negative-700/10 invalidated:dark:ring-negative-600',
            ])); ?>

        name="form.wrapper.container"
    >
        <!--[if BLOCK]><![endif]--><?php if(!isset($prepend) && ($prefix || $icon)): ?>
            <div
                name="form.wrapper.container.prefix"
                <?php echo e(WireUi::extractAttributes($prefix)->class([
                    'text-gray-400 pointer-events-none select-none flex items-center whitespace-nowrap',
                    'invalidated:text-negative-500 invalidated:input-focus:text-negative-500',
                    Arr::get($roundedClasses, 'prepend', ''),
                    Arr::get($colorClasses, 'prepend', ''),
                ])); ?>

            >
                <!--[if BLOCK]><![endif]--><?php if($icon): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $icon,'class' => 'w-4.5 h-4.5 text-current']); ?>
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
                <?php elseif($prefix): ?>
                    <?php echo e($prefix); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php elseif(isset($prepend)): ?>
            <div name="form.wrapper.container.prepend"
                <?php echo e($prepend->attributes->class([
                    'group/prepend wrapper-prepend-slot',
                    'flex h-full py-0.5 pl-0.5',
                ])); ?>

            >
                <?php echo e($prepend); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <?php echo e($slot); ?>


        <!--[if BLOCK]><![endif]--><?php if(!isset($append) && ($rightIcon || $suffix || $withErrorIcon)): ?>
            <div
                name="form.wrapper.container.suffix"
                <?php echo e(WireUi::extractAttributes($suffix)->class([
                    'text-gray-500 pointer-events-none select-none flex items-center whitespace-nowrap',
                    'invalidated:text-negative-500 invalidated:input-focus:text-negative-500',
                    Arr::get($roundedClasses, 'append', ''),
                    Arr::get($colorClasses, 'append', ''),
                ])); ?>

            >
                <!--[if BLOCK]><![endif]--><?php if($rightIcon): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $rightIcon,'class' => 'w-4.5 h-4.5']); ?>
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
                <?php elseif($suffix): ?>
                    <?php echo e($suffix); ?>

                <?php elseif($withErrorIcon): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'exclamation-circle','class' => 'hidden invalidated:block w-4.5 h-4.5']); ?>
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
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php elseif(isset($append)): ?>
            <div
                name="form.wrapper.container.append"
                <?php echo e($append->attributes->class([
                    'group/append shrink-0 wrapper-append-slot',
                    'flex h-full py-0.5 pr-0.5',
                ])); ?>

            >
                <?php echo e($append); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </label>

    <!--[if BLOCK]><![endif]--><?php if($description && !$invalidated): ?>
        <?php if (isset($component)) { $__componentOriginal6ef7b0d88b84e40e86250d49604cc13e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ef7b0d88b84e40e86250d49604cc13e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.description','data' => ['class' => 'mt-2','for' => $id,'name' => 'form.wrapper.description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.description'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'name' => 'form.wrapper.description']); ?>
            <?php echo e($description); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ef7b0d88b84e40e86250d49604cc13e)): ?>
<?php $attributes = $__attributesOriginal6ef7b0d88b84e40e86250d49604cc13e; ?>
<?php unset($__attributesOriginal6ef7b0d88b84e40e86250d49604cc13e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ef7b0d88b84e40e86250d49604cc13e)): ?>
<?php $component = $__componentOriginal6ef7b0d88b84e40e86250d49604cc13e; ?>
<?php unset($__componentOriginal6ef7b0d88b84e40e86250d49604cc13e); ?>
<?php endif; ?>
    <?php elseif(!$errorless && $invalidated): ?>
        <?php if (isset($component)) { $__componentOriginal0bf7f29a31bba6f667b73e5d2a83682b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0bf7f29a31bba6f667b73e5d2a83682b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.error','data' => ['class' => 'mt-2','for' => $id,'message' => $errors->first($name)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first($name))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0bf7f29a31bba6f667b73e5d2a83682b)): ?>
<?php $attributes = $__attributesOriginal0bf7f29a31bba6f667b73e5d2a83682b; ?>
<?php unset($__attributesOriginal0bf7f29a31bba6f667b73e5d2a83682b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0bf7f29a31bba6f667b73e5d2a83682b)): ?>
<?php $component = $__componentOriginal0bf7f29a31bba6f667b73e5d2a83682b; ?>
<?php unset($__componentOriginal0bf7f29a31bba6f667b73e5d2a83682b); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if(isset($after)): ?>
        <div <?php echo e($after->attributes); ?>>
            <?php echo e($after); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\laragon2\www\pharmacy\vendor\wireui\wireui\src/Components/Wrapper/views/text-field.blade.php ENDPATH**/ ?>