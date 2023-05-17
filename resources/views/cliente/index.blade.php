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
                            <input type="text" id="search" name="search" class="form-control" placeholder="Nome/CPF/Telefone" value="{{ $params['search'] ?? '' }}">
                        </div>

                        <div class="col-sm-2">
                            <select id="status" name="status" class="form-control">
                                <option value="" selected="" disabled="">Selecione Uma Opção</option>
                                <option value="1" {{ ($params['status'] ?? '') == 1 ? 'selected="selected"' : '' }}>Ativo</option>
                                <option value="0" {{ ($params['status'] ?? '') == 0 ? 'selected="selected"' : '' }}>Inativo</option>
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
                                    <td>{{ StringHelper::mask($cliente->cpf, '###.###.###-##') }}</td>
                                    <td>{{ StringHelper::maskPhone($cliente->contato) }}</td>
                                    <td>{{ DateHelper::formatDateBr($cliente->data_nascimento) }}</td>
                                    <td>
                                        @if ($cliente->status)
                                            <div class="badge badge-success label btn-status" data-id={{ $cliente->id }} title="Trocar Status">Ativo</div>
                                        @else
                                            <div class="badge badge-danger label btn-status" data-id={{ $cliente->id }} title="Trocar Status">Inativo</div>
                                        @endif
                                    </td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="{{ route('dashboard.clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-overlay" data-id="{{ $cliente->id }}" title="Excluir" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-fw fa-trash"></i></a>
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
        deleteModal('clientes/delete/');

        $('.btn-status').on('click', function (e) {
            e.preventDefault();
            $('.overlay').removeClass('overlay-hidden');

            let id = $(this).data('id');

            $.ajax({
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'PUT',
                url: `clientes/status/${id}`,
                timeout: 0,
                success: function (response) {
                    $.notify({message: response.message}, {type: 'success'});
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (err) {
                    let error = err.responseJSON.error;
                    $.notify({message: error.message}, {type: 'danger'});
                    console.error(error);
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        });
    </script>
@stop
