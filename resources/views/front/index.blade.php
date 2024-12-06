<!-- resources/views/front/index.blade.php -->
@extends('front.home')

@section('container')
    <div class="header-bg header-bg-page">
    </div>

    <section class="menu-section bg-black p-tb-100">
        <div class="container position-relative">
            <div class="section-title">
                <small>Expert</small>
                <h2 class="color-white">Il faut choisir parmi les meilleurs experts</h2>
            </div>

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

            <div class="menu-main-details-for">
                @foreach($domaines as $domaine)
                    <div class="menu-main-details-item">
                        <div class="receipe-grid receipe-grid-three">
                            @foreach($domaine->experts as $expert)
                                <div class="receipe-item">
                                    <div class="receipe-item-inner">
                                        <div class="receipe-image">
                                            <img src="{{ asset('storage/' . $expert->image) }}" alt="expert">
                                        </div>
                                        <div class="receipe-content">
                                            <div class="receipe-info">
                                                <h3><a href="">{{ $expert->name }}</a></h3>
                                                <h4>{{ $expert->specialty }}</h4>
                                            </div>
                                            <div class="receipe-cart">
                                                <a href="{{ route('expert.detail', $expert->id) }}">
                                                    <i class="flaticon-expert"></i> Voir le profil
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
