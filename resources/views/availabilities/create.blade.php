@extends('dashboard')
@section('content')
    <h1>Créer une Disponibilité</h1>
    <form action="{{ route('availabilities.store') }}" method="POST">
        @csrf
        <label for="expert_id">Expert :</label>
        <select name="expert_id" id="expert_id" required>
            @foreach($experts as $expert)
                <option value="{{ $expert->id }}">{{ $expert->name }}</option>
            @endforeach
        </select>

        <label for="start_time">Début :</label>
        <input type="datetime-local" name="start_time" required>

        <label for="end_time">Fin :</label>
        <input type="datetime-local" name="end_time" required>

        <label for="status">Statut :</label>
        <select name="status" required>
            <option value="disponible">Disponible</option>
            <option value="réservé">Réservé</option>
            <option value="indisponible">Indisponible</option>
        </select>

        <button type="submit">Enregistrer</button>
    </form>
@endsection
