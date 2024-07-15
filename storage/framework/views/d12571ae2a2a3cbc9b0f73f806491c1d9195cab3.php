

<?php $__env->startSection('title', __('Service Unavailable')); ?>
<?php $__env->startSection('code', '503'); ?>
<?php $__env->startSection('message', __($exception->getMessage() ?: 'Service Unavailable')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.DEV\app_super_gestao\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions/views/503.blade.php ENDPATH**/ ?>