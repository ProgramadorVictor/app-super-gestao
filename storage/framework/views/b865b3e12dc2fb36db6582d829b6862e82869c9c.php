



<?php $__env->startSection('titulo', 'Pedido Pedido'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('pedido.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
        <p>ID do pedido <?php echo e($pedido->id); ?></p>
        <p>Cliente: <?php echo e($pedido->cliente->nome); ?></p>
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <h4>Itens do pedido</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pedido->produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($produto->id); ?></td>
                            <td><?php echo e($produto->nome); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php $__env->startComponent('app.pedido-produto._componentes.form_create',['pedido' => $pedido, 'produtos' => $produtos]); ?>
            <?php if (isset($__componentOriginal72cab8523656b7b65c87e47f4d46939fbe202b4e)): ?>
<?php $component = $__componentOriginal72cab8523656b7b65c87e47f4d46939fbe202b4e; ?>
<?php unset($__componentOriginal72cab8523656b7b65c87e47f4d46939fbe202b4e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/app/pedido-produto/create.blade.php ENDPATH**/ ?>