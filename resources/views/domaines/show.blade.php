@extends('dashboard')
@section('content')
<div class="container">
    <h1>{{ $domaine->name }}</h1>
    <p>{{ $domaine->description }}</p>
    @if ($domaine->image)
        <img src="{{ asset('storage/'.$domaine->image) }}" alt="Image" width="200">
    @else
        <p>Pas d'image disponible</p>
    @endif
    <a href="{{ route('domaines.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
