
<div>
    <?php if(isset($produto_detalhe->id)): ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('produto-detalhe.update', $produto_detalhe->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
    <?php else: ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('produto-detalhe.store')); ?>">
        <?php echo csrf_field(); ?> 
    <?php endif; ?>
            <input type="text" name="produto_id" placeholder="Produto ID" value="<?php echo e($produto_detalhe->produto_id ?? old('produto_id')); ?>" class="borda-preta">
            <?php echo e($errors->has('produto_id') ? $errors->first('produto_id') : ''); ?>

            
            
            <input type="text" name="comprimento" placeholder="Comprimento" value="<?php echo e($produto_detalhe->comprimento ?? old('comprimento')); ?>" class="borda-preta">
            <?php echo e($errors->has('comprimento') ? $errors->first('comprimento') : ''); ?>

            <input type="text" name="largura" placeholder="Largura" value="<?php echo e($produto_detalhe->largura ?? old('largura')); ?>" class="borda-preta">
            <?php echo e($errors->has('largura') ? $errors->first('largura') : ''); ?>

            <input type="text" name="altura" placeholder="Altura" value="<?php echo e($produto_detalhe->largura ?? old('altura')); ?>" class="borda-preta">
            <?php echo e($errors->has('altura') ? $errors->first('altura') : ''); ?>

            <select name="unidade_id" id="">
                <option>Selecione a unidade de medida</option>
                <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($unidade->id); ?>" <?php echo e($produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''); ?>><?php echo e($unidade->descricao); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo e($errors->has('unidade_id') ? $errors->first('unidade_id') : ''); ?>

            <button type="submit" class="borda-preta"> <?php echo e(isset($produto_detalhe->id) ? 'Editar' : 'Cadastrar'); ?></button>
        
    </form>
</div><?php /**PATH D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views/app/produto_detalhe/_componentes/form_create_edit.blade.php ENDPATH**/ ?>