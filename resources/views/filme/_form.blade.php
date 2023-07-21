<div class="row">
    @include('util.errors')
   @php
        // dd($filme);
   @endphp
    <div class="col-sm-12">
        <div class="form-group">
            <label for="categoria"><span class="required">*</span> Nome do Filme:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título do Filme" value="{{ old('filme', $filme->titulo ?? '') }}">
            <label for="categoria"><span class="required">*</span> Categoria:</label>
            <div class="form-group">
                <select name="id_categoria" id="categoria">
                    <option value="1">Ação</option>
                    <option value="2">Aventura</option>
                    <option value="3">Romance</option>
                    <option value="4">Suspense</option>
                    <option value="5">Terror</option>
                    <option value="6">*** Adulto ***</option>
                    <option value="7">Comédia</option>
                    <option value="8">Histórico</option>
                    <option value="9">Documentário</option>
                    <option value="10">Outros</option>
                    <option value="filme_anterior" selected> {{ old('categoria', $filme->categoria->categoria ?? '') }} </option>
                </select>
            </div>
            <div class="form-group">
                <label for="lancamento"><span class="required">*</span> Ano de lançamento:</label>
                <input type="text" id="lancamento" value="{{ old('lancamento', $filme->lancamento ?? '') }}" name="lancamento" class="form-control" placeholder="Ano de Lançamento">
            </div>
        </div>
    </div>
</div>
