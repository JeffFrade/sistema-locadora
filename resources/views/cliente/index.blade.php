@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.clientes.index', 'method' => 'GET']) }}
            <div class="card card-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="brand" name="brand" class="form-control" placeholder="Nome/CPF/Telefone" value="{{ $params['brand'] ?? '' }}">
                        </div>

                        <div class="col-sm-2">
                            <select id="status" name="status" class="form-control">
                                <option value="" selected="" disabled="">Selecione Uma Opção</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success btn-overlay"><i class="fa fa-search"></i>&nbsp; Filtrar</button>
                            &nbsp;
                            <a href="{{ route('dashboard.clientes.create') }}" class="btn btn-default text-dark"><i class="fa fa-plus"></i>&nbsp; Cadastrar Cliente</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Data de Nascimento</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->cpf }}</td>
                                    <td>{{ $cliente->contato }}</td>
                                    <td>{{ $cliente->data_nascimento }}</td>
                                    <td>{{ $cliente->status }}</td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="{{ route('dashboard.clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-overlay" data-id="{{ $cliente->id }}" title="Excluir" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Não há dados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {!! PaginateHelper::paginateWithParams($clientes, $params) !!}
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>

        @include('util.delete-modal')
    </div>
@stop

@section('js')
    <script src="{{ asset('js/delete-modal.js') }}"></script>
    <script type="text/javascript">
        deleteModal('colors/delete/');
    </script>
@stop
