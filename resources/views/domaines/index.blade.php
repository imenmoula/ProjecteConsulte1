@extends('dashboard')
@section('content')

<h1>Liste des Domaines</h1>
<a href="{{ route('domaines.create') }}">Ajouter un Domaine</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($domaines as $domaine)
            <tr>
                <td>{{ $domaine->id }}</td>
                <td>{{ $domaine->name }}</td>
                <td>{{ $domaine->description }}</td>
                <td><img src="{{ asset('storage/' . $domaine->image) }}" alt="{{ $domaine->name }}" width="100"></td>
                <td>


                    <a href="{{ route('domaines.edit', $domaine) }}">Modifier</a>
                    <a href="{{ route('domaines.show', $domaine->id) }}">Voir le Domaine</a>

                    <form action="{{ route('domaines.destroy', $domaine) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@if(session()->has('success'))
<div>{{ session()->get('success') }}</div>
@endif

@endsection