@extends('front/home')

@section('container')
    <div class="header-carousel-two owl-carousel owl-theme">
        <div class="item text-center">
            <img src="{{ asset('photo/img.webp') }}" alt="Image 1" width="200" height="200">
            <p>Expérience inoubliable avec nos experts</p>
        </div>
        <div class="item text-center">
            <img src="{{ asset('photo/img3.jpg') }}" alt="Image 2" width="200" height="200">
            <p>Des solutions innovantes pour tous vos besoins</p>
        </div>
        <div class="item text-center">
            <img src="{{ asset('photo/img5.png') }}" alt="Image " width="200" height="200">
            <p>satisfaction garantie pour tous nos clients</p>
        </div>

    </div>



    



   


    <section class="blog-section p-tb-100 bg-wood-shape">
        <div class="container position-relative">
            <div class="section-title section-title-default">
                <small>Nos Meilleurs Experts</small>
                <h2>Les meilleurs experts de Consulting Group
                </h2>
            </div>
            <div class="row">

                @foreach ($experts as $expert)
                <div class="col-sm-12 col-md-6 col-lg-4 pb-30 wow animate__slideInUp" data-wow-duration="1s"
                    data-wow-delay="0.1s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: slideInUp;">
                    <div class="blog-card blog-card-two">
                        <div class="blog-card-thumb">
                            <a href="{{ route('expert.detail', $expert->id) }}">
                                <img src="{{ Storage::url($expert->image) }}" alt="{{ $expert->name }}" >
                            </a>
                        </div>
                        <div class="blog-card-content">
                            <ul class="blog-entry">
                                <li><i class="flaticon-calendar-1"></i>{{ $expert->job }}</li>
                                <li><i class="flaticon-man-user"></i>{{ $expert->domaine->name }}</li>
                            </ul>
                            <h3><a href="{{ route('expert.detail', $expert->id) }}">{{ $expert->name }}</a></h3>
                          
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('front.showfront') }}" class="btn">Voir plus de experts <i
                        class="flaticon-right-arrow-2"></i></a>
            </div>
        </div>
    </section>
    
@endsection
