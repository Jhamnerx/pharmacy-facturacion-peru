<div
    <?= new \WireUi\View\WireUiAttributeBag([
        'with-validation-colors' => $withValidationColors,
        'group-invalidated'      => $invalidated,
        'aria-disabled'          => $disabled,
        'aria-readonly'          => $readonly,
    ]) ?>
    <?php echo e($attributes
        ->merge(['form-wrapper' => $id ?: 'true'])
        ->class([
            'aria-disabled:pointer-events-none aria-disabled:select-none',
            'aria-disabled:opacity-60 aria-disabled:cursor-not-allowed',
            'aria-readonly:pointer-events-none aria-readonly:select-none',
            'relative',
        ])
        ->only(['wire:key', 'form-wrapper', 'x-data', 'class', 'x-props'])); ?>

>
    <div class="flex items-center gap-x-2">
        <!--[if BLOCK]><![endif]--><?php if($leftLabel): ?>
            <?php if (isset($component)) { $__componentOriginale9e3af7051a07204dc7b43a5acb5455e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9e3af7051a07204dc7b43a5acb5455e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.label','data' => ['attributes' => WireUi::extractAttributes($leftLabel),'for' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(WireUi::extractAttributes($leftLabel)),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
                <?php echo e($leftLabel); ?>

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

        <?php echo e($slot); ?>


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
    </div>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.form.error','data' => ['class' => 'mt-2','for' => $id,'message' => $errors->first($name),'name' => 'form.wrapper.error']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first($name)),'name' => 'form.wrapper.error']); ?>
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
</div>
<?php /**PATH C:\laragon2\www\pharmacy\vendor\wireui\wireui\src/Components/Wrapper/views/switcher.blade.php ENDPATH**/ ?>