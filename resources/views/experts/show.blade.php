@extends('dashboard')
@section('content')

    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p><strong>Adresse :</strong> {{ $user->address }}</p>
        <p><strong>Téléphone :</strong> {{ $user->phone }}</p>
        <p><strong>Spécialité :</strong> {{ $user->domaine->name ?? 'Non spécifié' }}</p>
        <p><strong>Années d'expérience :</strong> {{ $user->nb_experience }}</p>
        
        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="Image de l'expert" width="200">
        @endif

        <a href="{{ route('experts.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>
@endsection
