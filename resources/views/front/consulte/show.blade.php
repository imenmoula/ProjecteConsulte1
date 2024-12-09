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

<h1>Rendivent: {{ $rendivent->title }}</h1>
<p>Sujet: {{ $rendivent->sujet }}</p>
<p>Date/Time: {{ $rendivent->timedate }}</p>
<p>Créé par: {{ $rendivent->user->name }}</p>
<a href="{{ route('rendivents.index') }}" class="btn btn-primary">Retour</a>
@endsection
