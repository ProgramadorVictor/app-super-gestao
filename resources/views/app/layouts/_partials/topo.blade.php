<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>
    <div class="menu">  
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.cliente') }}">Cliente</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            {{-- <li><a href="{{ route('produto.index') }}">Produto</a></li> --}}
            {{-- <li><a href="{{ route('app.produto ') }}">Produto</a></li> --}}
            {{-- APÓS USA UMA ROTA RESOURCE, PODEMOS TAMBÉM USAR UM APELIDO DIFERENTE PORÉM DEFINIMOS A ROTA RESOURCE E DEPOIS CRIAMOS UMA ROTA GET, COM O NOVO APELIDO --}}
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>