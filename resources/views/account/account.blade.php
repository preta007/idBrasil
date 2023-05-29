
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <a href="{{ route('add.account') }}" class="btn btn-primary float-right mb-5">Adicionar Conta<a>
    <h1 class="float-left">Dashboard</h1>
@stop

@section('content')
{{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'Nome',
    'Saldo',
    ['label' => 'Ações', 'no-export' => true, 'width' => 5],
];
@endphp
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($account as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ number_format( $row->value, 2, '.', '') }}</td>
            <td>
                <form action="{{ route('destroy.account', $row->id) }}" method="post">
                    @csrf
                    <div class="btn-group">
                        <a href="{{ route('movement', $row->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('edit.account', $row->id) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Tem certeza?')) { this.form.submit() } "> <i class="fa fa-trash"></i></button>
                    </div>
                </form>                          
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>
@stop
