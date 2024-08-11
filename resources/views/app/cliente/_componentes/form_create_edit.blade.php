{{-- DENTRE ESSES IF E FORM, ELE NA AULA REUTILIZOU CÓDIGO, POIS ERAM PRATICAMENTE IGUAIS, SE RECEBER ID, ELE VAI FAZER O FORMULÁRIO DE EDITAR SE NÃO ELE VAI ADICIONAR. --}}
<div>
    @if(isset($cliente->id))
        <form autocomplete="off" method="post" action="{{route('cliente.update', $cliente->id)}}">
            @csrf
            @method('put')
    @else
        <form autocomplete="off" method="post" action="{{route('cliente.store')}}">
        @csrf 
    @endif
        <input type="text" name="nome" placeholder="Nome" value="{{$cliente->nome ?? old('nome')}}" class="borda-preta">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <button type="submit" class="borda-preta"> {{isset($cliente->id) ? 'Editar' : 'Cadastrar'}}</button>
    </form>
</div>