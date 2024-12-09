@extends('front.home')
@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
            
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>demande de consultation</h1>
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
<div class="container">
    
    <h1>Passe une consultation avec {{ $expert->name }}</h1>
    
    <form action="{{ route('front.consulte.store') }}" method="POST">
        @csrf
        <input type="hidden" name="expert_id" value="{{ $expert->id }}">
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="sujet">Sujet :</label>
            <textarea name="sujet" id="sujet"></textarea>
        </div>
        <div>
            <label for="timedate">Date et heure :</label>
            <input type="datetime-local" name="timedate" id="timedate" required>
        </div>
        <button type="submit">Confirmer</button>
    </form>
    @endsection
    

