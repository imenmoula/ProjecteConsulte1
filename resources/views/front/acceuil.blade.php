@extends('front/home')

@section('container')

<div class="header-carousel-two owl-carousel owl-theme">
    <div class="item">
        <img src="{{ asset('photo/img.webp') }}" alt="Image 1">
        <p>Expérience inoubliable avec nos experts</p>
    </div>
    <div class="item">
        <img src="{{ asset('photo/img4.webp') }}" alt="Image 2">
        <p>Des solutions innovantes pour tous vos besoins</p>
    </div>
    <div class="item">
        <img src="{{ asset('photo/img3.jpg') }}" alt="Image 3">
        <p>Satisfaction garantie pour tous nos clients</p>
    </div>
    <div class="item">
        <img src="{{ asset('photo/img2.png') }}" alt="Image 4">
        <p>Votre satisfaction est notre priorité</p>
    </div>
</div>





    {{-- **************************************************************************************** --}}
    <section class="receipe-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="section-title section-title-left d-flex justify-content-between text-center text-md-start flex-column flex-md-row flex-md-nowrap">
                        <h2>Les meilleurs experts de Consulting Group</h2>
                        <a href="" class="btn full-height ms-auto m-md-0">Voir Plus d'Experts</a>
                    </div>
                    <div class="receipe-grid">
                        @foreach ($experts as $expert)
                            <div class="receipe-item pb-30">
                                <div class="receipe-item-inner">
                                    <div class="receipe-image">
                                        <img src="{{ Storage::url($expert->image) }}" alt="expert">
                                    </div>
                                    <div class="receipe-content">
                                        <div class="receipe-info">
                                            <h3><a href="{{ route('expert.detail', $expert->id) }}">{{ $expert->name }}</a></h3>
                                            <h4>Spécialité : {{ $expert->job }}</h4>
                                            <h4>Domaine : {{ $expert->domaine->name }}</h4>
                                        </div>
                                        <div class="receipe-cart">
                                            <a href="{{ route('expert.detail', $expert->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    {{-- ************************************************************************************** --}}
@endsection
