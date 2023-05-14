@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Cliente {{ $cliente->nome }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => ['dashboard.clientes.update', ['id' => $cliente->id]], 'method' => 'PUT']) }}
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Editar Cliente</h3>
                </div>

                <div class="card-body">
                    @include('cliente._form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('dashboard.clientes.index') }}" class="btn btn-danger btn-overlay"><i class="fa fa-times"></i>&nbsp; Cancelar</a>
                    &nbsp;
                    <button type="submit" class="btn btn-success btn-overlay"><i class="fa fa-save"></i>&nbsp; Salvar</button>
                </div>

                @include('util.overlay')
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/masks.js') }}"></script>
@stop
