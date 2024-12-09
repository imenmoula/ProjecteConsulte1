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
<div class="container mt-4">

    <a href="{{ route('front.consulte.create') }}" class="btn btn-primary">Créer un Rendez-vous</a>

    @if($rendivents->isEmpty())
        <div class="alert alert-warning" role="alert">
            Aucune consultation trouvée.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><strong>Sujet</strong></th>
                    <th scope="col"> <strong>Date et Heure</strong></th>

                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rendivents as $rendivent)
                <tr>
                    <td>{{ $rendivent->title }}</td>
                    <td>{{ $rendivent->timedate }}</td>
                    <td>
                        <a href="{{ route('front.consulte.show', $rendivent->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('front.consulte.edit', $rendivent->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('front.consulte.destroy', $rendivent->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette consultation ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection