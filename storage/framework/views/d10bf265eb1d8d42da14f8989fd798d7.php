

<?php $__env->startSection('contenido'); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.devoluciones.create');

$__html = app('livewire')->mount($__name, $__params, 'lw-1949094214-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('modals'); ?>
<?php $__env->stopPush(); ?>



<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon2\www\pharmacy\resources\views/admin/devoluciones/create.blade.php ENDPATH**/ ?>