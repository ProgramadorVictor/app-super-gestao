
<?php $__env->startSection('titulo', $titulo); ?>
<?php $__env->startSection('conteudo'); ?>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right:auto;">
            <form action=<?php echo e(route('site.login')); ?> method="post">
                <?php echo csrf_field(); ?>
                <input name="usuario" value= "<?php echo e(old('usuario')); ?>" type="text" placeholder="Usuário" class="borda-preta">
                <?php echo e($errors->has('usuario') ? $errors->first('usuario'): ''); ?>

                <input name="senha" value= "<?php echo e(old('senha')); ?>" type="password" placeholder="Senha" class="borda-preta">
                <?php echo e($errors->has('senha') ? $errors->first('senha'): ''); ?>

                
                <button type="submit" class="borda-preta">Acessar</button> 
            </form>
            <?php echo e(isset($erro) && $erro != '' ? $erro : ''); ?> 
            </div>
        </div>
    </div>
    
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="<?php echo e(asset('img/facebook.png')); ?>">
            <img src="<?php echo e(asset('img/linkedin.png')); ?>">
            <img src="<?php echo e(asset('img/youtube.png')); ?>">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="<?php echo e(asset('img/mapa.png')); ?>">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/site/login.blade.php ENDPATH**/ ?>