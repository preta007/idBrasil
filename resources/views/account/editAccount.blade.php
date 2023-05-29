
@extends('adminlte::page')
@section('content_header')
    <h1 class="float-left mb-5">Editar Saldo</h1>
@stop

@section('content')

<div class="col-lg-8 offset-lg-2 col-sm-12 mt-5">
                <div class="card">
                
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('update.account', $account->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value='{{ $account->name }}' >
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Salvar</button>
                                <a href="{{ route('account') }}" class="btn btn-default float-left">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

@stop
