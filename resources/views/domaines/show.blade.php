@extends('dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <h3 class="text-center">Détails de l'Expert</h3>
                <p><strong>Nom :</strong> {{ $expert->name }}</p>
                <p><strong>Email :</strong> {{ $expert->email }}</p>
                <p><strong>Adresse :</strong> {{ $expert->address }}</p>
                <p><strong>Téléphone :</strong> {{ $expert->phone }}</p>
                <p><strong>Spécialité :</strong> {{ $expert->specialty }}</p>
                <p><strong>Disponibilité :</strong> {{ $expert->availability ? 'Disponible' : 'Non disponible' }}</p>
                <p><strong>Nombre d'années d'expérience :</strong> {{ $expert->nb_experience }}</p>
                <p><strong>Domaine :</strong> {{ optional($expert->domaine)->name }}</p>

                @if($expert->image)
                    <div class="text-center mt-3">
                        <img src="{{ asset('storage/' . $expert->image) }}" class="rounded img-fluid" alt="{{ $expert->name }}">
                    </div>
                @else
                    <p class="text-danger text-center">Image non disponible</p>
                @endif
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('experts.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection