@extends('dashboard')
@section('content')
<h1>Ajouter un Expert</h1>

<form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data"> <!-- Ajout de enctype -->
    @csrf
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="form-control" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>

        <label for="address">Adresse</label>
        <input type="text" name="address" id="address" class="form-control">

        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone" class="form-control">

        <label for="specialty">Spécialité</label>
        <input type="text" name="specialty" id="specialty" class="form-control">

        <label for="availability">Disponibilité</label>
        <select name="availability" id="availability" class="form-control">
            <option value="1">Disponible</option>
            <option value="0">Non disponible</option>
        </select>

        <label for="nb_experience">Nombre d'années d'expérience</label>
        <input type="number" name="nb_experience" id="nb_experience" class="form-control">

        <label for="domaine_id">Domaine</label>
        <select name="domaine_id" id="domaine_id" class="form-control">
            @foreach($domaines as $domaine)
                <option value="{{ $domaine->id }}">{{ $domaine->name }}</option> <!-- Liste des domaines -->
            @endforeach
        </select>

        <!-- Champ pour télécharger l'image -->
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png,.gif,.svg" required> <!-- Acceptation des formats d'image -->
    </div>

    <button type="submit" class="btn btn-success">Créer</button>
</form>

<a href="{{ route('experts.index') }}" class="btn btn-secondary">Retour</a>
@endsection