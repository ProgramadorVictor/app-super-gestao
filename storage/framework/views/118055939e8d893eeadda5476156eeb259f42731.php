



<?php $__env->startSection('titulo', 'Detalhes do Produto'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Detalhes do Produto</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Voltar</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <?php $__env->startComponent('app.produto_detalhe._componentes.form_create_edit', ['unidades' => $unidades]); ?>
            <?php if (isset($__componentOriginal5a91c4ede7bb2ff43c20896204d479702ea685d5)): ?>
<?php $component = $__componentOriginal5a91c4ede7bb2ff43c20896204d479702ea685d5; ?>
<?php unset($__componentOriginal5a91c4ede7bb2ff43c20896204d479702ea685d5); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views/app/produto_detalhe/create.blade.php ENDPATH**/ ?>