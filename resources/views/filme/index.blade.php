@extends('adminlte::page')

@section('title', 'Filmes')

@section('content_header')
    <h1 class="m-0 text-dark">Filmes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'dashboard.filmes.index', 'method' => 'GET']) }}
            <div class="card card-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-9">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Título do filme" value="{{ $params['search'] ?? '' }}">
                        </div>

                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success btn-overlay"><i class="fa fa-search"></i>&nbsp; Filtrar</button>
                            &nbsp;
                            <a href="{{ route('dashboard.filmes.create') }}" class="btn btn-default text-dark"><i class="fa fa-plus"></i>&nbsp; Cadastrar Filme</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Filme</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($filmes as $filme)
                                <tr>
                                    <td>{{ $filme->titulo }}</td>
                                    <td>{{ $filme->categoria->categoria ?? '' }}</td>
                                    <td style="width: 1%;" nowrap="">
                                        <a href="{{ route('dashboard.filmes.edit', ['id' => $filme->id]) }}" class="btn btn-default btn-xs" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs btn-overlay" data-id="{{ $filme->id }}" title="Excluir" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Não há dados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {!! PaginateHelper::paginateWithParams($filmes, $params) !!}
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
        deleteModal('filmes/delete/');
    </script>
@stop
