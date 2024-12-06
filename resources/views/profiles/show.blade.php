
@extends('dashboard')
@section('content')
<h1>Mon Profil</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <label for="name">Nom :</label>
    <input type="text" name="name" value="{{ $expert->name }}">
    <br>

    <label for="email">Email :</label>
    <input type="email" name="email" value="{{ $expert->email }}">
    <br>

    <label for="address">Adresse :</label>
    <input type="text" name="address" value="{{ $expert->address }}">
    <br>

    <label for="phone">Téléphone :</label>
    <input type="text" name="phone" value="{{ $expert->phone }}">
    <br>

    <label for="specialty">Spécialité :</label>
    <input type="text" name="specialty" value="{{ $expert->specialty }}">
    <br>

    <label for="availability">Disponibilité :</label>
    <select name="availability">
        <option value="1" {{ $expert->availability ? 'selected' : '' }}>Disponible</option>
        <option value="0" {{ !$expert->availability ? 'selected' : '' }}>Indisponible</option>
    </select>
    <br>

    <label for="nb_experience">Années d'expérience :</label>
    <input type="number" name="nb_experience" value="{{ $expert->nb_experience }}">
    <br>

    <label for="domaine_id">Domaine :</label>
    <select name="domaine_id">
        @foreach ($domaines as $domaine)
            <option value="{{ $domaine->id }}" {{ $expert->domaine_id == $domaine->id ? 'selected' : '' }}>
                {{ $domaine->name }}
            </option>
        @endforeach
    </select>
    <br>

    <button type="submit">Mettre à jour</button>
</form>

<h2>Changer le mot de passe</h2>
<form action="{{ route('profile.updatePassword') }}" method="POST">
    @csrf
    <label for="current_password">Mot de passe actuel :</label>
    <input type="password" name="current_password">
    <br>

    <label for="password">Nouveau mot de passe :</label>
    <input type="password" name="password">
    <br>

    <label for="password_confirmation">Confirmer le mot de passe :</label>
    <input type="password" name="password_confirmation">
    <br>

    <button type="submit">Changer le mot de passe</button>
</form>

<h2>Changer l'image</h2>
<form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <br>
    <button type="submit">Télécharger</button>
</form>
@endsection