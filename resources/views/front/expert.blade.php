@extends('front.home')

@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content">
                <h1>Détails de l'expert</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Détails de l'expert</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="product-details-section pt-100 pb-70 bg-black">
    <div class="container">
        <div class="row align-items-center">
            @foreach($experts as $expert)
            <div class="col-lg-5 pb-30">
                <div class="product-details-item">
                    <div class="product-details-slider">
                        <div class="product-details-for popup-gallery">
                            <div class="product-for-item">
                                <a href="{{ asset('storage/' . $expert->image) }}">
                                    <img src="{{ asset('storage/' . $expert->image) }}" alt="Image de l'expert">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pb-30">
                <div class="product-details-item">
                    <div class="product-details-caption">
                        <h3 class="mb-20 color-white">{{ $expert->name }}</h3>
                        <p class="mb-20 text-white"><strong>Email :</strong> {{ $expert->email }}</p>
                        <p class="mb-20 text-white"><strong>Adresse :</strong> {{ $expert->address ?? 'Non spécifiée' }}</p>
                        <p class="mb-20 text-white"><strong>Téléphone :</strong> {{ $expert->phone ?? 'Non spécifié' }}</p>
                        <p class="mb-20 text-white"><strong>Spécialité :</strong> {{ $expert->specialty ?? 'Non spécifiée' }}</p>
                        <p class="mb-20 text-white"><strong>Années d'expérience :</strong> {{ $expert->nb_experience ?? 'Non spécifiées' }}</p>
                        <p class="mb-20 text-white"><strong>Domaine :</strong> {{ $expert->domaine->name ?? 'Non spécifié' }}</p>

                        <h4 class="text-white">Disponibilités</h4>
                        @if($expert->availabilities->isNotEmpty())
                            <ul class="mb-20 text-white">
                                @foreach($expert->availabilities as $availability)
                                    @php
                                        $start_time = \Carbon\Carbon::parse($availability->start_time);
                                        $end_time = \Carbon\Carbon::parse($availability->end_time);
                                        $status = ucfirst($availability->status);
                                    @endphp
                                    <li>
                                        {{ $start_time->format('d M Y H:i') }} - 
                                        {{ $end_time->format('d M Y H:i') }} 
                                        ({{ $status }})
                                    </li>
                                    @if($availability->status == 'reserve')
                                        <p style="color: red;">Consultation réservée</p>
                                    @elseif($availability->status == 'indisponible')
                                        <p style="color: gray;">Indisponible</p>
                                    @elseif($availability->status == 'disponible')
                                        <p style="color: green;">Disponible</p>
                                    @else
                                        <p style="color: orange;">Statut inconnu</p>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-white">Pas de disponibilité renseignée.</p>
                        @endif

                        <a href="#" class="btn btn-icon">
                            Passez une consultation avec {{ $expert->name }}
                            <i class="flaticon-mail"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
