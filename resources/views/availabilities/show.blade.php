@extends('dashboard')
@section('content')
<div class="container">
    <h1>Détails de la Disponibilité pour </h1>
    <table class="table table-bordered">
        <tr>
            <th>Nom de lexpert:</th>
            <td>{{ $availability->user->name }}</td>
        </tr>
        <tr>
            <th>Début</th>
            <td>{{ $availability->start_time }}</td>
        </tr>
        <tr>
            <th>Fin</th>
            <td>{{ $availability->end_time }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td>{{ ucfirst($availability->status) }}</td>
        </tr>
    </table>
    <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection

