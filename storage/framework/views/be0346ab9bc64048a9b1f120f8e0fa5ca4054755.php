
<div>
    <?php if(isset($pedido->id)): ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('pedido.update', $pedido->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
    <?php else: ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('pedido.store')); ?>">
        <?php echo csrf_field(); ?> 
    <?php endif; ?>
        
        
        
        <select name="cliente_id" id="">
            <option>Selecione o cliente</option>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id); ?>" <?php echo e(($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''); ?>><?php echo e($cliente->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo e($errors->has('cliente_id') ? $errors->first('cliente_id') : ''); ?>

        <button type="submit" class="borda-preta"> <?php echo e(isset($pedido->id) ? 'Editar' : 'Cadastrar'); ?></button>
    </form>
</div><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/pedido/_componentes/form_create_edit.blade.php ENDPATH**/ ?>