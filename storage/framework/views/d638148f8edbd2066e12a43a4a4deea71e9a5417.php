

<?php $__env->startSection('titulo', 'Produto'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p><?php echo e(isset($produto->id) ? 'Editar' : 'Adicionar'); ?> Produto</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('produto.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            
            <?php if(isset($produto->id)): ?>
                <form autocomplete="off" method="post" action="<?php echo e(route('produto.update', $produto->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
            <?php else: ?>
                <form autocomplete="off" method="post" action="<?php echo e(route('produto.store')); ?>">
                <?php echo csrf_field(); ?> 
            <?php endif; ?>
                    <input type="text" name="nome" placeholder="Nome" value="<?php echo e($produto->nome ?? old('nome')); ?>" class="borda-preta">
                    <?php echo e($errors->has('nome') ? $errors->first('nome') : ''); ?>

                    
                    
                    <input type="text" name="descricao" placeholder="Descrição" value="<?php echo e($produto->descricao ?? old('descricao')); ?>" class="borda-preta">
                    <?php echo e($errors->has('descricao') ? $errors->first('descricao') : ''); ?>

                    <input type="text" name="peso" placeholder="Peso" value="<?php echo e($produto->peso ?? old('peso')); ?>" class="borda-preta">
                    <?php echo e($errors->has('peso') ? $errors->first('peso') : ''); ?>

                    <select name="unidade_id" id="">
                        <option>Selecione a unidade de medida</option>
                        <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($unidade->id); ?>" <?php echo e($produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''); ?>><?php echo e($unidade->descricao); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php echo e($errors->has('unidade_id') ? $errors->first('unidade_id') : ''); ?>

                    <button type="submit" class="borda-preta"> <?php echo e(isset($produto->id) ? 'Editar' : 'Cadastrar'); ?></button>
                
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views/app/produto/create.blade.php ENDPATH**/ ?>