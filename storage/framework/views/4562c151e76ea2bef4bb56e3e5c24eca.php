<div class="px-4 sm:px-6 lg:px-8 py-8 w-full mx-auto">

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 dark:text-slate-400 font-bold">DEVOLUCIONES ✨</h1>
        </div>

    </div>

    <!-- More actions -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Right side -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Search form -->
            <form class="relative">
                <label for="action-search" class="sr-only">Search</label>
                <input name="codigo" id="action-search" class="form-input pl-9 focus:border-slate-300" type="search"
                    wire:model.live="search" placeholder="codigo o serie…" />
                <button type="button" class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                        <path
                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                    </svg>
                </button>
            </form>

            <!-- Create invoice button -->

            <a href="<?php echo e(route('admin.devoluciones.create')); ?>">
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Registrar</span>
                </button>
            </a>


        </div>

    </div>

    <!-- Table -->
    <?php if (isset($component)) { $__componentOriginal04b90e5141c789a7ac909d0cdac0a20b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal04b90e5141c789a7ac909d0cdac0a20b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.devoluciones.table','data' => ['devoluciones' => $devoluciones]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('devoluciones.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['devoluciones' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($devoluciones)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal04b90e5141c789a7ac909d0cdac0a20b)): ?>
<?php $attributes = $__attributesOriginal04b90e5141c789a7ac909d0cdac0a20b; ?>
<?php unset($__attributesOriginal04b90e5141c789a7ac909d0cdac0a20b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal04b90e5141c789a7ac909d0cdac0a20b)): ?>
<?php $component = $__componentOriginal04b90e5141c789a7ac909d0cdac0a20b; ?>
<?php unset($__componentOriginal04b90e5141c789a7ac909d0cdac0a20b); ?>
<?php endif; ?>

    <!-- Pagination -->
    <div class="mt-8">
        <?php echo e($devoluciones->links()); ?>

    </div>

</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('imprimir-ticket', (event) => {

                console.log(event.datos);

                //imprimirHolaMundo(IMPRESORA_POR_DEFECTO);
                pc_print(event.datos);
            });


            function pc_print(data) {
                var socket = new WebSocket("ws://127.0.0.1:40213/");
                socket.bufferType = "arraybuffer";
                socket.onerror = function(error) {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').notifyError();
                };
                socket.onopen = function() {
                    socket.send(data);
                    socket.close(1000, "Work complete");
                };
            }

        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/devoluciones/index.blade.php ENDPATH**/ ?>