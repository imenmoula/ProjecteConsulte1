@extends('front.home')

@section('container')

<div class="container">
    <h1>Modifier le Rendez-vous</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('front.consulte.update', $rendivent->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour -->

        <!-- Titre -->
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $rendivent->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sujet -->
        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <textarea class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet">{{ old('sujet', $rendivent->sujet) }}</textarea>
            @error('sujet')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date et Heure -->
        <div class="mb-3">
            <label for="timedate" class="form-label">Date et Heure</label>
            <input type="datetime-local" class="form-control @error('timedate') is-invalid @enderror" id="timedate" name="timedate" value="{{ old('timedate', \Carbon\Carbon::parse($rendivent->timedate)->format('Y-m-d\TH:i')) }}" required>
            @error('timedate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

@endsection
