

<?php $__env->startSection('titulo', 'Produto'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar Produto</p>
        
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo e(route('produto.index')); ?>">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <table border="1" style="text-align: left;">
                <tr>
                    <td>ID</td>
                    <td><?php echo e($produto->id); ?></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><?php echo e($produto->nome); ?></td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td><?php echo e($produto->descricao); ?></td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td><?php echo e($produto->peso); ?> kg</td>
                </tr>
                <tr>
                    <td>Unidade de Medida:</td>
                    <td><?php echo e($produto->unidade_id); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.DEV\app_super_gestao\resources\views/app/produto/show.blade.php ENDPATH**/ ?>