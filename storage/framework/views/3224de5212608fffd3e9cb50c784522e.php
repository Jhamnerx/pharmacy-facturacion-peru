<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('text-field')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-ref' => 'container','data' => $wrapperData,'attributes' => $attrs->class([
        'cursor-pointer' => !$disabled && !$readonly,
    ]),'x-data' => 'wireui_select','x-props' => WireUi::toJs([
        'asyncData'         => $asyncData,
        'optionValue'       => $optionValue,
        'optionLabel'       => $optionLabel,
        'optionDescription' => $optionDescription,
        'hasSlot'           => $slot->isNotEmpty(),
        'multiselect'       => $multiselect,
        'searchable'        => $searchable,
        'clearable'         => $clearable,
        'readonly'          => $readonly || $disabled,
        'placeholder'       => $placeholder,
        'template'          => $template,
        'wireModel'         => WireUi::wireModel(isset($__livewire) ? $this : null, $attributes),
        'alpineModel'       => WireUi::alpineModel($attributes),
    ]),'x-bind:class' => '{
        \'ring-2 ring-primary-600\': positionable.isOpen(),
    }','x-on:click' => 'toggle','x-on:keydown.enter.stop.prevent' => 'toggle','x-on:keydown.space.stop.prevent' => 'toggle','x-on:keydown.arrow-down.prevent' => 'positionable.open()','tabindex' => '0']); ?>
    <div class="hidden" hidden>
        <div hidden x-ref="json"><?php echo e(WireUi::toJs($optionsToArray())); ?></div>
        <div hidden x-ref="slot"><?php echo e($slot); ?></div>

        <?php if (isset($component)) { $__componentOriginal2af3f1a290b9b9f909d15f575cc80468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2af3f1a290b9b9f909d15f575cc80468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui-wrapper::components.element','data' => ['id' => $id,'name' => $name,'value' => $value,'xBind:value' => 'getSelectedValue','xRef' => 'input','type' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wireui-wrapper::element'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'x-bind:value' => 'getSelectedValue','x-ref' => 'input','type' => 'hidden']); ?>
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

        <!--[if BLOCK]><![endif]--><?php if(app()->runningUnitTests()): ?>
            <div dusk="select.<?php echo e($name); ?>">
                <?php echo json_encode($optionsToArray()); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <?php echo $__env->make('wireui-wrapper::components.slots', [
        'except' => ['append', 'label', 'beforeOptions', 'afterOptions'],
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--[if BLOCK]><![endif]--><?php if($label): ?>
         <?php $__env->slot('label', null, ['class' => 'cursor-pointer select-none','x-on:click' => 'toggle']); ?> 
            <?php echo e($label); ?>

         <?php $__env->endSlot(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <button
        type="button"
        class="w-full truncate flex items-center outline-0 border-0"
        tabindex="-1"
    >
        <span
            class="select-none text-gray-400 invalidated:text-negative-400 invalidated:dark:text-negative-400 text-sm truncate"
            x-show="isEmpty()"
            x-text="getPlaceholder"
        ></span>

        <span
            class="
                text-sm truncate text-secondary-600 dark:text-secondary-400
                invalidated:text-negative-600 invalidated:dark:text-negative-400
            "
            x-show="!config.multiselect && isNotEmpty()"
            x-html="getSelectedDisplayText()"
        ></span>

        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'w-full flex items-center overflow-hidden',
                'cursor-pointer' => !$readonly && !$disabled
            ]); ?>"
            x-show="config.multiselect && isNotEmpty()"
        >
            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar w-full">
                <!--[if BLOCK]><![endif]--><?php if (! ($withoutItemsCount)): ?>
                    <span
                        class="inline-flex text-sm text-secondary-700 dark:text-secondary-400 select-none"
                        x-show="selectedOptions.length"
                        x-text="selectedOptions.length"
                    ></span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <div wire:ignore class="flex items-center gap-1 flex-nowrap">
                    <template x-for="(option, index) in selectedOptions" :key="`selected.${index}.${option.value}.${option.label}`">
                        <span class="
                            inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium
                            border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700
                            dark:bg-secondary-700 dark:text-secondary-400 dark:border-none
                        ">
                            <span style="max-width: 5rem" class="truncate select-none" x-text="option.label"></span>

                            <button
                                class="flex items-center justify-center w-4 h-4 shrink-0 text-secondary-400 hover:text-secondary-500"
                                x-on:click.stop="unSelect(option)"
                                tabindex="-1"
                                type="button"
                                x-show="config.clearable && !(config.readonly || config.disabled)"
                            >
                                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3','name' => 'x-mark']); ?>
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
                            </button>
                        </span>
                    </template>
                </div>
            </div>
        </div>
    </button>

     <?php $__env->slot('append', null, ['class' => 'flex items-center pr-2.5 gap-x-1']); ?> 
        <!--[if BLOCK]><![endif]--><?php if($clearable && !$readonly && !$disabled): ?>
            <button
                x-show="isNotEmpty()"
                x-on:click.stop="clear"
                tabindex="-1"
                type="button"
                x-cloak
            >
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\Support\Arr::toCssClasses([
                        'w-4 h-4 text-secondary-400 hover:text-negative-400',
                        'invalidated:text-negative-400 invalidated:dark:text-negative-600',
                    ]),'name' => 'x-mark']); ?>
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
            </button>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <button tabindex="-1" type="button">
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\Support\Arr::toCssClasses([
                    'w-5 h-5 text-secondary-400',
                    'invalidated:text-negative-400 invalidated:dark:text-negative-600',
                ]),'name' => $rightIcon]); ?>
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
        </button>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('after', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('popover')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['margin' => (bool) $label,'class' => 'w-full max-h-80 select-none overflow-hidden','x-ref' => 'optionsContainer','tabindex' => '-1','x-on:keydown.tab.prevent' => '$event.shiftKey || focusable.next()?.focus()','x-on:keydown.shift.tab.prevent' => 'focusable.previous()?.focus()','x-on:keydown.arrow-up.prevent' => 'focusable.previous()?.focus()','x-on:keydown.arrow-down.prevent' => 'focusable.next()?.focus()']); ?>
            <div
                class="px-2 my-2"
                wire:key="search.options.<?php echo e($name); ?>"
                x-show="asyncData.api || (config.searchable && options.length >= <?php echo \Illuminate\Support\Js::from($minItemsForSearch)->toHtml() ?>)"
            >
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-100','x-ref' => 'search','x-model.debounce.500ms' => 'search','shadowless' => true,'right-icon' => 'magnifying-glass','placeholder' => trans('wireui::messages.search_here'),'type' => 'search']); ?>
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
            </div>

            <div
                class="overflow-y-auto select-none max-h-60 snap-y snap-proximity overscroll-contain soft-scrollbar"
                tabindex="-1"
                name="wireui.select.options.<?php echo e($name); ?>"
            >
                <div
                    class="w-full h-0.5 rounded-full relative overflow-hidden"
                    :class="{ 'bg-gray-200 dark:bg-gray-700': asyncData.fetching }"
                >
                    <div
                        class="bg-primary-500 h-0.5 rounded-full absolute animate-linear-progress"
                        style="width: 30%"
                        x-show="asyncData.fetching"
                    ></div>
                </div>

                <!--[if BLOCK]><![endif]--><?php if(isset($beforeOptions)): ?>
                    <div <?php echo e($beforeOptions->attributes); ?>>
                        <?php echo e($beforeOptions); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <ul x-ref="listing" wire:ignore>
                    <template x-for="(option, index) in displayOptions" :key="`${index}.${option.value}`">
                        <li tabindex="-1" :index="index">
                            <div class="px-2 py-0.5">
                                <div class="w-full h-8 rounded animate-pulse bg-slate-200 dark:bg-slate-600"></div>
                            </div>
                        </li>
                    </template>
                </ul>

                <!--[if BLOCK]><![endif]--><?php if (! ($hideEmptyMessage)): ?>
                    <div
                        class="px-3 py-12 text-center cursor-pointer sm:py-2 sm:px-3 sm:text-left text-secondary-500"
                        x-show="displayOptions.length === 0"
                        x-on:click="search ? resetSearch() : positionable.close()"
                    >
                        <?php echo e($emptyMessage ?? trans('wireui::messages.empty_options')); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if(isset($afterOptions)): ?>
                    <div <?php echo e($afterOptions->attributes); ?>>
                        <?php echo e($afterOptions); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
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
     <?php $__env->endSlot(); ?>
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
<?php /**PATH C:\laragon2\www\pharmacy\vendor\wireui\wireui\src/Components/Select/views/base.blade.php ENDPATH**/ ?>