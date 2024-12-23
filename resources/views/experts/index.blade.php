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
                <th>Id#</th>
                <th>Nom</th>
                <th>Image</th>
                <th>Profession</th>
                <th>Domaine dexpertise</th>
                <th>Expérience</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experts as $expert)
                <tr>
                    <td>{{ $expert->id }}</td>
                    <td>{{ $expert->name }}</td>
                    <td>
                        <img src="{{ Storage::url($expert->image) }}" alt="{{ $expert->name }}" style="width: 50px; height: 50px;">
                    </td>
                    <td>{{ $expert->job }}</td>
                    <td>{{ $expert->domaine->name ?? 'N/A' }}</td>                    
                    <td>{{ $expert->nb_experience }} ans</td>
                    <td>{{ $expert->phone }}</td>
                    <td>{{ $expert->email }}</td>
                    <td>{{ $expert->address }}</td>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <a href="{{ route('experts.show', $expert->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet expert ?')">Supprimer</button>
                            </form>
                        </div>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Aucun expert trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
