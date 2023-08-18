<div class="row">
    @include('util.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label for="categoria"><span class="required">*</span> Nome do Filme:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título do Filme" value="{{ old('filme', $filme->titulo ?? '') }}">
        </div>

        <div class="form-group">
            <label for="categoria"><span class="required">*</span> Categoria:</label>
            <select name="id_categoria" id="categoria" class="form-control">
                <option value="" selected="" disabled>Selecione uma Opção</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('id_categoria', $filme->id_categoria ?? '') == $categoria->id ? 'selected="selected"' : '' }}>{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lancamento"><span class="required">*</span> Ano de lançamento:</label>
            <input type="text" id="lancamento" value="{{ old('lancamento', $filme->lancamento ?? '') }}" name="lancamento" class="form-control" placeholder="Ano de Lançamento">
        </div>
    </div>
</div>
