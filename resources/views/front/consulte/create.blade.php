@extends('front.home')

@section('container')

<div class="container">
    <h1>Créer un Rendez-vous</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('front.consulte.store') }}" method="POST">
        @csrf

        <!-- Pas besoin de champ pour l'ID utilisateur car il est rempli automatiquement -->

        <!-- Titre -->
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sujet -->
        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <textarea class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet"></textarea>
            @error('sujet')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date et Heure -->
        <div class="mb-3">
            <label for="timedate" class="form-label">Date et Heure</label>
            <input type="datetime-local" class="form-control @error('timedate') is-invalid @enderror" id="timedate" name="timedate" required>
            @error('timedate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('front.consulte.index') }}" class="btn btn-secondary">Retour à la liste des demandes</a>
    </form>
</div>

@endsection
