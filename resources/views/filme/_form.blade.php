<div class="row">
    @include('util.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label for="categoria"><span class="required">*</span> Nome do Filme:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título do Filme" value="{{ old('filme', $filmes->titulo ?? '') }}">
            <label for="categoria"><span class="required">*</span> Categoria:</label>
            <div class="form-group">
                <select name="id_categoria" id="categoria">
                    @foreach ( $categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                        <option value="filme_anterior" selected> {{ old('categoria', $filmes->categoria->categoria ?? '') }} </option>
                </select>
            </div>
            <div class="form-group">
                <label for="lancamento"><span class="required">*</span> Ano de lançamento:</label>
                <input type="text" id="lancamento" value="{{ old('lancamento', $filmes->lancamento ?? '') }}" name="lancamento" class="form-control" placeholder="Ano de Lançamento">
            </div>
        </div>
    </div>
</div>
