@extends('dashboard')

@section('content')

<div class="container">
    <h1>Liste des Experts</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Poste</th>
                <th>Expérience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experts as $expert)
                <tr>
                    <td>{{ $expert->name }}</td>
                    <td>{{ $expert->job }}</td>
                    <td>{{ $expert->nb_experience }} ans</td>
                    <td>
                        <a href="{{ route('experts.show', $expert->id) }}" class="btn btn-info">Voir</a>
                        <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet expert  ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
