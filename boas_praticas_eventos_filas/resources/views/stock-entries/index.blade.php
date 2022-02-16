@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Entradas de Estoque</h3>
                <a href="{{route('stock_entries.create')}}" class="btn btn-primary">Novo</a>
            </div>
        </div>
        <br/>
        @include('stock-movements._index')
    </div>
@endsection
