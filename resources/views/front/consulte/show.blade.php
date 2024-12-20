@extends('front.home')

@section('container')

<!-- Header Section -->
<div class="header-bg header-bg-page bg-dark">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content text-center text-white">
                <h1 class="display-4 font-weight-bold">Détails du Rendez-vous</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('front.consulte.index') }}" class="text-white">Liste des Rendez-vous</a></li>
                        <li class="breadcrumb-item active" aria-current="page" class="text-white">Détails du Rendez-vous</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="container mt-5">
    <div class="row">
        <!-- Détails du rendez-vous -->
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Détails du Rendez-vous</h3>
                </div>
                <div class="card-body text-dark">
                    <p><strong>ID : </strong>{{ $rendivent->id }}</p>
                    <p><strong>Utilisateur : </strong>{{ $rendivent->user->name }}</p> <!-- Afficher le nom de l'utilisateur -->
                    <p><strong>Titre : </strong>{{ $rendivent->title }}</p>
                    <p><strong>Sujet : </strong>{{ $rendivent->sujet ? $rendivent->sujet : 'Aucun sujet spécifié' }}</p>
                    <p><strong>Date et Heure : </strong>{{ \Carbon\Carbon::parse($rendivent->timedate)->format('d M Y, H:i') }}</p> <!-- Formatage de la date -->

                    <div class="mt-4">
                        <a href="{{ route('front.consulte.index') }}" class="btn btn-secondary btn-lg">Retour à la liste des demandes</a> <!-- Bouton retour -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
