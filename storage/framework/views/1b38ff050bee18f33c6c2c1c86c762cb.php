<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="icon" href="<?php echo e(asset('imagenes/favicon2023.png')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

    
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>



    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Styles -->
    <script >window.Wireui = {cache: {},hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="http://pharmacy.test/wireui/assets/scripts?id=0d8f3f5397f3b35df10c017bfdd8593c" defer ></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }
    </script>
    <style>
        #status {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .connected {
            background-color: green;
        }

        .disconnected {
            background-color: red;
        }
    </style>
</head>

<body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400"
    :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'false') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-[100dvh] overflow-hidden">

        <?php if (isset($component)) { $__componentOriginal790df3a3003b05a46d3e5fdd59aeab47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47)): ?>
<?php $attributes = $__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47; ?>
<?php unset($__attributesOriginal790df3a3003b05a46d3e5fdd59aeab47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal790df3a3003b05a46d3e5fdd59aeab47)): ?>
<?php $component = $__componentOriginal790df3a3003b05a46d3e5fdd59aeab47; ?>
<?php unset($__componentOriginal790df3a3003b05a46d3e5fdd59aeab47); ?>
<?php endif; ?>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">

            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.plantilla.header', ['page' => request()->fullUrl()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4257861736-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php if (isset($component)) { $__componentOriginalff9615640ecc9fe720b9f7641382872b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff9615640ecc9fe720b9f7641382872b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $attributes = $__attributesOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__attributesOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $component = $__componentOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__componentOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('app.header.reportes');

$__html = app('livewire')->mount($__name, $__params, 'lw-4257861736-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            

            <main class="grow">
                <?php echo $__env->yieldContent('contenido'); ?>
            </main>

        </div>

    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.reportes.ventas');

$__html = app('livewire')->mount($__name, $__params, 'lw-4257861736-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>

    <input id="localId" type="hidden" name="local_id" value="<?php echo e(session('local_id')); ?>">
</body>
<script>
    document.addEventListener('livewire:initialized', () => {
        //success
        //question
        //info
        //warning
        //error
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,

            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });


        Livewire.on('notify-toast', (event) => {
            Toast.fire({
                icon: event.icon,
                title: `<div  style="font-size: 15px; color: #056b85;"> ` +
                    event.title + `</div`,
                html: `<div  style="font-size: 14px; color: #056b85;"> ` +
                    event.mensaje + `</div`,
                showCloseButton: true,
                width: event.width ? event.width : '32em',
                timer: event.timer ? event.timer : 3000,
            });

        });


        Livewire.on('error', (event) => {
            Toast.fire({
                icon: 'error',
                title: event.title,
                html: event.mensaje,
                showCloseButton: true,
            });
        });

        Livewire.on('notify', (event) => {
            Swal.fire({
                icon: event.icon,
                title: event.title,
                text: event.mensaje,
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
        });


    });
</script>
<?php if(session('venta-registrada')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'VENTA REGISTRADA',
                text: '<?php echo e(session('venta-registrada')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>
<?php if(session('cotizacion-registrada')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'COTIZACIÓN REGISTRADA',
                text: '<?php echo e(session('cotizacion-registrada')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>
<?php if(session('compra-registrada')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'COMPRA REGISTRADA',
                text: '<?php echo e(session('compra-registrada')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>
<?php if(session('cotizacion-actualizada')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'COTIZACIÓN ACTUALIZADA',
                text: '<?php echo e(session('actualizada-registrada')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>
<?php if(session('nota-registrada')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'NOTA REGISTRADA',
                text: '<?php echo e(session('nota-registrada')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>

<?php if(session('guia-store')): ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'GUIA REGISTRADA',
                text: '<?php echo e(session('guia-store')); ?>',
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            })
        });
    </script>
<?php endif; ?>


<?php echo $__env->yieldContent('js'); ?>
<script>
    $(document).ready(function() {

        Echo.channel('ventas')
            .listen('VentaCreada', e => {
                console.log('evento venta creada', e);
            })

    });
</script>




</html>
<?php /**PATH C:\laragon2\www\pharmacy\resources\views/layouts/app.blade.php ENDPATH**/ ?>