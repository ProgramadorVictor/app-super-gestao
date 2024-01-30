

<?php $__env->startSection('titulo', 'Fornecedor'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>
    <div class="menu">
        <ul>
            
            <li><a href="<?php echo e(route('app.fornecedor.adicionar')); ?>">Novo</a><li>
            <li><a href="<?php echo e(route('app.fornecedor')); ?>">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            
            <table border="1" width ="100%"> 
                
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $fornecedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fornecedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($fornecedor->nome); ?></td>
                            <td><?php echo e($fornecedor->site); ?></td>
                            <td><?php echo e($fornecedor->uf); ?></td>
                            <td><?php echo e($fornecedor->email); ?></td>
                            <td>Excluir</td>
                            
                            <td><a href="<?php echo e(route('app.fornecedor.editar', $fornecedor->id)); ?>">Editar</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            
            
            <?php echo e($fornecedores->appends($req)->links()); ?>

            
            Total de registros por página - <?php echo e($fornecedores->count()); ?>

            <br>
            Total de registros da consulta - <?php echo e($fornecedores->total()); ?>

            <br>
            Número do primeir registro da página - <?php echo e($fornecedores->firstItem()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views/app/fornecedor/listar.blade.php ENDPATH**/ ?>