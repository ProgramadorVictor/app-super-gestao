
<div>
    <?php if(isset($cliente->id)): ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('cliente.update', $cliente->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
    <?php else: ?>
        <form autocomplete="off" method="post" action="<?php echo e(route('cliente.store')); ?>">
        <?php echo csrf_field(); ?> 
    <?php endif; ?>
        <input type="text" name="nome" placeholder="Nome" value="<?php echo e($cliente->nome ?? old('nome')); ?>" class="borda-preta">
        <?php echo e($errors->has('nome') ? $errors->first('nome') : ''); ?>

        <button type="submit" class="borda-preta"> <?php echo e(isset($cliente->id) ? 'Editar' : 'Cadastrar'); ?></button>
    </form>
</div><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/cliente/_componentes/form_create_edit.blade.php ENDPATH**/ ?>