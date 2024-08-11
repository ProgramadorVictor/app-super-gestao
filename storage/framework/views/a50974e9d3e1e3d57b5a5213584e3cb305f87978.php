



<?php $__env->startSection('titulo', 'Cliente'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Cliente</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('cliente.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <?php $__env->startComponent('app.cliente._componentes.form_create_edit'); ?>
            <?php if (isset($__componentOriginal6b528b68cbf15687c9f81d562d174b73cdb6133f)): ?>
<?php $component = $__componentOriginal6b528b68cbf15687c9f81d562d174b73cdb6133f; ?>
<?php unset($__componentOriginal6b528b68cbf15687c9f81d562d174b73cdb6133f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/cliente/create.blade.php ENDPATH**/ ?>