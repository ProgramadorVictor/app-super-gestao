<div>
    <form autocomplete="off" method="post" action="<?php echo e(route('pedido-produto.store', ['pedido' => $pedido])); ?>">
        <?php echo csrf_field(); ?>
        <select name="produto_id" id="">
            <option>Selecione o produto</option>
            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($produto->id); ?>" <?php echo e(old('produto_id') == $produto->id ? 'selected' : ''); ?>><?php echo e($produto->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo e($errors->has('produto_id') ? $errors->first('produto_id') : ''); ?>

        <input type="number" placeholder="Quantidade" name="quantidade" id="" value="<?php echo e(old('quantidade')); ?>">
        <?php echo e($errors->has('quantidade') ? $errors->first('quantidade') : ''); ?>

        <button type="submit" class="borda-preta"> <?php echo e(isset($pedido->id) ? 'Editar' : 'Cadastrar'); ?></button>
    </form>
</div><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/pedido-produto/_componentes/form_create.blade.php ENDPATH**/ ?>