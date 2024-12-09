@extends('dashboard')

@section('content')
    <div class="container">
        <h1>Modifier l'Expert</h1>

        <form action="{{ route('experts.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label for="job">Job</label>
                <input type="text" class="form-control" id="job" name="job" value="{{ $user->job }}">
            </div>

            <div class="form-group">
                <label for="nb_experience">Nombre d'années d'expérience</label>
                <input type="number" class="form-control" id="nb_experience" name="nb_experience" value="{{ $user->nb_experience }}">
            </div>

            <div class="form-group">
                <label for="domaine_id">Domaine</label>
                <select class="form-control" id="domaine_id" name="domaine_id" required>
                    @foreach($domaines as $domaine)
                        <option value="{{ $domaine->id }}" {{ $domaine->id == $user->domaine_id ? 'selected' : '' }}>
                            {{ $domaine->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image (optionnelle)</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Image" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour l'expert</button>
        </form>
    </div>
@endsection
