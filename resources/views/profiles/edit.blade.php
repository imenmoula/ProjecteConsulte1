@extends('dashboard')

@section('content')

<div class="container">
    <h1>Modifier mon Profil</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="job">Poste</label>
            <input type="text" class="form-control" id="job" name="job" value="{{ old('job', $user->job) }}">
        </div>

        <div class="form-group">
            <label for="availability">Disponibilité</label>
            <input type="checkbox" id="availability" name="availability" {{ $user->availability ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="image">Image de Profil</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="nb_experience">Expérience</label>
            <input type="number" class="form-control" id="nb_experience" name="nb_experience" value="{{ old('nb_experience', $user->nb_experience) }}">
        </div>

        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
        </div>

        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour le profil</button>
    </form>

    <br>

    <a href="{{ route('profile.show') }}" class="btn btn-secondary">Retour au profil</a>
</div>

@endsection
