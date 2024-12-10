<!-- resources/views/availabilities/index.blade.php -->
@extends('dashboard')
@section('content')
<div class="container">
    <h1>Liste des Disponibilités</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ route('availabilities.create') }}" class="btn btn-primary mb-3">Ajouter une Disponibilité</a>
    @if($availabilities->isEmpty())
        <p>Aucune disponibilité trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Nom de l'expert</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
        @foreach($availabilities as $availability)
        <tr>
            <td>{{ $availability->user->name }}</td>
            <td>{{ $availability->start_time }}</td>
            <td>{{ $availability->end_time }}</td>
            <td>{{ $availability->status }}</td>
            <td>
                <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn btn-warning">Modifier</a>
                <a href="{{ route('availabilities.show', $availability->id) }}" class="btn btn-info">Voir</a>
                <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
        </table>
    @endif
</div>
@endsection
