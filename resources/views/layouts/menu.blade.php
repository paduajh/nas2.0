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

<li class="nav-item">
    <a href="{{ route('precadastro.documentoAvisos.index') }}"
       class="nav-link {{ Request::is('precadastro/documentoAvisos*') ? 'active' : '' }}">
        <p>@lang('models/documentoAvisos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.naturezaSinistros.index') }}"
       class="nav-link {{ Request::is('precadastro/naturezaSinistros*') ? 'active' : '' }}">
        <p>@lang('models/naturezaSinistros.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.grupoLancamentos.index') }}"
       class="nav-link {{ Request::is('precadastro/grupoLancamentos*') ? 'active' : '' }}">
        <p>@lang('models/grupoLancamentos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.centroCustos.index') }}"
       class="nav-link {{ Request::is('precadastro/centroCustos*') ? 'active' : '' }}">
        <p>@lang('models/centroCustos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.contas.index') }}"
       class="nav-link {{ Request::is('precadastro/contas*') ? 'active' : '' }}">
        <p>@lang('models/contas.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precadastro.formaPagamentos.index') }}"
       class="nav-link {{ Request::is('precadastro/formaPagamentos*') ? 'active' : '' }}">
        <p>@lang('models/formaPagamentos.plural')</p>
    </a>
</li>

