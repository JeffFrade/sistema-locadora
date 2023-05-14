<div class="row">
    @include('util.errors')

    <div class="col-sm-3">
        <div class="form-group">
            <label for="nome"><span class="required">*</span> Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome', $cliente->nome ?? '') }}">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="cpf"><span class="required">*</span> CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control cpf" placeholder="CPF" value="{{ old('cpf', $cliente->cpf ?? '') }}">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="contato"><span class="required">*</span> Telefone:</label>
            <input type="text" id="contato" name="contato" class="form-control contato" placeholder="Telefone" value="{{ old('contato', $cliente->contato ?? '') }}">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="data_nascimento"><span class="required">*</span> Data de Nascimento:</label>
            <input type="text" id="data_nascimento" name="data_nascimento" class="form-control data" placeholder="Data de Nascimento" value="{{ old('data_nascimento', DateHelper::formatDateBr($cliente->data_nascimento ?? '')) }}">
        </div>
    </div>
</div>
