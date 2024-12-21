@extends('dashboard')
@section('content')


    <!-- Contenu principal de la page -->
    <div class="container mt-5">
        <div class="row">
            <!-- Carte Utilisateurs -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-white bg-primary shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Nombre d'Utilisateurs</h5>
                        <p class="card-text">{{ $userCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Carte Experts -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-white bg-success shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Nombre d'Experts</h5>
                        <p class="card-text">{{ $expertCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection