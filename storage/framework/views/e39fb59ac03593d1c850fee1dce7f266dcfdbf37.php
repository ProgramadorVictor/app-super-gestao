

<?php $__env->startSection('titulo', 'Cliente'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>
    <div class="menu">
        <ul>
            
            <li><a href="<?php echo e(route('cliente.create')); ?>">Novo</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        
        
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            
            <table border="1" width ="100%"> 
                
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cliente->nome); ?></td>
                            <td><a href="<?php echo e(route('cliente.show', ['cliente' => $cliente->id])); ?>">Visualizar</a></td>
                            
                            <td>
                                
                                
                                <form id="form_<?php echo e($cliente->id); ?>" action="<?php echo e(route('cliente.destroy', ['cliente' => $cliente->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    
                                    
                                    
                                    <a href="#" onclick="document.getElementById('form_<?php echo e($cliente->id); ?>').submit()">Excluir</a>
                                    
                                </form>
                            </td>
                            
                            <td><a href="<?php echo e(route('cliente.edit', ['cliente' => $cliente->id])); ?>">Editar</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            

            
            
            
            <?php echo e($clientes->appends($req)->links()); ?>

            
            
            <br>
            Exibindo <?php echo e($clientes->count()); ?> clientes de <?php echo e($clientes->total()); ?> (de <?php echo e($clientes->firstItem()); ?> a <?php echo e($clientes->lastItem()); ?>)
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/cliente/index.blade.php ENDPATH**/ ?>