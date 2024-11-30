@extends('dashboard')
@section('content')

<h1>Modifier le Domaine</h1>

<form action="{{ route('domaines.update', $domaine) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="name">Nom:</label>
    <input type="text" name="name" value="{{ old('name', $domaine->name) }}" required>

    <label for="description">Description:</label>
    <textarea name="description">{{ old('description', $domaine->description) }}</textarea>

    <label for="image">Image:</label>
    @if($domaine->image)
      <img src="{{ asset('storage/' . $domaine->image) }}" alt="{{ $domaine->name }}" width="100">
      <br><strong>Nouvelle image :</strong><br>
      <input type="file" name="image">
      <br><small>Laissez vide si vous ne souhaitez pas changer l'image.</small>
      @else 
      <input type="file" name="image">
      @endif

      <button type="submit">Mettre à jour</button>

</form>

<a href="{{ route('domaines.index') }}">Retour à la liste</a>

@endsection