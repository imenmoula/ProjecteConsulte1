@extends('front.home')

@section('container')

<!-- Header Section -->
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content text-center text-white">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" class="text-white">Liste  des Consultations </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des consultation</h2>
        <a href="{{ route('front.consulte.create') }}" class="btn btn-primary">Ajouter un Rendez-vous</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Nom de l'expert</th>
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
                    <td>{{ $rendivent->user->name }}</td>
                    <td>
                        @if($rendivent->user->role === 'expert')
                            {{ $rendivent->user->name }}
                        @else
                            Non assigné
                        @endif
                    </td>
                    <td>{{ $rendivent->title }}</td>
                    <td>{{ Str::limit($rendivent->sujet, 50) }}</td> <!-- Limite de caractères pour le sujet -->
                    <td>{{ \Carbon\Carbon::parse($rendivent->timedate)->format('d M Y, H:i') }}</td> <!-- Formatage de la date -->
                    <td>
                        <a href="{{ route('front.consulte.show', $rendivent) }}" class="btn btn-primary btn-sm mr-2">Voir</a>
                        <a href="{{ route('front.consulte.update', $rendivent) }}" class="btn btn-success btn-sm mr-2">Modifier</a>
                        <form action="{{ route('front.consulte.destroy', $rendivent) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
