@extends('dashboard')
@section('content')
<h1>Détails de la Disponibilité</h1>
<p><strong>Expert :</strong> {{ $availability->expert->name }}</p>
<p><strong>Début :</strong> {{ $availability->start_time }}</p>
<p><strong>Fin :</strong> {{ $availability->end_time }}</p>
<p><strong>Statut :</strong> {{ $availability->status }}</p>

<a href="{{ route('availabilities.index') }}">Retour à la liste</a>
@endsection
