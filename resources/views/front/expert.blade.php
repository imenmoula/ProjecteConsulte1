@php use Carbon\Carbon; @endphp@extends('front.home')
@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content">
                <h1>Détails de l'Expert</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $experts->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="product-details-section pt-100 pb-70 bg-black">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 pb-30">
                <img 
                 src="{{ Storage::url( $experts->image) }}" alt="expert">
                class="img-fluid rounded" 
                    alt="{{ $experts->name }}">
            </div>
            <div class="col-lg-7 pb-30">
                <h3 class="color-white">{{ $experts->name }}</h3>
                <p class="text-white"><strong>Email :</strong> {{ $experts->email }}</p>
                <p class="text-white"><strong>Téléphone :</strong> {{ $experts->phone }}</p>
                <p class="text-white"><strong>Adresse :</strong> {{ $experts->address ?? 'Non spécifiée' }}</p>
                <p class="text-white"><strong>Spécialité :</strong> {{ $experts->job }}</p>
                <p class="text-white"><strong>Expérience :</strong> {{ $experts->nb_experience }} ans</p>
                <p class="text-white"><strong>Domaine :</strong> {{ $experts->domaine->name ?? 'Non spécifié' }}</p>
                <h4 class="text-white">Disponibilités</h4>
                @if($experts->availabilities->isNotEmpty())
                <ul class="text-white">
                    @foreach($experts->availabilities as $availability)
                    @php
                        $start_time = Carbon::parse($availability->start_time)->format('d M Y H:i');
                        $end_time = Carbon::parse($availability->end_time)->format('d M Y H:i');
                        $status = ucfirst($availability->status);
                        // Déterminer la couleur selon le statut
                        $statusColor = '';
                        switch($availability->status) {
                            case 'reserve':
                                $statusColor = 'text-danger';  // Rouge pour réservé
                                break;
                            case 'disponible':
                                $statusColor = 'text-success';  // Vert pour disponible
                                break;
                            case 'indisponible':
                                $statusColor = 'text-primary';  // Bleu pour indisponible
                                break;
                            default:
                                $statusColor = 'text-warning';  // Jaune pour un statut inconnu
                                break;
                        }
                    @endphp
                    <li class="{{ $statusColor }}">
                        {{ $start_time }} - {{ $end_time }} ({{ $status }})
                    </li>
                @endforeach
                
                </ul>
                @else
                    <p class="text-white">Pas de disponibilité renseignée.</p>
                @endif
                <a href="{{ route('front.consulte.create') }}" class="btn btn-primary mt-3">Contacter {{ $experts->name }} est {{ $experts->av }}</a>
            </div>
        </div>
    </div>
</div>
@endsection


