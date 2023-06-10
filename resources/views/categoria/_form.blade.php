<div class="row">
    @include('util.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label for="nome"><span class="required">*</span> Nome da categoria:</label>
            <input type="text" id="nome" name="categoria" class="form-control" placeholder="Categoria de filme" value="{{ old('nome', $categoria->nome ?? '') }}">
        </div>
    </div>
</div>
