@extends('front.home')

@section('container')

<!-- Header Section -->
<div class="header-bg header-bg-page">
    <div class="header-padding position-relative">
        <div class="header-page-shape"></div>
        <div class="container">
            <div class="header-page-content text-center">
                <h1 class="text-white">Historique des Consultations</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}" class="text-white">Accueil</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Liste historique des consultations</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Consultations</h2>

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="thead-light">
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
                @foreach ($rendivents as $rendivent)
                <tr>
                    <td>{{ $rendivent->id }}</td>
                    <td>{{ $rendivent->user->name }}</td>
                    <td>{{ $rendivent->title }}</td>
                    <td>{{ Str::limit($rendivent->sujet, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($rendivent->timedate)->format('d M Y, H:i') }}</td>
                    <td>
                        <!-- Action buttons with icons -->
                        <form action="{{ route('front.consulte.destroy', $rendivent) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
