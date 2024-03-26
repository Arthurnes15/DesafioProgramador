@extends ('layouts.main')

@include('layouts.navbar')

@section('content')
@auth
<h1>Tabela de Ativos</h1>
<table class="container table table-hover">
    <thead>
        <tr>
            <th scope="col">Nome do Ativo</th>
            <th scope="col">Nome do Responsável</th>
            <th scope="col">Tipo do Responsável</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data Aquisição</th>
            <th scope="col">Valor</th>
            <th scope="col">Tipo Ativo</th>
            <th scope="col">Localização</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($actives as $active)
        <tr>
            <td>{{ $active->active_name }}</td>
            <td>{{ $active->person->person_name }}</td>
            <td>{{ $active->person->person_type }}</td>
            <td>{{ $active->active_dscp }}</td>
            <td>{{ $active->active_ctgr }}</td>
            <td>{{ date('d / m / Y', strtotime($active->active_date)) }}</td>
            <td>{{ $active->active_value }}</td>
            <td>{{ $active->active_local }}</td>
            <td>{{ $active->local->active_street }} - {{ $active->local->active_street_number }}, {{ $active->local->active_city }} - {{ $active->local->active_state }}, {{ $active->local->active_country }} </td>
            <td>
                <form action="crud/{{ $active->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill text-danger" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                        </svg>
                    </button>
                </form>
            </td>
            <td>
                <a href="/crud/edit/{{ $active->id }}">  
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill text-info-emphasis" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                    </svg>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endauth
@endsection