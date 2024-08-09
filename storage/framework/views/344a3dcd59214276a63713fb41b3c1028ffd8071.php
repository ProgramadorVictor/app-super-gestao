



<?php $__env->startSection('titulo', 'Fornecedor'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - <?php echo e(isset($fornecedor->id) ? 'Editar' : 'Adicionar'); ?></p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('app.fornecedor.adicionar')); ?>">Novo</a><li>
            <li><a href="<?php echo e(route('app.fornecedor')); ?>">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <?php echo e($msg ?? ''); ?>

        
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <form autocomplete="off" method="post" action="<?php echo e(route('app.fornecedor.adicionar')); ?>">
                <input type="hidden" name="id" value="<?php echo e($fornecedor->id ?? ''); ?>">
                
                
                
                
                <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="<?php echo e($fornecedor->nome ?? old('nome')); ?>">
                
                <?php echo e($errors->has('nome') ? $errors->first('nome') : ''); ?>

                
                <input type="text" name="site" placeholder="Site" class="borda-preta" value="<?php echo e($fornecedor->site ?? old('site')); ?>">
                <?php echo e($errors->has('site') ? $errors->first('site') : ''); ?>

                <input type="text" name="uf" placeholder="UF" class="borda-preta" value="<?php echo e($fornecedor->uf ?? old('uf')); ?>">
                <?php echo e($errors->has('uf') ? $errors->first('uf') : ''); ?>

                <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="<?php echo e($fornecedor->email ?? old('email')); ?>">
                <?php echo e($errors->has('email') ? $errors->first('email') : ''); ?>

                <button type="submit" class="borda-preta"><?php echo e(isset($fornecedor->id) ? 'Editar' : 'Cadastrar'); ?></button>
                
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/fornecedor/adicionar.blade.php ENDPATH**/ ?>