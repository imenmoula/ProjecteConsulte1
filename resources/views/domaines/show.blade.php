@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afficher le Domaine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4">
                <div class="card p-4">
                    <h3 class="text-center">Détails du Domaine</h3>
                    <p><strong>Nom :</strong> {{ optional($domaine)->name }}</p>
                    <p><strong>Description :</strong> {{ optional($domaine)->description }}</p>
                    @if($domaine && $domaine->image)
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $domaine->image) }}" class="rounded img-fluid" alt="Image du Domaine" />
                        </div>
                    @else
                        <p class="text-danger">Image non disponible</p>
                    @endif
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('domaines.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
