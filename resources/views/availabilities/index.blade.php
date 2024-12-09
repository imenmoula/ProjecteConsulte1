@extends('dashboard')
@section('content')
    <h1>Liste des Disponibilités</h1>
    <a href="{{ route('availabilities.create') }}">Ajouter une disponibilité</a>

    <table>
        <thead>
            <tr>
                <th>Expert</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilities as $availability)
                <tr>
                    <td>{{ $availability->expert->name }}</td>
                    <td>{{ $availability->start_time }}</td>
                    <td>{{ $availability->end_time }}</td>
                    <td>{{ $availability->status }}</td>
                    <td>
                        <a href="{{ route('availabilities.edit', $availability->id) }}">Modifier</a>
                        <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
