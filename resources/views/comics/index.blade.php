@extends('layouts.base')

@section('title', 'Listing page')

@section('content')
    @if (session('success_delete'))
        <div class="alert alert-success">
            {{-- {{ session('success_delete') }} --}}
            Il post con id {{ session('success_delete') }} e' stato eliminato correttamente
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Città</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Disponibile da</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($houses as $house)
                <tr>
                    <th scope="row">{{ $house->id }}</th>
                    <td>{{ $house->city }}</td>
                    <td>{{ $house->price }}</td>
                    <td>{{ $house->free_from }}</td>
                    <td>
                        <a href="{{ route('houses.show', ['house' => $house]) }}" class="btn btn-primary">Visita</a>
                    </td>
                    <td>
                        <a href="{{ route('houses.edit', ['house' => $house]) }}" class="btn btn-warning">Edita</a>
                    </td>
                    <td>
                        <form action="{{ route('houses.destroy', ['house' => $house]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $houses->links() }}
@endsection
