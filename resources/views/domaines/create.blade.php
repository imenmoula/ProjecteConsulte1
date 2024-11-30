@extends('dashboard')
@section('content')

<h1>Ajouter un Domaine</h1>

<form action="{{ route('domaines.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label for="name">Nom:</label>
    <input type="text" name="name" required>

    <label for="description">Description:</label>
    <textarea name="description"></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <button type="submit">Créer</button>
</form>

<a href="{{ route('domaines.index') }}">Retour à la liste</a>

@endsection