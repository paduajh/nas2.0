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

<li class="nav-item">
    <a href="{{ route('precadastro.tipoDeVeiculos.index') }}"
       class="nav-link {{ Request::is('precadastro/tipoDeVeiculos*') ? 'active' : '' }}">
        <p>@lang('models/tipoDeVeiculos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.tipoDeCarrocerias.index') }}"
       class="nav-link {{ Request::is('precadastro/tipoDeCarrocerias*') ? 'active' : '' }}">
        <p>@lang('models/tipoDeCarrocerias.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.combustivels.index') }}"
       class="nav-link {{ Request::is('precadastro/combustivels*') ? 'active' : '' }}">
        <p>@lang('models/combustivels.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.tipoDeEnderecos.index') }}"
       class="nav-link {{ Request::is('precadastro/tipoDeEnderecos*') ? 'active' : '' }}">
        <p>@lang('models/tipoDeEnderecos.plural')</p>
    </a>
</li>

