@extends('dashboard')
@section('content')
<h1>Modifier une Disponibilité</h1>
<form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="expert_id">Expert :</label>
    <select name="expert_id" required>
        @foreach($experts as $expert)
            <option value="{{ $expert->id }}" @if($expert->id == $availability->expert_id) selected @endif>
                {{ $expert->name }}
            </option>
        @endforeach
    </select>

    <label for="start_time">Début :</label>
    <input type="datetime-local" name="start_time" value="{{ $availability->start_time }}" required>

    <label for="end_time">Fin :</label>
    <input type="datetime-local" name="end_time" value="{{ $availability->end_time }}" required>

    <label for="status">Statut :</label>
    <select name="status" required>
        <option value="disponible" @if($availability->status == 'disponible') selected @endif>Disponible</option>
        <option value="réservé" @if($availability->status == 'réservé') selected @endif>Réservé</option>
        <option value="indisponible" @if($availability->status == 'indisponible') selected @endif>Indisponible</option>
    </select>

    <button type="submit">Mettre à jour</button>
</form>
@endsection
