@extends('front/home')
@section('container')

<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>A propos</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">A propos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

{{-- ***************************************************************************************** --}}
<section class="service-section p-tb-100 bg-black">
    <div class="container-fluid">
        <div class="bg-main bg-overlay-transparent contain-box">
            <div class="container">
                <div class="section-title">
                    <h2 class="color-white">Nos domaines d'expertise</h2>
                </div>
                <div class="row">
                    @foreach($domaines as $domaine)
                    <div class="col-sm-12 col-md-6 col-lg-4 pb-30">
                        <div class="service-item">
                            <div class="service-content">
                                <h3>{{ $domaine->nom }}</h3>
                                <p>{{ $domaine->description }}</p>
                                <ul>
                                    @foreach($domaine->experts as $expert)
                                        <li>{{ $expert->name }} - {{ $expert->specialty }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-section p-tb-100 bg-black">
    <div class="container">
        <div class="section-title">
            <small>Chez Group Consulting</small>
            <h2 class="color-white">Rencontrez nos experts</h2>
        </div>
        <div class="team-carousel owl-carousel owl-theme">
            @foreach($experts as $expert)
            <div class="item">
                <div class="team-item team-item-light">
                    <div class="team-thumb">
                        <img src="{{ asset('storage/'.$expert->image) }}" alt="expert">
                        <div class="team-overlay">
                            <ul class="social-list social-list-white">
                                <li><a href=""><i class="flaticon-facebook"></i></a></li>
                                <li><a href=""><i class="flaticon-twitter"></i></a></li>
                                <li><a href=""><i class="flaticon-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="carousel-name">{{ $expert->name }}</h3>
                        <h4 class="carousel-designation">{{ $expert->specialty }}</h4>
                        <h4 class="carousel-designation">{{ $expert->phone}}</h4>
                        <h4 class="carousel-designation">{{ $expert->address}}</h4>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
