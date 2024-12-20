
@extends('front.home')
@section('container')

<div class="container">
    <h1>Modifier le Rendez-vous</h1>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <form action="{{ route('front.consulte.update', $rendivent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $rendivent->user_id }}" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $rendivent->title }}" required>
        </div>
        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <textarea class="form-control" id="sujet" name="sujet">{{ $rendivent->sujet }}</textarea>
        </div>
        <div class="mb-3">
            <label for="timedate" class="form-label">Date et Heure</label>
            <input type="datetime-local" class="form-control" id="timedate" name="timedate" value="{{ $rendivent->timedate }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@

@endsection