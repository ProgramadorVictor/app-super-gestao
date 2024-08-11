

<?php $__env->startSection('titulo', 'Pedido'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Pedidos</p>
    </div>
    <div class="menu">
        <ul>
            
            <li><a href="<?php echo e(route('pedido.create')); ?>">Novo</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        
        
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            
            <table border="1" width ="100%"> 
                
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pedido->id); ?></td>
                            <td><?php echo e($pedido->cliente->nome); ?></td>
                            <td><a href="<?php echo e(route('pedido-produto.create', ['pedido' => $pedido->id])); ?>">Adicionar Produtos</a></td>
                            <td><a href="<?php echo e(route('pedido.show', ['pedido' => $pedido->id])); ?>">Visualizar</a></td>
                            
                            <td>
                                
                                
                                <form id="form_<?php echo e($pedido->id); ?>" action="<?php echo e(route('pedido.destroy', ['pedido' => $pedido->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    
                                    
                                    
                                    <a href="#" onclick="document.getElementById('form_<?php echo e($pedido->id); ?>').submit()">Excluir</a>
                                    
                                </form>
                            </td>
                            
                            <td><a href="<?php echo e(route('pedido.edit', ['pedido' => $pedido->id])); ?>">Editar</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            

            
            
            
            <?php echo e($pedidos->appends($req)->links()); ?>

            
            
            <br>
            Exibindo <?php echo e($pedidos->count()); ?> pedidos de <?php echo e($pedidos->total()); ?> (de <?php echo e($pedidos->firstItem()); ?> a <?php echo e($pedidos->lastItem()); ?>)
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/pedido/index.blade.php ENDPATH**/ ?>