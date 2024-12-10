@extends('dashboard')

@section('content')

<div class="container">
    <h1>Modifier le mot de passe</h1>

    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="current_password">Mot de passe actuel</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
            @error('current_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour le mot de passe</button>
    </form>
</div>

@endsection
