@extends('front.home')
@section('container')

<div class="container">
    
    <h1>Passe une consultation avec {{ $expert->name }}</h1>
    
    <form action="{{ route('consulte.store') }}" method="POST">
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
    

