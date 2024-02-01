<?php

// use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('log.acesso')->group(function(){ //Rota aplicada em grupo para middleware //Um método de usar a middleware
    Route::get('/contato', 'ContatoController@contato')->name('site.contato');
    Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
});
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos'); //Middleware também esta aplicado, porém no controlador, utilizando construtor.
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso'); //Apelido para rota definita no Kernel.php //2 Modo de usar a middleware
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//'log.acesso','autenticacao:ldap,visitante'
Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function() {//Grupo de rotas, aplicando middlewares
    //OBS: ATENTE AOS DETALHES DO PREFIX /APP. para acessar a rota é http://127.0.0.1:8000/app/cliente ao invés de http://127.0.0.1:8000/cliente
    //Encadaeamento de middlewares, escolhendo também a ordem, aqui passará por log.acesso primeiro e após passará pelo autenticacao.
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');  
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/{msg?}', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar'); //Rota editar para editar os dados dos fornecedores.
    Route::get('/fornecedor/excluir/{id}/{msg?}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    
    Route::get('/produto/create', 'ProdutoController@create')->name('app.produto.create');
    Route::resource('produto','ProdutoController'); //php artisan make:controller --resource ProdutoController --model=Produto
    //Essa rota cria rotas do tipo get, post, delete, put, patch
    //Esse tipo de rota somente pode ser usado 'Route::resource' caso usamos o comando 'php artisan make:controller --resource ProdutoController --model=Produto
    //Ele automaticamente da a existência dessas rotas. Com os métodos. (Utilizar ao invés de criar várias rotas na mão)
    // Route::get('/produto', 'ProdutoController@index')->name('app.produto'); //Para atribuir nomes a rotas do tipo resource, o rota deve esta abaixo da resouce, com o nome.
});

Route::fallback(function() {
    //return redirect()->route('site.index'); //Redirecionando para a página principal automaticamente.
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
})->name('fallback');