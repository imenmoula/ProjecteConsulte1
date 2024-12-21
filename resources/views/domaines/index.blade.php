@extends('dashboard')
@section('content')
<div class="container">
    <h1>Domaines</h1>
    <a href="{{ route('domaines.create') }}" class="btn btn-primary">Créer un Domaine</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($domaines as $domaine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $domaine->name }}</td>
                    <td>{{ $domaine->description }}</td>
                    <td>
                        @if ($domaine->image)
                            <img src="{{ asset('storage/'.$domaine->image) }}" alt="Image" width="50">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('domaines.show', $domaine) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('domaines.edit', $domaine) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('domaines.destroy', $domaine) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
