@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Clientes</h3>

        <a href="{{ route('clients.create') }}" class="btn btn-primary">Novo cliente</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
            @foreach([] as $client)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{route('clients.edit',['id'=> 1])}}" class="btn btn-default btn-sm">
                            Editar
                        </a>
                        <a href="{{route('clients.delete',['id'=> 2])}}" class="btn btn-default btn-sm">
                            Excluir
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
