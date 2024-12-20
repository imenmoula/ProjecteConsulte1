@extends('front.home')

@section('container')
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape">
            
        </div>
        <div class="container">
            <div class="header-page-content">
                <h1>Liste Historique des Consultations</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liste Historique des Consultations</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Liste des Rendez-vous</h1>
    <a href="{{ route('front.consulte.create') }}" class="btn btn-primary mb-3">Ajouter un rendez-vous</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Titre</th>
                <th>Sujet</th>
                <th>Date et Heure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rendivents as $rendivent)
            <tr>
                <td>{{ $rendivent->id }}</td>
                <td>{{ $rendivent->user_id }}</td>
                <td>{{ $rendivent->title }}</td>
                <td>{{ $rendivent->sujet }}</td>
                <td>{{ $rendivent->timedate }}</td>
                <td>
                    <a href="{{ route('front.consulte.show', $rendivent) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('front.consulte.edit', $rendivent) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('front.consulte.destroy', $rendivent) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


@endsection