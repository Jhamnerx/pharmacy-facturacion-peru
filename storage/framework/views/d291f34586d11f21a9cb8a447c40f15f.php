<header class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: Left side -->
            <div class="flex">

                <!-- Hamburger button -->
                <button class="text-slate-500 hover:text-slate-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

            </div>

            <div class="hover text-left mx-2 hidden md:flex">
                <p class="text-talentus-200 text-wrap text-xs md:text-base ">LOCAL: <b
                        class="hover:text-talentus-200"><?php echo e($local_actual); ?></b>
                </p>
            </div>
            <div class="relative inline-flex gap-1">
                <div id="status" class="disconnected"></div>
                <span id="status-text">Disconnected</span>
            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Search Button with Modal -->
                
                <div class="m-1.5">

                    <!-- Start -->
                    <!--[if BLOCK]><![endif]--><?php if(!Cache::has('precioVenta')): ?>
                        Obtener TC <?php if (isset($component)) { $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Mini::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.mini.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Mini::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'getTipoCambio()','spinner' => 'getTipoCambio','positive' => true,'icon' => 'arrow-path','xs' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $attributes = $__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__attributesOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6)): ?>
<?php $component = $__componentOriginal2a262af96c483a1eb8dd58a827ff85d6; ?>
<?php unset($__componentOriginal2a262af96c483a1eb8dd58a827ff85d6); ?>
<?php endif; ?>
                    <?php else: ?>
                        <div
                            class="text-sm hidden md:inline-flex font-medium bg-amber-100 text-amber-600 rounded-full text-center px-2.5 py-1">
                            TC - Venta: <?php echo e(Cache::get('precioVenta')); ?> Compra: <?php echo e(Cache::get('precioCompra')); ?>



                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                    <!-- End -->
                </div>


                <!-- Notifications button -->
                

                <!-- Empresa button -->
                <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>

                    <div class="relative inline-flex" x-data="{ open: false }">
                        <button
                            class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                            :class="{ 'bg-slate-200': open }" aria-haspopup="true" @click.prevent="open = !open"
                            :aria-expanded="open">
                            <span class="sr-only">Local</span>

                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g fill="none" class="nc-icon-wrapper">
                                    <path class="fill-current text-slate-500"
                                        d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        </button>
                        <div class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                            @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" x-cloak>
                            <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-3">
                                Selecciona Local
                            </div>
                            <ul x-data="{ selected: <?php echo e(session('local_id')); ?> }">


                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>

                                        <a wire:click.prevent="changeBussines(<?php echo e($local->id); ?>)"
                                            class="hover:bg-violet-400 focus:outline-none focus:ring font-medium text-sm hover:text-white flex items-center py-1 px-3"
                                            :class="selected === <?php echo e($local->id); ?> &&
                                                'border-transparent shadow-sm bg-violet-700 text-white'"
                                            href="#0" @click="open = false; selected = <?php echo e($local->id); ?>"
                                            @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2"
                                                viewBox="0 0 12 12">
                                                <rect y="3" width="12" height="9" rx="1" />
                                                <path d="M2 0h8v2H2z" />
                                            </svg>
                                            <span class="truncate"><?php echo e($local->nombre); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                            </ul>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <!-- Info button -->
                


                <!-- Dark mode toggle -->
                <?php if (isset($component)) { $__componentOriginal2090438866f3dcdb76cd8b070bcc302d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2090438866f3dcdb76cd8b070bcc302d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.theme-toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('theme-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2090438866f3dcdb76cd8b070bcc302d)): ?>
<?php $attributes = $__attributesOriginal2090438866f3dcdb76cd8b070bcc302d; ?>
<?php unset($__attributesOriginal2090438866f3dcdb76cd8b070bcc302d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2090438866f3dcdb76cd8b070bcc302d)): ?>
<?php $component = $__componentOriginal2090438866f3dcdb76cd8b070bcc302d; ?>
<?php unset($__componentOriginal2090438866f3dcdb76cd8b070bcc302d); ?>
<?php endif; ?>

                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none" />

                <!-- User button -->
                <?php if (isset($component)) { $__componentOriginal47960a53ca22e4c0165823f6e04bb506 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47960a53ca22e4c0165823f6e04bb506 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-profile','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47960a53ca22e4c0165823f6e04bb506)): ?>
<?php $attributes = $__attributesOriginal47960a53ca22e4c0165823f6e04bb506; ?>
<?php unset($__attributesOriginal47960a53ca22e4c0165823f6e04bb506); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47960a53ca22e4c0165823f6e04bb506)): ?>
<?php $component = $__componentOriginal47960a53ca22e4c0165823f6e04bb506; ?>
<?php unset($__componentOriginal47960a53ca22e4c0165823f6e04bb506); ?>
<?php endif; ?>

            </div>

        </div>
    </div>
</header>

<?php $__env->startPush('scripts'); ?>
    <script>
        const statusElement = document.getElementById('status');
        const statusTextElement = document.getElementById('status-text');

        function updateStatus(connected) {
            //console.log('updateStatus', connected);
            if (connected) {
                statusElement.classList.remove('disconnected');
                statusElement.classList.add('connected');
                statusTextElement.textContent = ' Impresora Conectada';
            } else {
                statusElement.classList.remove('connected');
                statusElement.classList.add('disconnected');
                statusTextElement.textContent = ' Impresora Desconectada';
            }
        }

        const socket = new WebSocket("ws://127.0.0.1:40213/");

        socket.addEventListener('open', function(event) {
            // console.log('WebSocket is connected.');
            updateStatus(true);
        });

        socket.addEventListener('close', function(event) {
            // console.log('WebSocket is closed.');
            updateStatus(false);
        });

        socket.addEventListener('error', function(event) {
            // console.log('WebSocket error:', event);
            updateStatus(false);
        });

        // Check periodically to see if the connection is still open
        setInterval(function() {
            if (socket.readyState !== WebSocket.OPEN) {
                updateStatus(false);
            }
        }, 5000); // Check every 5 seconds
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/livewire/admin/plantilla/header.blade.php ENDPATH**/ ?>