



<?php $__env->startSection('titulo', 'Produto'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('produto.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <?php $__env->startComponent('app.produto._componentes.form_create_edit', ['unidades' => $unidades, 'fornecedores' => $fornecedores]); ?>
            <?php if (isset($__componentOriginal699341accc5974947d1161f71a2704f75eaaead5)): ?>
<?php $component = $__componentOriginal699341accc5974947d1161f71a2704f75eaaead5; ?>
<?php unset($__componentOriginal699341accc5974947d1161f71a2704f75eaaead5); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/produto/create.blade.php ENDPATH**/ ?>