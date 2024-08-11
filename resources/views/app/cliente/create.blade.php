{{-- <a href="file:///D:/Usuários/victor.andrade/Desktop/Victor/app_super_gestao/resources/views/app/fornecedor/adicionar.blade.php">AQUI UTILIZAMOS D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views\app\fornecedor\adicionar.blade.php</a> --}}
{{-- ACIMA A GENTE FEZ O CÓDIGO USANDO A MESMA VIEW, NAO CRIAMOS UM COMPONENTE IGUAL ABAIXO E USAMOS EM DUAS VIEWS. --}}
@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Cliente</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('cliente.index')}}">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- TRANSFORMEI EM UM COMPONENENTE E ESTOU USANDO PARA DUAS VIEWS. --}}
            @component('app.cliente._componentes.form_create_edit')
            @endcomponent
            {{-- PASSANDO OS PARAMETRO PARA OS COMPONENTE --}}
        </div>
    </div>
</div>
@endsection
