<div>
    <form autocomplete="off" method="post" action="{{route('pedido-produto.store', ['pedido' => $pedido])}}">
        @csrf
        <select name="produto_id" id="">
            <option>Selecione o produto</option>
            @foreach($produtos as $produto)
                <option value="{{$produto->id}}" {{old('produto_id') == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
            @endforeach
        </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id') : '' }}
        <button type="submit" class="borda-preta"> {{isset($pedido->id) ? 'Editar' : 'Cadastrar'}}</button>
    </form>
</div>