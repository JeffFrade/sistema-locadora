<div class="row">
    @include('util.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label for="categoria"><span class="required">*</span> Nome da categoria:</label>
            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoria de filme" value="{{ old('categoria', $categoria->categoria ?? '') }}">
        </div>
    </div>
</div>
