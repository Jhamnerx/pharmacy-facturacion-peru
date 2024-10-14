<?php $__env->startSection('contenido'); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comprobantes.cotizaciones.emitir');

$__html = app('livewire')->mount($__name, $__params, 'lw-1340705712-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('modals'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.clientes.create');

$__html = app('livewire')->mount($__name, $__params, 'lw-1340705712-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    
<?php $__env->stopPush(); ?>



<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon2\www\pharmacy\resources\views/admin/cotizaciones/create.blade.php ENDPATH**/ ?>