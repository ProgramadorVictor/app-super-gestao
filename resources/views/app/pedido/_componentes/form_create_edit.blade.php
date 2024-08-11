{{-- DENTRE ESSES IF E FORM, ELE NA AULA REUTILIZOU CÓDIGO, POIS ERAM PRATICAMENTE IGUAIS, SE RECEBER ID, ELE VAI FAZER O FORMULÁRIO DE EDITAR SE NÃO ELE VAI ADICIONAR. --}}
<div>
    @if(isset($pedido->id))
        <form autocomplete="off" method="post" action="{{route('pedido.update', $pedido->id)}}">
            @csrf
            @method('patch')
    @else
        <form autocomplete="off" method="post" action="{{route('pedido.store')}}">
        @csrf 
    @endif
        {{-- <input type="text" name="nome" placeholder="Nome" value="{{$clientes->nome ?? old('nome')}}" class="borda-preta"> --}}
        {{-- {{$errors->has('nome') ? $errors->first('nome') : ''}} --}}
        {{-- <input type="text" name="cliente_id" placeholder="Nome" value="{{$pedido->nome ?? old('nome')}}" class="borda-preta">
        {{$errors->has('nome') ? $errors->first('nome') : ''}} --}}
        <select name="cliente_id" id="">
            <option>Selecione o cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}" {{($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
            @endforeach
        </select>
        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
        <button type="submit" class="borda-preta"> {{isset($pedido->id) ? 'Editar' : 'Cadastrar'}}</button>
    </form>
</div>