@extends('front.home')

@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>Liste des experts</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Retour a l'accueil</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Liste des experts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="menu-section bg-black p-tb-100">
    <div class="container position-relative">
        <div class="section-title">
            <small>nos Expert consulting group</small>
            <h2 class="color-white">Il faut choisir parmi les meilleurs experts</h2>
        </div>
        @if($domaines && count($domaines) > 0)
        <div class="menu-main-carousel-area">
            <div class="menu-main-thumb-nav">
                @foreach($domaines as $domaine)
                <div class="menu-main-thumb-item menu-main-thumb-black">
                    <div class="menu-main-thumb-inner">
                        <img src="{{ asset('storage/' . $domaine->image) }}" alt="domaine">
                        <p>{{ $domaine->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p>Aucun domaine trouvé.</p>
        @endif

        <div class="menu-main-details-for">
            @foreach($experts as $expert)
            <div class="menu-main-details-item">
                <div class="receipe-grid receipe-grid-three">
                    <div class="receipe-item receipe-item-black pb-30 receipe-grid-item">
                        <div class="receipe-item-inner">
                            <div class="receipe-image">
                                <img src="{{ Storage::url($expert->image) }}" alt="expert">
                            </div>
                            <div class="receipe-content">
                                <div class="receipe-info">
                                    <h3><a href="{{ route('expert.detail', $expert->id) }}">{{ $expert->name }}</a></h3>
                                    <h4>Spécialité : {{ $expert->job }}</h4>
                                    <h4>Domaine : {{ $expert->domaine->name }}</h4>
                                    <h4>Nombre d'années d'expérience : {{ $expert->nb_experience }} ans</h4>
                                </div>
                                <div class="receipe-cart">
                                    <a href="{{ route('expert.detail', $expert->id) }}">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="#" class="btn load-more-btn">
                <span class="load-more-text">Voir plus</span>
                <span class="load-more-icon"><i class="icofont-refresh"></i></span>
            </a>
        </div>
    </div>
</section>

<section class="step-section p-tb-100 bg-white">
    <div class="container">
        <div class="section-title">
            <h2 class="color-black">3 Steps pour passer une demande de consultation</h2>
        </div>
        <div class="steps-box">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="steps-item">
                        <h3>1. Choisir votre expert</h3>
                        <p>Choisir un expert selon vos besoins.</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="steps-item">
                        <h3>2. Vérifier la disponibilité</h3>
                        <p>Vérifier la disponibilité de l'expert.</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 offset-md-3 offset-lg-0">
                    <div class="steps-item">
                        <h3>3. Paiement de la consultation</h3>
                        <p>Paiement de la consultation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
