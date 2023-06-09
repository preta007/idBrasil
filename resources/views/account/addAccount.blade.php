
@extends('adminlte::page')
@section('content_header')
    <h1 class="float-left mb-5">Adicionar Conta</h1>
@stop

@section('content')
<div class="col-lg-8 offset-lg-2 col-sm-12 mt-5">
                <div class="card">
                
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('create.account') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"  required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="number" name="value"  class="form-control valor {{ $errors->has('value') ? "is-invalid":"" }}"   >
                                @if($errors->has('value'))
                                    <span class="error invalid-feedback">{{ $errors->first('value') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="description"  class="form-control {{ $errors->has('description') ? "is-invalid":"" }}"   >

                                @if($errors->has('description'))
                                    <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select name ='type' class="form-control {{ $errors->has('type') ? "is-invalid":"" }}" >
                                    <option></option>
                                    <option value='debito' >debito</option>
                                    <option value='credito' >credito</option>
                                </select>
                                @if($errors->has('type'))
                                    <span class="error invalid-feedback">{{ $errors->first('type') }}</span>
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
