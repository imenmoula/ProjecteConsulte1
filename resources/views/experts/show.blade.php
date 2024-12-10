@extends('dashboard')

@section('content')

<div class="container">
    <h1>Détails de l'Expert</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- Affichage de l'image de l'expert -->
                    @if($user->image)
                        <img src="{{ Storage::url($user->image) }}" class="img-fluid" alt="Image de {{ $user->name }}">
                    @else
                        <img src="https://via.placeholder.com/150" class="img-fluid" alt="Image par défaut">
                    @endif
                </div>

                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Poste:</strong> {{ $user->job ?? 'Non spécifié' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Adresse:</strong> {{ $user->address ?? 'Non spécifiée' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Téléphone:</strong> {{ $user->phone ?? 'Non spécifié' }}
                        </li>
                        <li class="list-group-item">
                            <strong>Expérience:</strong> {{ $user->nb_experience ?? 'Non spécifiée' }} ans
                        </li>
                        <li class="list-group-item">
                            <strong>Domaine:</strong> {{ $user->domaine->name ?? 'Non spécifié' }}
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('experts.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>

@endsection
