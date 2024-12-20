@extends('front/home')

@section('container')

<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content">
                <h1>À propos</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">À propos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

{{-- ***************************************************************************************** --}}
<section class="welcome-section bg-overlay-1 pt-100 pb-70 bg-black">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-5 col-lg-5 pb-30">
                <div class="section-title section-title-left text-center text-md-start m-0">
                    <small>Bienvenue chez Group Consulting</small>
                    <h2 class="color-white">Nous Accueillons Les Meilleurs Experts de Consulting Group</h2>
                    <p>Consulting Group réunit les meilleurs experts du pays, offrant des services de conseil de qualité et des solutions innovantes. Nous nous engageons à fournir des solutions adaptées et à garantir la satisfaction de nos clients grâce à notre expertise et professionnalisme.</p>
                     <a href="#" class="btn btn-icon">
                        Plus de détails chez Group Consulting
                        <i class="flaticon-right-arrow-sketch-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7">
                <div class="about-image-grid">
                    <div class="about-image-grid-item">
                        <div class="about-image-grid-inner mb-30">
                            <img src="{{ asset('photo/img.webp') }}" alt="consulting experts">
                        </div>
                        <div class="about-image-grid-inner mb-30">
                            <img src="{{ asset('photo/img2.png') }}" alt="consulting team">
                        </div>
                    </div>
                    <div class="about-image-grid-item">
                        <div class="about-image-grid-inner fluid-height">
                            <img src="{{ asset('photo/img3.jpg') }}" alt="workplace">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- **************************************************************************************** --}}

<section class="team-section p-tb-100 bg-black">
    <div class="container">
        <div class="section-title">
            <small>Nos Meilleurs Experts</small>
            <h2 class="color-white">Notre Équipe</h2>
        </div>
        <div class="team-carousel owl-carousel owl-theme">
            @forelse($experts as $expert)
            <div class="item">
                <div class="team-item team-item-light" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div class="team-thumb" style="width: 150px; height: 150px; margin-bottom: 15px;">
                        <img src="{{ Storage::url($expert->image) }}" alt="expert" 
                             class="img-fluid rounded-circle" 
                             style="width: 100%; height: 100%; object-fit: cover;" 
                             alt="{{ $expert->name }}">
                        <div class="team-overlay">
                            <ul class="social-list social-list-white">
                                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3 class="carousel-name"><a href="#">{{ $expert->name }}</a></h3>
                        <h4 class="carousel-designation">{{ $expert->domaine->name }}</h4>
                    </div>
                </div>
            </div>
            @empty
            <p>Pas d'experts</p>
            @endforelse
        </div>
    </div>        
</section>
{{-- **************************************************************************************** --}}

<section class="testimonial-section p-tb-100 bg-black bg-overlay-1">
    <div class="container">
        <div class="section-title">
            <small>Avis des Clients</small>
            <h2 class="color-white">Les feedback de nos clients</h2>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="testimonial-carousel-item bg-main">
                    <p class="carousel-para">Group Consulting est la meilleure plateforme pour trouver des experts qualifiés.</p>
                    <div class="carousel-info-grid">
                        <div class="carousel-thumb">
                            <img src="{{ asset('photo/client-1.jpg') }}" alt="client">
                        </div>
                        <div class="carousel-info text-end">
                            <div class="review-star">
                                <ul class="justify-content-end">
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                </ul>
                            </div>
                            <h3 class="carousel-name">user</h3>
                            <h4 class="carousel-designation">client</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-carousel-item bg-main">
                    <p class="carousel-para">Le service et  la qualité est toujours au rendez-vous. J'adore travailler avec Group Consulting.</p>
                    <div class="carousel-info-grid">
                        <div class="carousel-thumb">
                            <img src="{{ asset('photo/client-2.jpg') }}" alt="client">
                        </div>
                        <div class="carousel-info text-end">
                            <div class="review-star">
                                <ul class="justify-content-end">
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                </ul>
                            </div>
                            <h3 class="carousel-name">John Karahan</h3>
                            <h4 class="carousel-designation">Client</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-carousel-item bg-main">
                    <p class="carousel-para">Chaque consultation est préparée avec soin et je suis toujours impressionné par le niveau d'expertise de Group Consulting.</p>
                    <div class="carousel-info-grid">
                        <div class="carousel-thumb">
                            <img src="{{ asset('photo/client-3.jpg') }}" alt="client">
                        </div>
                        <div class="carousel-info text-end">
                            <div class="review-star">
                                <ul class="justify-content-end">
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                    <li class="full-star"><i class="flaticon-star-1"></i></li>
                                </ul>
                            </div>
                            <h3 class="carousel-name">Anthony Artan</h3>
                            <h4 class="carousel-designation">client</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
