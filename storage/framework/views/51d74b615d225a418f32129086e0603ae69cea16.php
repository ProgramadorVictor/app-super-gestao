

<?php $__env->startSection('titulo', 'Fornecedor'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('app.fornecedor.adicionar')); ?>">Novo</a><li>
            <li><a href="<?php echo e(route('app.fornecedor')); ?>">Consulta</a><li>
        </ul> 
    </div>
    <div class="informacao-pagina">
        
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <form method="post" action="<?php echo e(route('app.fornecedor.listar')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                <button type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.DEV\app_super_gestao\resources\views/app/fornecedor/index.blade.php ENDPATH**/ ?>