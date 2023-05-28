
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <a href="{{ route('add.account') }}" class="btn btn-primary float-right mb-10">Adicionar Movimento<a>
@stop

@section('content')
<br><br>
<div class="callout callout-info">
        <h5>Conta:</h5>
        {{ $account->name }}
    </div>

{{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'Tipo',
    'Saldo',
    'Descrição',
    'Data',
    ['label' => 'Ações', 'no-export' => true, 'width' => 5],
];
@endphp
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($movement as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->type}}</td>
            <td>{{ $row->value }}</td>
            <td>{{ $row->description }}</td>
            <td>{{ $row->created_at }}</td>
            <td>
                <form action="{{ route('destroy.movement', $row->id) }}" method="post">
                    @csrf
                    <div class="btn-group">
                        <a href="{{ route('home') }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Tem certeza?')) { this.form.submit() } "> <i class="fa fa-trash"></i></button>
                    </div>
                </form>                          
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>
@stop
