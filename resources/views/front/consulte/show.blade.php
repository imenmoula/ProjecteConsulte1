@extends('front.home')
@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
            
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>Le demande de consultation </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">demande de consultation avec {{ $expert->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h1>Détails du Rendez-vous</h1>
    <p><strong>ID : </strong>{{ $rendivent->id }}</p>
    <p><strong>Utilisateur ID : </strong>{{ $rendivent->user_id }}</p>
    <p><strong>Titre : </strong>{{ $rendivent->title }}</p>
    <p><strong>Sujet : </strong>{{ $rendivent->sujet }}</p>
    <p><strong>Date et Heure : </strong>{{ $rendivent->timedate }}</p>
    <a href="{{ route('rendivents.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>


@endsection
