
@extends('front.home')
@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
            
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>Mettre a jour la demande de consultation</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Mettre a jour la demande de consultation avec {{ $expert->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<h1>{{ isset($rendivent) ? 'Modifier' : 'Créer' }} un Rendez-vous</h1>

<form action="{{ isset($rendivent) ? route('consulte.update', $rendivent->id) : route('consulte.store') }}" method="POST">
    @csrf
    @if(isset($rendivent))
        @method('PUT')
    @endif
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value="{{ $rendivent->title ?? '' }}" required>
    </div>
    <div>
        <label for="sujet">Sujet :</label>
        <textarea name="sujet" id="sujet">{{ $rendivent->sujet ?? '' }}</textarea>
    </div>
    <div>
        <label for="timedate">Date et heure :</label>
        <input type="datetime-local" name="timedate" id="timedate" value="{{ $rendivent->timedate ?? '' }}" required>
    </div>
    <button type="submit">{{ isset($rendivent) ? 'Mettre à jour' : 'Créer' }}</button>
</form>
@endsection