




<?php $__env->startSection('titulo', 'Pedido'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Pedido</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('pedido.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <?php $__env->startComponent('app.pedido._componentes.form_create_edit', ['pedido' => $pedido, 'clientes' => $clientes]); ?>
            <?php if (isset($__componentOriginal267db5516c3adad9c3d946f3f45363361c5cd5ad)): ?>
<?php $component = $__componentOriginal267db5516c3adad9c3d946f3f45363361c5cd5ad; ?>
<?php unset($__componentOriginal267db5516c3adad9c3d946f3f45363361c5cd5ad); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/pedido/edit.blade.php ENDPATH**/ ?>