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
        
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <textarea class="form-control @error('sujet') is-invalid @enderror" id="sujet" name="sujet"></textarea>
            @error('sujet')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="timedate" class="form-label">Date et Heure</label>
            <input type="datetime-local" class="form-control @error('timedate') is-invalid @enderror" id="timedate" name="timedate" required>
            @error('timedate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection