@extends('dashboard')
@section('content')
<div class="container">
    <h1>Modifier une Disponibilité - {{ $user->name }}</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="start_time" class="form-label">Heure de Début</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ $availability->start_time }}" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Heure de Fin</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ $availability->end_time }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" class="form-control" required>
                <option value="disponible" {{ $availability->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="reserver" {{ $availability->status == 'reserver' ? 'selected' : '' }}>Réservé</option>
                <option value="indisponible" {{ $availability->status == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection
