@extends('dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Détails de l'Expert</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Nom : {{ $expert->name }}</h5>
                            <h5>Email : {{ $expert->email }}</h5>
                            <h5>Adresse : {{ $expert->address }}</h5>
                            <h5>Téléphone : {{ $expert->phone }}</h5>
                            <h5>Spécialité : {{ $expert->specialty }}</h5>
                            <h5>Disponibilité : {{ $expert->availability }}</h5>
                            <h5>Nombre d'expérience : {{ $expert->nb_experience }}</h5>
                            <h5>Domaine : {{ $expert->domaine->name }}</h5>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('storage/' . $expert->image) }}" class="img-fluid" alt="{{ $expert->name }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection