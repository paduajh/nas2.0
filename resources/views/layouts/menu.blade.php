<li class="nav-item">
    <a href="{{ route('precadastro.marcas.index') }}"
       class="nav-link {{ Request::is('precadastro/marcas*') ? 'active' : '' }}">
        <p>Marcas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('precadastro.modelos.index') }}"
       class="nav-link {{ Request::is('precadastro/modelos*') ? 'active' : '' }}">
        <p>@lang('models/modelos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.categorias.index') }}"
       class="nav-link {{ Request::is('precadastro/categorias*') ? 'active' : '' }}">
        <p>@lang('models/categorias.plural')</p>
    </a>
</li>

