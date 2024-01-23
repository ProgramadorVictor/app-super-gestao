@extends('app.layouts.basico')
{{-- Só vai somente para essa view, que está sendo extendida. --}}

@section('titulo', 'Cliente')

@section('conteudo')
{{-- Enviando a section conteudo para básico.blade.php, lá @yield('conteudo') captura esse conteúdo --}}
    <br><br><br><br>Cliente
@endsection