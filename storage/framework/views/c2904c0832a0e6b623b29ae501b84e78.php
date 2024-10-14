<div>
    <div
        class="my-4 container px-10 mx-auto flex flex-col md:flex-row items-start md:items-center justify-between pb-4 border-b border-gray-300">
        <!-- Add customer button -->
        <a href="<?php echo e(route('admin.ventas.index')); ?>">
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back w-5 h-5"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                <span class="hidden xs:block ml-2">Atras</span>
            </button>
        </a>
        <div class="mt-2 md:mt-0">
            <h4 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">EMITIR COMPROBANTE</h4>
            <ul aria-label="current Status"
                class="flex flex-col md:flex-row items-start md:items-center text-gray-600 dark:text-gray-400 text-sm mt-3">
            </ul>
        </div>
    </div>
    <!-- Code block ends -->
    <div class="p-2 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-2 bg-slate-100 dark:bg-gray-700 sm:p-2">
            <div class="grid grid-cols-12 gap-2">
                
                <div class="col-span-12 md:col-span-9">
                    
                    <div
                        class="grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        
                        <div class="col-span-12 lg:col-span-2">
                            <div>
                                <img src="<?php echo e(Storage::url($empresa->logo)); ?>">
                            </div>
                        </div>

                        
                        <div
                            class="col-span-12 lg:col-span-4 xl:col-span-4 pl-6 self-center overflow-hidden text-ellipsis">
                            <div class="mb-0" style="line-height: initial;">
                                <span class="font-bold text-slate-800 dark:text-gray-200">
                                    <?php echo e($empresa->nombre_comercial); ?>

                                </span>
                                <br>
                                <span class="text-slate-600 dark:text-gray-400"><?php echo e($empresa->correo); ?></span>
                            </div>
                        </div>

                        
                        <div class="col-span-12 lg:col-span-6 xl:col-span-6 self-end">

                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <?php if (isset($component)) { $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $attributes; } ?>
<?php $component = WireUi\Components\DatetimePicker\Picker::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.datetime.picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\DatetimePicker\Picker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Fec. Emision:','id' => 'fecha_emision','name' => 'fecha_emision','wire:model.live' => 'fecha_emision','min' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->subDays(1)),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()),'without-time' => true,'parse-format' => 'YYYY-MM-DD','display-format' => 'DD-MM-YYYY','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $attributes = $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $component = $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
                                </div>

                                <div class="col-span-6">
                                    <?php if (isset($component)) { $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12 = $attributes; } ?>
<?php $component = WireUi\Components\DatetimePicker\Picker::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.datetime.picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\DatetimePicker\Picker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Fec. Vencimiento:','id' => 'fecha_vencimiento','name' => 'fecha_vencimiento','wire:model.live' => 'fecha_vencimiento','min' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->subDays(1)),'max' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(now()->addDays(90)),'without-time' => true,'parse-format' => 'YYYY-MM-DD','display-format' => 'DD-MM-YYYY','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $attributes = $__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__attributesOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12)): ?>
<?php $component = $__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12; ?>
<?php unset($__componentOriginalf5ec2314556edbf2ae00bd09d5d0fe12); ?>
<?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>

                    
                    <div
                        class="col-span-12 md:col-span-9 grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        <?php
                            if ($empresa->regimen_type == 'NRUS') {
                                $opciones = [
                                    ['name' => 'BOLETA ELECTRONICA', 'id' => '03'],
                                    ['name' => 'N. VENTA ELECTRONICA', 'id' => '02'],
                                ];
                            } else {
                                $opciones = [
                                    ['name' => 'FACTURA ELECTRONICA', 'id' => '01'],
                                    ['name' => 'BOLETA ELECTRONICA', 'id' => '03'],
                                    ['name' => 'N. VENTA ELECTRONICA', 'id' => '02'],
                                ];
                            }

                        ?>
                        <div class="col-span-12 xs:col-span-4">
                            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tipo comprobante:','id' => 'tipo_comprobante_id','name' => 'tipo_comprobante_id','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($opciones),'option-label' => 'name','option-value' => 'id','wire:model.live' => 'tipo_comprobante_id','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 xs:col-span-4 xl:col-span-3">
                            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'serie','name' => 'serie','label' => 'Serie:','wire:model.live' => 'serie','placeholder' => 'Selecciona una serie','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($series),'option-label' => 'serie','option-value' => 'serie']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 xs:col-span-4 xl:col-span-3">
                            <?php if (isset($component)) { $__componentOriginal52e32dd6052e70eb6819edea2a97985a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52e32dd6052e70eb6819edea2a97985a = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Number::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Number::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['readonly' => true,'id' => 'correlativo','name' => 'correlativo','wire:model.live' => 'correlativo','label' => 'Correlativo:']); ?>
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
                        </div>

                        
                        <div class="col-span-12 xs:col-span-6 xl:col-span-3">
                            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Divisa:','id' => 'divisa','name' => 'divisa','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['name' => 'SOLES', 'id' => 'PEN'], ['name' => 'DOLARES', 'id' => 'USD']]),'option-label' => 'name','option-value' => 'id','wire:model.live' => 'divisa','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'currency-dollar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($tipo_comprobante_id !== '02'): ?>
                            <div class="col-span-12 xs:col-span-6 xl:col-span-3">
                                <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'forma_pago','name' => 'forma_pago','label' => 'Forma Pago:','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                    ['name' => 'CONTADO', 'id' => 'CONTADO'],
                                    ['name' => 'CREDITO', 'id' => 'CREDITO'],
                                ]),'option-label' => 'name','option-value' => 'id','wire:model.live' => 'forma_pago','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div
                        class="col-span-12 md:col-span-9 grid grid-cols-12 gap-2 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        <div class="col-span-12 md:col-span-6">
                            <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'cliente_id','name' => 'cliente_id','label' => 'Selecciona un cliente:','wire:model.live' => 'cliente_id','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'placeholder' => 'Escriba el nombre o número de documento del cliente','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                    'api' => route('api.clientes.index'),
                                    'params' => [
                                        'tipo_comprobante' => $tipo_comprobante_id,
                                        'local_id' => session('local_id'),
                                    ],
                                ]),'option-label' => 'razon_social','option-value' => 'id','option-description' => 'numero_documento','x-on:clear' => '$wire.direccion = \'\'']); ?>
                                 <?php $__env->slot('afterOptions', null, ['class' => 'p-2 flex justify-center','x-show' => 'displayOptions.length === 0']); ?> 
                                    <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'OpenModalCliente(`${search}`)','primary' => true,'flat' => true,'full' => true]); ?>
                                        <span x-html="`Crear cliente <b>${search}</b>`"></span>
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
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'direccion','name' => 'direccion','label' => 'Direccion:','wire:model.live' => 'direccion','placeholder' => 'Ingresa direccion']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $attributes = $__attributesOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__attributesOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $component = $__componentOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__componentOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 md:col-span-3">

                    <div
                        class="col-span-12 md:col-span-3 grid grid-cols-12 gap-4 bg-white dark:bg-gray-800 items-start border rounded-md m-3 p-4">

                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal49f7089ef4c669895a04f5fadb180b38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49f7089ef4c669895a04f5fadb180b38 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['left-label' => 'Disminuir Stock:','value' => 'true','lg' => true,'id' => 'decrease_stock','wire:model.live' => 'decrease_stock']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49f7089ef4c669895a04f5fadb180b38)): ?>
<?php $attributes = $__attributesOriginal49f7089ef4c669895a04f5fadb180b38; ?>
<?php unset($__attributesOriginal49f7089ef4c669895a04f5fadb180b38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49f7089ef4c669895a04f5fadb180b38)): ?>
<?php $component = $__componentOriginal49f7089ef4c669895a04f5fadb180b38; ?>
<?php unset($__componentOriginal49f7089ef4c669895a04f5fadb180b38); ?>
<?php endif; ?>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if(!$deduce_anticipos): ?>
                            <div class="col-span-12 text-center">
                                <?php if (isset($component)) { $__componentOriginal12ee426d66882c66c79ce07deee9e49f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal12ee426d66882c66c79ce07deee9e49f = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['left-label' => '¿Es un pago anticipado?','md' => true,'id' => 'pago_anticipado','wire:model.live' => 'pago_anticipado','value' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $attributes = $__attributesOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $component = $__componentOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__componentOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if(!$pago_anticipado && !$detraccion): ?>
                            <div class="col-span-12 text-center">
                                <?php if (isset($component)) { $__componentOriginal12ee426d66882c66c79ce07deee9e49f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal12ee426d66882c66c79ce07deee9e49f = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['left-label' => 'Deducción de los pagos anticipados','md' => true,'wire:model.live' => 'deduce_anticipos','id' => 'deduce_anticipos','value' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $attributes = $__attributesOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $component = $__componentOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__componentOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if($tipo_comprobante_id != '02'): ?>
                            <!--[if BLOCK]><![endif]--><?php if(!$deduce_anticipos): ?>
                                <div class="col-span-12 text-center">
                                    <?php if (isset($component)) { $__componentOriginal12ee426d66882c66c79ce07deee9e49f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal12ee426d66882c66c79ce07deee9e49f = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['left-label' => 'Operación con Detraccion','md' => true,'wire:model.live' => 'detraccion','id' => 'detraccion','value' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $attributes = $__attributesOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__attributesOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal12ee426d66882c66c79ce07deee9e49f)): ?>
<?php $component = $__componentOriginal12ee426d66882c66c79ce07deee9e49f; ?>
<?php unset($__componentOriginal12ee426d66882c66c79ce07deee9e49f); ?>
<?php endif; ?>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                        <!--[if BLOCK]><![endif]--><?php if($detraccion): ?>
                            <div class="col-span-12 text-left">
                                <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['xs' => true,'wire:click' => 'openModalDetraccion','spinner' => 'openModalDetraccion','outline' => true,'primary' => true,'label' => 'Informacion de la detraccion']); ?>
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


                            <?php if (isset($component)) { $__componentOriginal6a7d148983ed3ace55a3e668006b80a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a7d148983ed3ace55a3e668006b80a5 = $attributes; } ?>
<?php $component = WireUi\Components\Modal\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.modal.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Modal\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Información de Detracción','max-width' => 'lg','wire:model.live' => 'openModalDt','align' => 'center']); ?>

                                <div
                                    class="grid grid-cols-12 gap-6 text-sm col-span-12 rounded-lg shadow-lg bg-white dark:bg-gray-800 text-center border border-gray-300 px-4 py-4">

                                    <div class="col-span-12">

                                        <span class="font-semibold">La información de detraccion siempre se registrará
                                            en
                                            moneda nacional "SOL"
                                            independiente de la moneda
                                            del comprobante.</span>
                                    </div>

                                    <div class="col-span-12">

                                        <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'codigo_detraccion','name' => 'codigo_detraccion','label' => 'código de bien/servicio sujeto a detracción*:','wire:model.live' => 'datosDetraccion.codigo_detraccion','placeholder' => 'Selecciona','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                                'api' => route('api.detracciones.index'),
                                            ]),'option-label' => 'descripcion','option-value' => 'codigo']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>

                                    </div>
                                    <div class="col-span-12 sm:col-span-6">

                                        <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'datosDetraccion.cuenta_bancaria','label' => 'Nro. Cta. Banco de la Nación:','placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $attributes = $__attributesOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__attributesOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $component = $__componentOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__componentOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>

                                    </div>
                                    <div class="col-span-12 sm:col-span-6">

                                        <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','id' => 'metodo_pago_id','name' => 'metodo_pago_id','label' => 'Medio de pago:','wire:model.live' => 'datosDetraccion.metodo_pago_id','placeholder' => 'Selecciona','async-data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                                'api' => route('api.metodos.pago.index'),
                                            ]),'option-label' => 'descripcion','option-value' => 'codigo']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">

                                        <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'datosDetraccion.porcentaje','label' => 'Porcentaje de detracción:','placeholder' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $attributes = $__attributesOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__attributesOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $component = $__componentOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__componentOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>

                                    </div>

                                    <div class="col-span-12 sm:col-span-6">

                                        <?php if (isset($component)) { $__componentOriginal125559500674abc14ca4c750a63c3764 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal125559500674abc14ca4c750a63c3764 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'datosDetraccion.monto','label' => 'Monto de detracción:','placeholder' => '0.00']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $attributes = $__attributesOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__attributesOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal125559500674abc14ca4c750a63c3764)): ?>
<?php $component = $__componentOriginal125559500674abc14ca4c750a63c3764; ?>
<?php unset($__componentOriginal125559500674abc14ca4c750a63c3764); ?>
<?php endif; ?>

                                    </div>

                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a7d148983ed3ace55a3e668006b80a5)): ?>
<?php $attributes = $__attributesOriginal6a7d148983ed3ace55a3e668006b80a5; ?>
<?php unset($__attributesOriginal6a7d148983ed3ace55a3e668006b80a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a7d148983ed3ace55a3e668006b80a5)): ?>
<?php $component = $__componentOriginal6a7d148983ed3ace55a3e668006b80a5; ?>
<?php unset($__componentOriginal6a7d148983ed3ace55a3e668006b80a5); ?>
<?php endif; ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    
                    <!--[if BLOCK]><![endif]--><?php if($detraccion): ?>
                        <div
                            class="col-span-12 md:col-span-3 grid grid-cols-12 gap-2 bg-white items-start border rounded-md m-3 p-4">
                            <div class="col-span-12">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['datosDetraccion'];
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
                                <div class="col-span-6">
                                    <?php if (isset($component)) { $__componentOriginal983a7eb9047f01311cddd82e78ab7d46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal983a7eb9047f01311cddd82e78ab7d46 = $attributes; } ?>
<?php $component = WireUi\Components\Card\Index::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Card\Index::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Datos de detracción']); ?>
                                        <ol>
                                            <li>
                                                <span class="font-semibold">Cuenta Bancaria:</span>
                                                <?php echo e($datosDetraccion['cuenta_bancaria']); ?>

                                            </li>
                                            <li>
                                                <span class="font-semibold">Codigo Detraccion:</span>
                                                <?php echo e($datosDetraccion['codigo_detraccion']); ?>

                                            </li>

                                            <li>
                                                <span class="font-semibold">Porcentaje:</span>
                                                <?php echo e($datosDetraccion['porcentaje']); ?>

                                            </li>
                                            <li>
                                                <span class="font-semibold">Monto:</span>
                                                <?php echo e($datosDetraccion['monto']); ?>

                                            </li>
                                        </ol>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal983a7eb9047f01311cddd82e78ab7d46)): ?>
<?php $attributes = $__attributesOriginal983a7eb9047f01311cddd82e78ab7d46; ?>
<?php unset($__attributesOriginal983a7eb9047f01311cddd82e78ab7d46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal983a7eb9047f01311cddd82e78ab7d46)): ?>
<?php $component = $__componentOriginal983a7eb9047f01311cddd82e78ab7d46; ?>
<?php unset($__componentOriginal983a7eb9047f01311cddd82e78ab7d46); ?>
<?php endif; ?>
                                </div>

                                <!--[if BLOCK]><![endif]--><?php if(
                                    $errors->has('datosDetraccion.cuenta_bancaria') ||
                                        $errors->has('datosDetraccion.codigo_detraccion') ||
                                        $errors->has('datosDetraccion.metodo_pago_id') ||
                                        $errors->has('datosDetraccion.porcentaje') ||
                                        $errors->has('datosDetraccion.monto')): ?>
                                    <div class="col-span-12">
                                        <p class="mt-2  text-pink-600 text-sm">
                                            <?php echo e($errors->first('datosDetraccion.cuenta_bancaria')); ?>

                                            <br>
                                            <?php echo e($errors->first('datosDetraccion.codigo_detraccion')); ?>

                                            <br>
                                            <?php echo e($errors->first('datosDetraccion.metodo_pago_id')); ?>

                                            <br>
                                            <?php echo e($errors->first('datosDetraccion.porcentaje')); ?>

                                            <br>
                                            <?php echo e($errors->first('datosDetraccion.monto')); ?>

                                        </p>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <!--[if BLOCK]><![endif]--><?php if($showCredit): ?>
                        <div
                            class="col-span-12 md:col-span-3 grid grid-cols-12 gap-2 bg-white items-start border border-gray-300 rounded-md m-3">

                            <?php if (isset($component)) { $__componentOriginal29579e21fc2675ac09427bf6c004c3af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29579e21fc2675ac09427bf6c004c3af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ventas.detalle-cuotas-table','data' => ['cuotas' => $detalle_cuotas,'totalcuotas' => $total_cuotas,'simbolo' => $simbolo,'total' => $total,'detraccion' => $datosDetraccion]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ventas.detalle-cuotas-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cuotas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($detalle_cuotas),'totalcuotas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($total_cuotas),'simbolo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($simbolo),'total' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($total),'detraccion' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($datosDetraccion)]); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29579e21fc2675ac09427bf6c004c3af)): ?>
<?php $attributes = $__attributesOriginal29579e21fc2675ac09427bf6c004c3af; ?>
<?php unset($__attributesOriginal29579e21fc2675ac09427bf6c004c3af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29579e21fc2675ac09427bf6c004c3af)): ?>
<?php $component = $__componentOriginal29579e21fc2675ac09427bf6c004c3af; ?>
<?php unset($__componentOriginal29579e21fc2675ac09427bf6c004c3af); ?>
<?php endif; ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    

                </div>
            </div>
        </div>



        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-700 sm:p-1">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tipo_cambio'];
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

            <div class="grid grid-cols-12 gap-2">

                <div class="col-span-12 mt-2 pt-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg px-3">

                    <div class="grid grid-cols-5 gap-2 mt-2 pt-2 pb-2 px-3 mb-2">

                        <div class="col-span-6 sm:col-span-2">

                            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'openModalAddProducto','label' => 'AÑADIR PRODUCTO','primary' => true,'md' => true,'icon' => 'plus']); ?>
                                 <?php $__env->slot('append', null, ['wire:ignore' => true]); ?> 
                                    <?php if (isset($component)) { $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655 = $attributes; } ?>
<?php $component = WireUi\Components\Badge\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Badge\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['white' => true,'label' => 'F2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $attributes = $__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__attributesOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655)): ?>
<?php $component = $__componentOriginalb3b4efb7fe41ab882e85629f7bd48655; ?>
<?php unset($__componentOriginalb3b4efb7fe41ab882e85629f7bd48655); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
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

                    </div>

                    

                    <?php if (isset($component)) { $__componentOriginal8d20cd6ecee897682770b708213435a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20cd6ecee897682770b708213435a6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ventas.tabla-detalle','data' => ['items' => $items,'prepayments' => $prepayments,'tipo' => $tipo_comprobante_id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ventas.tabla-detalle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'prepayments' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prepayments),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tipo_comprobante_id)]); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20cd6ecee897682770b708213435a6)): ?>
<?php $attributes = $__attributesOriginal8d20cd6ecee897682770b708213435a6; ?>
<?php unset($__attributesOriginal8d20cd6ecee897682770b708213435a6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20cd6ecee897682770b708213435a6)): ?>
<?php $component = $__componentOriginal8d20cd6ecee897682770b708213435a6; ?>
<?php unset($__componentOriginal8d20cd6ecee897682770b708213435a6); ?>
<?php endif; ?>

                    <div class="block md:flex gap-2">
                        
                        <div class="grid grid-cols-12 gap-4 w-full px-4 mx-4 py-2 ml-auto mt-5">

                            
                            <div class="col-span-12 border-b border-cyan-600">
                                <h4 class="font-semibold">DESCUENTO</h4>
                            </div>

                            <div class="col-span-12 md:col-span-12">

                                <div class="flex flex-wrap gap-4">
                                    <div class="mt-2 flex gap-5">
                                        <?php if (isset($component)) { $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Radio::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => 'cantidad','id' => 'left-label','md' => true,'left-label' => 'S/','wire:model.live' => 'tipo_descuento']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $attributes = $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $component = $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
                                        
                                    </div>


                                    <?php if (isset($component)) { $__componentOriginal5b0811533b7e6484d46a99f1515e2054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b0811533b7e6484d46a99f1515e2054 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Currency::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Currency::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'descuento_monto','name' => 'descuento_monto','icon' => 'currency-dollar','placeholder' => 'Monto descuento','wire:model.blur' => 'descuento_monto','precision' => '2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $attributes = $__attributesOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__attributesOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b0811533b7e6484d46a99f1515e2054)): ?>
<?php $component = $__componentOriginal5b0811533b7e6484d46a99f1515e2054; ?>
<?php unset($__componentOriginal5b0811533b7e6484d46a99f1515e2054); ?>
<?php endif; ?>
                                    <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                                        <?php echo e($descuento_monto); ?>-<?php echo e($descuento); ?> -<?php echo e($descuento_factor); ?>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                            </div>

                            
                            <div class="col-span-12 md:col-span-6">

                                <?php if (isset($component)) { $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061 = $attributes; } ?>
<?php $component = WireUi\Components\Select\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Select\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'metodo_pago_id','name' => 'metodo_pago_id','label' => 'MÉTODO DE PAGO:','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                        ['name' => 'En efectivo', 'id' => '009'],
                                        ['name' => 'Depósito en cuenta', 'id' => '001'],
                                        ['name' => 'Tarjeta de débito', 'id' => '005'],
                                        ['name' => 'Tarjeta de crédito', 'id' => '006'],
                                        ['name' => 'Transferencia bancaria', 'id' => '003'],
                                        ['name' => 'Giro', 'id' => '002'],
                                        ['name' => 'Otros medios de pago', 'id' => '999'],
                                    ]),'option-label' => 'name','option-value' => 'id','wire:model.live' => 'metodo_pago_id','clearable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $attributes = $__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__attributesOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061)): ?>
<?php $component = $__componentOriginal49b3de13d927faa5a3ecd49fc0b06061; ?>
<?php unset($__componentOriginal49b3de13d927faa5a3ecd49fc0b06061); ?>
<?php endif; ?>

                            </div>

                            
                            <div class="col-span-12">

                                <?php if (isset($component)) { $__componentOriginal766d51b9779a62d55606e4facdbf6fa8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal766d51b9779a62d55606e4facdbf6fa8 = $attributes; } ?>
<?php $component = WireUi\Components\TextField\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\TextField\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Comentario:','id' => 'comentario','name' => 'comentario','wire:model.live' => 'comentario','placeholder' => 'Escribe tu comentario']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal766d51b9779a62d55606e4facdbf6fa8)): ?>
<?php $attributes = $__attributesOriginal766d51b9779a62d55606e4facdbf6fa8; ?>
<?php unset($__attributesOriginal766d51b9779a62d55606e4facdbf6fa8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal766d51b9779a62d55606e4facdbf6fa8)): ?>
<?php $component = $__componentOriginal766d51b9779a62d55606e4facdbf6fa8; ?>
<?php unset($__componentOriginal766d51b9779a62d55606e4facdbf6fa8); ?>
<?php endif; ?>
                            </div>

                        </div>

                        
                        <div class="py-2 ml-auto mt-5 w-full mx-4">
                            <div class="text-right mb-4 border-b border-gray-300 dark:border-gray-700">
                                <h4 class="font-semibold text-gray-900 dark:text-gray-200">RESUMEN</h4>
                            </div>

                            <div class="flex justify-between ">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    SUB TOTAL</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        <?php echo e($simbolo); ?> <span><?php echo e(round($sub_total, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!--[if BLOCK]><![endif]--><?php if($deduce_anticipos): ?>
                                <div class="flex justify-between ">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        ANTICIPOS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($total_anticipos, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <div class="flex justify-between mt-2">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    OP. GRAVADAS</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        <?php echo e($simbolo); ?> <span><?php echo e(round($op_gravadas, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!--[if BLOCK]><![endif]--><?php if($op_exoneradas > 0): ?>
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. EXONERADAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($op_exoneradas, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php if($op_inafectas > 0): ?>
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. INAFECTAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($op_inafectas, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php if($op_gratuitas > 0): ?>
                                <div class="flex justify-between mt-2">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                        OP. GRATUITAS</div>
                                    <div class="text-right w-40">
                                        <div class="text-gray-800 text-sm dark:text-gray-300">
                                            <?php echo e($simbolo); ?> <span><?php echo e(round($op_gratuitas, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <div class="flex justify-between mt-2">
                                <div
                                    class="text-gray-900 text-right flex-1 font-medium text-sm text-lg dark:text-gray-200">
                                    DESCUENTO (-)</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300">
                                        <?php echo e($simbolo); ?> <span><?php echo e(round($descuento, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mb-4 mt-2">
                                <div class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                    IGV(18%)</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300"><?php echo e($simbolo); ?>

                                        <span><?php echo e(round($igv, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mb-4 mt-2">
                                <div class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                    ICBPER</div>
                                <div class="text-right w-40">
                                    <div class="text-gray-800 text-sm dark:text-gray-300"><?php echo e($simbolo); ?>

                                        <span><?php echo e(number_format($icbper, 2)); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2 border-t border-b border-indigo-500 dark:border-gray-700">
                                <div class="flex justify-between">
                                    <div
                                        class="text-gray-900 text-right flex-1 font-medium text-sm dark:text-gray-200">
                                        Importe Total</div>
                                    <div class="text-right w-40">
                                        <div class="text-xl text-gray-800 font-bold dark:text-gray-300">
                                            <?php echo e($simbolo); ?><span><?php echo e(round($total, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--[if BLOCK]><![endif]--><?php if($showCredit): ?>
                                
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if(app()->environment('local')): ?>
                <?php echo e(json_encode($errors->all())); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div
                class="px-4 py-3 text-right sm:px-6 sticky my-2 bg-white dark:bg-gray-800 border-b border-slate-200 dark:border-slate-900 z-5">
                <div class="grid <?php echo e($tipo_comprobante_id == '02' ? '' : 'sm:grid-cols-2'); ?> gap-2 content-end">
                    <!--[if BLOCK]><![endif]--><?php if($tipo_comprobante_id == '01' || $tipo_comprobante_id == '03'): ?>
                        <div class="flex gap-10 w-full">
                            <div class="inline-flex items-center">

                                <?php if (isset($component)) { $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Radio::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'id_type1','wire:model' => 'metodo_type','value' => '01','lg' => true,'label' => 'SOLO FIRMAR E IMPRIMIR']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $attributes = $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $component = $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>

                            </div>

                            <div class="inline-flex items-center">

                                <?php if (isset($component)) { $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4 = $attributes; } ?>
<?php $component = WireUi\Components\Switcher\Radio::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Switcher\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'id_type2','wire:model' => 'metodo_type','value' => '02','lg' => true,'label' => 'ENVIAR A SUNAT AHORA']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $attributes = $__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__attributesOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4)): ?>
<?php $component = $__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4; ?>
<?php unset($__componentOriginal7a764196c9adf4dff8d0ea92efd9a9b4); ?>
<?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="text-center md:text-right">
                        <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'save','spinner' => 'save','label' => 'EMITIR COMPROBANTE','black' => true,'md' => true,'icon' => 'shopping-cart']); ?>
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
                </div>
            </div>


        </div>

    </div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.productos.modal-add-producto', ['deduceAnticipos' => $deduce_anticipos,'comprobanteSlug' => $comprobante_slug,'tipoComprobanteId' => $tipo_comprobante_id,'deduce_anticipos' => $deduce_anticipos,'comprobante_slug' => $comprobante_slug,'divisa' => $divisa,'tipo_comprobante_id' => $tipo_comprobante_id]);

$__html = app('livewire')->mount($__name, $__params, 'producto-add-', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('keydown', function(event) {
            try {
                if (event.key === 'F2') {
                    // Ejecutar la acción deseada
                    ejecutarAccion();
                    // Prevenir la acción por defecto de la tecla F2 (renombrar en el Explorador de archivos de Windows)
                    event.preventDefault();
                }
            } catch (error) {
                console.error('Se produjo un error al presionar la tecla F2:', error);
            }
        });

        function ejecutarAccion() {
            // Aquí va la lógica de la acción a ejecutar
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').openModalAddProducto();
            console.log('Tecla F2 presionada. Acción ejecutada.');
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/comprobantes/ventas/emitir.blade.php ENDPATH**/ ?>