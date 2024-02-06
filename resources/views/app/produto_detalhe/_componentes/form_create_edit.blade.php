{{-- DENTRE ESSES IF E FORM, ELE NA AULA REUTILIZOU CÓDIGO, POIS ERAM PRATICAMENTE IGUAIS, SE RECEBER ID, ELE VAI FAZER O FORMULÁRIO DE EDITAR SE NÃO ELE VAI ADICIONAR. --}}
<div>
    @if(isset($produto_detalhe->id))
        <form autocomplete="off" method="post" action="{{route('produto-detalhe.update', $produto_detalhe->id)}}">
            @csrf
            @method('put')
    @else
        <form autocomplete="off" method="post" action="{{route('produto-detalhe.store')}}">
        @csrf 
    @endif
            <input type="text" name="produto_id" placeholder="Produto ID" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" class="borda-preta">
            {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
            {{-- CASO $fornecedor->nome esteja definido ele será impresso. --}}
            {{-- Caso ocorra algum erro $errors->has(). verifica se tem algum erro e retornar o erro da variavel. --}}
            <input type="text" name="comprimento" placeholder="Comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" class="borda-preta">
            {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
            <input type="text" name="largura" placeholder="Largura" value="{{$produto_detalhe->largura ?? old('largura')}}" class="borda-preta">
            {{$errors->has('largura') ? $errors->first('largura') : ''}}
            <input type="text" name="altura" placeholder="Altura" value="{{$produto_detalhe->largura ?? old('altura')}}" class="borda-preta">
            {{$errors->has('altura') ? $errors->first('altura') : ''}}
            <select name="unidade_id" id="">
                <option>Selecione a unidade de medida</option>
                @foreach($unidades as $unidade)
                    <option value="{{$unidade->id}}" {{$produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                @endforeach
            </select>
            {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
            <button type="submit" class="borda-preta"> {{isset($produto_detalhe->id) ? 'Editar' : 'Cadastrar'}}</button>
        {{-- 
            TEM VÁRIAS FORMAS DE FAZER UMA BOA VALIDAÇÃO, EU USO JAVASCRIPT -> JQUERY
            1) Poderia usar esse $req->validate() é do próprio Laravel.
            2) Fazer testes em outros sistemas.
        --}}
    </form>
</div>