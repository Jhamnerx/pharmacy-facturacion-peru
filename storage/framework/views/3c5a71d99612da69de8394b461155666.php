<div class="overflow-x-auto border border-violet-400 rounded-lg">

    <table class="w-full">
        <!-- Table header -->
        <thead
            class="text-xs font-semibold uppercase text-white  bg-gradient-to-r from-slate-800  to-indigo-500 border-t border-b rounded-lg border-slate-200">
            <tr>
                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-left">CODIGO</div>
                </th>
                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">UNI/MEDIDA</div>
                </th>
                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-64 sm:w-48">
                    <div class="font-semibold text-center">CANTIDAD</div>
                </th>

                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">DESCRIPCION</div>
                </th>

                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">VALOR UNITARIO</div>
                </th>
                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">IGV</div>
                </th>
                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">IMPORTE DE VENTA</div>
                </th>


                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                    <div class="font-semibold text-center">ACCIONES</div>
                </th>


            </tr>
        </thead>
        <!-- Table body -->
        <tbody class="text-xs divide-y divide-slate-200 listaItems">

            <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                <div class="col-span-12 md:col-start-5 md:col-span-4">
                    <?php echo e(json_encode($items)); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $items->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clave => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="main bg-slate-100" wire:key="item-<?php echo e($clave); ?>">
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">

                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['codigo']); ?>

                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($errors->has('items.' . $clave . '.codigo')): ?>
                            <p class="mt-2
                                text-pink-600 text-sm">
                                <?php echo e($errors->first('items.' . $clave . '.codigo')); ?>

                            </p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">

                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['unit_name']); ?>

                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($errors->has('items.' . $clave . '.unit_name')): ?>
                            <p class="mt-2  text-pink-600 text-sm">
                                <?php echo e($errors->first('items.' . $clave . '.unit')); ?>

                            </p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </td>

                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap min-w-36 md:min-w-0">

                        <?php if (isset($component)) { $__componentOriginal52e32dd6052e70eb6819edea2a97985a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52e32dd6052e70eb6819edea2a97985a = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Number::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Number::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'items.'.e($clave).'.cantidad','min' => '1','step' => '1','placeholder' => 'Cantidad']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52e32dd6052e70eb6819edea2a97985a)): ?>
<?php $attributes = $__attributesOriginal52e32dd6052e70eb6819edea2a97985a; ?>
<?php unset($__attributesOriginal52e32dd6052e70eb6819edea2a97985a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52e32dd6052e70eb6819edea2a97985a)): ?>
<?php $component = $__componentOriginal52e32dd6052e70eb6819edea2a97985a; ?>
<?php unset($__componentOriginal52e32dd6052e70eb6819edea2a97985a); ?>
<?php endif; ?>
                    </td>

                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">

                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['descripcion']); ?>

                        </div>
                    </td>

                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['valor_unitario']); ?>

                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($errors->has('items.' . $clave . '.valor_unitario')): ?>
                            <p class="mt-2  text-pink-600 text-sm">
                                <?php echo e($errors->first('items.' . $clave . '.valor_unitario')); ?>

                            </p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>

                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['igv']); ?>

                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($errors->has('items.' . $clave . '.igv')): ?>
                            <p class="mt-2  text-pink-600 text-sm">
                                <?php echo e($errors->first('items.' . $clave . '.igv')); ?>

                            </p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-normal text-center">
                            <?php echo e($items[$clave]['total']); ?>

                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($errors->has('items.' . $clave . '.total')): ?>
                            <p class="mt-2  text-pink-600 text-sm">
                                <?php echo e($errors->first('items.' . $clave . '.total')); ?>

                            </p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>


                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                        <div class="space-x-1">

                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Eliminar','wire:click.prevent' => 'eliminarProducto(\''.e($clave).'\')','outline' => true,'red' => true,'sm' => true,'icon' => 'trash']); ?>
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
                        </div>
                    </td>



                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($items->count() < 1): ?>
                <tr>
                    <td colspan="9" class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">

                        <div class="font-normal text-center">
                            SELECCIONA UN COMPROBANTE
                        </div>

                    </td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
        <tfoot>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['items'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                    <?php echo e($message); ?>

                </p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </tfoot>
    </table>
</div>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/components/devoluciones/tabla-detalle.blade.php ENDPATH**/ ?>