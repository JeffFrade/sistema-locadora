@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastrar Categoria</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => ['dashboard.categorias.store', 'method' => 'POST']]) }}
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar categoria de filmes</h3>
                </div>

                <div class="card-body">
                    @include('categoria._form')
                </div>

                <div class="card-footer">
                    <a href="{{ route('dashboard.categorias.index') }}" class="btn btn-danger btn-overlay"><i class="fa fa-times"></i>&nbsp; Cancelar</a>
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
