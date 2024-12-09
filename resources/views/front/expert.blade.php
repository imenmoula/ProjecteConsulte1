@extends('front.home')

@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
            
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>Détails de l'expert</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Le expet{{ $experts->name }} Details</li>
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
                <div class="product-details-item">
                    <div class="product-details-slider">
                        <div class="product-details-for popup-gallery">
                            <div class="product-for-item">
                                <a href="{{ asset('storage/' . $experts->image) }}">
                                    <img src="{{ asset('storage/' . $experts->image) }}" alt="Expert Image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pb-30">
                <div class="product-details-item">
                    <div class="product-details-caption">
                        <h3 class="mb-20 color-white">{{ $experts->name }}</h3>
                        <p class="mb-20 text-white"><strong>Email:</strong> {{ $experts->email }}</p>
                        <p class="mb-20 text-white"><strong>Adresse:</strong> {{ $experts->address ?? 'Non spécifiée' }}</p>
                        <p class="mb-20 text-white"><strong>Téléphone:</strong> {{ $experts->phone ?? 'Non spécifié' }}</p>
                        <p class="mb-20 text-white"><strong>Spécialité:</strong> {{ $experts->specialty ?? 'Non spécifiée' }}</p>
                        <p class="mb-20 text-white"><strong>Années d'expérience:</strong> {{ $experts->nb_experience ?? 'Non spécifiées' }}</p>
                        <p class="mb-20 text-white"><strong>Domaine:</strong> {{ $experts->domaine->name ?? 'Non spécifié' }}</p>
                        
                        <div class="product-status mb-20">
                            @if($experts->availability)
                                <span style="color:green;"> <strong>Disponible</strong></span>
                            @else
                                <span style="color: red;"> <strong> Non Disponible</strong></span>
                            @endif
                        </div>

                        
                        
                        <a href="" class="btn btn-icon">
                            Passe une consultation avec {{ $experts->name }}
                            <i class="flaticon-mail"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
