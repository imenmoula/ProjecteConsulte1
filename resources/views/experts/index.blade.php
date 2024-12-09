@extends('dashboard')
@section('content')
    <div class="container">
        <h1>Liste des Experts</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('experts.create') }}" class="btn btn-primary mb-3">Ajouter un Expert</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Spécialité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $expert)
                    <tr>
                        <td>{{ $expert->name }}</td>
                        <td>{{ $expert->address }}</td>
                        <td>{{ $expert->phone }}</td>
                        <td>{{ $expert->domaine->name ?? 'Non spécifié' }}</td>
                        <td>
                            <a href="{{ route('experts.show', $expert->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('experts.edit', $expert->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet expert ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
