 <!-- #Faz referência ao basico, la ele tem toda a estrutura html. -->
<?php $__env->startSection('titulo', 'Home'); ?>
<?php $__env->startSection('conteudo'); ?>
    <div class="conteudo-destaque">
        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="chamada">
                    <img src="<?php echo e(asset('img/check.png')); ?>">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="<?php echo e(asset('img/check.png')); ?>">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>
            <div class="video">
                <img src="<?php echo e(asset('img/player_video.jpg')); ?>">
            </div>
        </div>
        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                <?php $__env->startComponent('site.layouts._components.form_contato',['classe' => 'borda-branca', 'motivo_contatos' => $motivo_contatos]); ?>
                <?php if (isset($__componentOriginal5fd4ee279ef26e11bb1719135c3a842ac3f4e58e)): ?>
<?php $component = $__componentOriginal5fd4ee279ef26e11bb1719135c3a842ac3f4e58e; ?>
<?php unset($__componentOriginal5fd4ee279ef26e11bb1719135c3a842ac3f4e58e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
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
<?php echo $__env->make('site.layouts.basico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Desktop\.dev\app_super_gestao\resources\views/site/principal.blade.php ENDPATH**/ ?>