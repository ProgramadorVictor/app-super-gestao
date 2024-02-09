<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>
    <div class="menu">
        <ul>
            {{-- HOME foi implementada por mi --}}
            <li><a href="{{ route('app.home') }}">Home</a></li> 
            <li><a href="{{ route('site.index') }}">Principal</a></li>
            <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
            <li><a href="{{ route('site.contato') }}">Contato</a></li>
        </ul>
    </div>
</div>
