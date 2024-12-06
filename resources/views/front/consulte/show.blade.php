@extends('front.home')
@section('container')
<h1>Rendivent: {{ $rendivent->title }}</h1>
<p>Sujet: {{ $rendivent->sujet }}</p>
<p>Date/Time: {{ $rendivent->timedate }}</p>
<p>Créé par: {{ $rendivent->user->name }}</p>
<a href="{{ route('rendivents.index') }}" class="btn btn-primary">Retour</a>
@endsection
