@extends('front.home')
@section('container')
<@extends('layouts.app')

@section('content')
<h1>Liste Historique des ConsultaTions</h1>

<a href="{{ route('consulte.create') }}" class="btn btn-primary">Créer un Rendez-vous</a>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Date et Heure</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rendivents as $rendivent)
        <tr>
            <td>{{ $rendivent->title }}</td>
            <td>{{ $rendivent->timedate }}</td>
            <td>
                <a href="{{ route('consulte.show', $rendivent->id) }}">Voir</a>
                <a href="{{ route('consulte.edit', $rendivent->id) }}">Modifier</a>
                <form action="{{ route('consulte.destroy', $rendivent->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


