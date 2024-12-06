
@extends('front.home')
@section('container')
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