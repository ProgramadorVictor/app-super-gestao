<?php

// use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('log.acesso')->group(function(){ //Rota aplicada em grupo para middleware //Um método de usar a middleware
    //Toda vez que você entrar é registrado no banco de dados essa e a do '/'
    Route::get('/contato', 'ContatoController@contato')->name('site.contato');
    Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
});
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso'); //Apelido para rota definita no Kernel.php //2 Modo de usar a middleware
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos'); //Middleware também esta aplicado, porém no controlador, utilizando construtor.
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//'log.acesso','autenticacao:ldap,visitante' //Anteriormente, não lembro porque utilizei, verificar mas aparentemente, aqui passa por duas middlewares, log.acesso e depois autenticacao
//Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function() {
//Acima estamos passando parametros para a autenticação middleware

// Route::prefix('/app')->middleware('autenticacao:padrao,visitante,p3,p4')->group(function(){});
//Igual o método de baixo, esse de cima é parecido.
Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function() {//Grupo de rotas, aplicando middlewares
    //OBS: ATENTE AOS DETALHES DO PREFIX /APP. para acessar a rota é http://127.0.0.1:8000/app/cliente ao invés de http://127.0.0.1:8000/cliente
    //Encadaeamento de middlewares, escolhendo também a ordem, aqui passará por log.acesso primeiro e após passará pelo autenticacao.
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');  
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adc', 'FornecedorController@adc')->name('app.fornecedor.adc');
    //Rotas gets tem que ser diferentes de post, para não causar conflinto e adicionar via rota
    Route::post('/fornecedor/adicionar-teste', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar'); //Rota editar para editar os dados dos fornecedores.
    Route::get('/fornecedor/excluir/{id}/{msg?}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    Route::get('/fornecedor/{msg?}', 'FornecedorController@index')->name('app.fornecedor'); //Essa rota não pode ficar em cima das outras outras de fornecedores o motivo eu não sei.
    //Mas aparentemente alguns links, não funcionam, como na tela inicial fornecedor, o link novo não funciona.
    //A rota acima 'app.fornecedor' ela é uma wildcard, provavel se estiver em cima acontecer problemas de roteamento, entender melhor isso.

    //ProdutoController foi feito com php artisan make:controller ProdutoController -r
    // Route::get('/produto/create', 'ProdutoController@create')->name('app.produto.create');
    Route::resource('produto','ProdutoController'); //php artisan make:controller --resource ProdutoController --model=Produto
    //SOBRE RESOURCE, OBSERVE BEM OS MÉTODOS ELES SÃO MUITO CHATINHOS E RIGOROSOS, PRINCIPALEMENTE DELETE, TEM QUE MONTAR FORM, PARA DELETAR UM OBJETO DO BANCO DE DADOS 
    //Métodos HTTP: put e patch
    //Put: Quando usamos o put, quando solicitamos uma requisição http, deve potencialmente modificar uma entidade por completo. Os dados que são trafegados são o objeto completo que serão modificados.
    //Patch: É utilizado para modificações parciais de uma entidade, ou seja, alguns atributos especificos dos objetos.

    //Essa rota cria rotas do tipo get, post, delete, put, patch.
    //Esse tipo de rota somente pode ser usado 'Route::resource' caso usamos o comando 'php artisan make:controller --resource ProdutoController --model=Produto
    //Ele automaticamente da a existência dessas rotas. Com os métodos. (Utilizar ao invés de criar várias rotas na mão)
    // Route::get('/produto', 'ProdutoController@index')->name('app.produto'); //Para atribuir nomes a rotas do tipo resource, o rota deve esta abaixo da resouce, com o nome.
    Route::resource('produto-detalhe','ProdutoDetalheController');
});

Route::fallback(function() {
    //return redirect()->route('site.index'); //Redirecionando para a página principal automaticamente.
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
})->name('fallback');