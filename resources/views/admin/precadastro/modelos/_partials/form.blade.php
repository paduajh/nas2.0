@include ('admin.includes.alerts')
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $modelo->name ?? old ('name') }}" >
</div>

<div class="form-group">
    <a href="{{ route('modelo.index')}}" class="btn btn-primary">Voltar</a>
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>