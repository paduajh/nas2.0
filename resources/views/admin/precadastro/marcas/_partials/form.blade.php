<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $marca->name }}" >
</div>

<div class="form-group">
    <a href="{{ route('marcas.index')}}" class="btn btn-primary">Voltar</a>
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>