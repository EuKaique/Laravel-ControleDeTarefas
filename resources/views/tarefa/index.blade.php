@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas
                    <a href="{{ route('tarefa.exportar', ['extensao' => 'xlsx']) }}" class="float-right mr-4">XLSX</a>
                    <a href="{{ route('tarefa.exportar', ['extensao' => 'csv']) }}" class="float-right mr-4">CSV</a>
                    <a href="{{ route('tarefa.exportacao') }}" class="float-right mr-4" target="_blank">PDF V2</a>
                    <a href="{{ route('tarefa.exportar', ['extensao' => 'pdf']) }}" class="float-right mr-4">PDF</a>
                    <a href="{{ route('tarefa.create') }}" class="float-right mr-4">Novo</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data limite</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarefas as $tarefa)
                            <tr>
                                <th>{{ $tarefa->id }}</th>
                                <td>{{ $tarefa->tarefa }}</td>
                                <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                <td><a href="{{ route('tarefa.edit', $tarefa->id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$tarefa->id}}" action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()">Excluir</a>
                                    </form>    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            @for($i=1; $i<=$tarefas->lastPage(); $i++)
                            <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $tarefas->url($i) }}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avan??ar</a></li>
                        </ul>
                    </nav>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection