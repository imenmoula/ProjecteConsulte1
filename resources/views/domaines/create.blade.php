@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h4>Ajouter un Nouvel Expert</h4>

    <!-- Message de succès -->
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <!-- Messages d'erreur -->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Une erreur s'est produite :</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire -->
    <form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom*:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Saisir le nom de l'expert" value="{{ old('name') }}" required />
            @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email*:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Saisir l'email de l'expert" value="{{ old('email') }}" required />
            @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Mot de passe*:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Saisir un mot de passe" required />
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="address">Adresse:</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Saisir l'adresse de l'expert" value="{{ old('address') }}" />
            @if($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone">Téléphone:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Saisir le numéro de téléphone" value="{{ old('phone') }}" />
            @if($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="specialty">Spécialité:</label>
            <input type="text" name="specialty" id="specialty" class="form-control" placeholder="Saisir la spécialité de l'expert" value="{{ old('specialty') }}" />
            @if($errors->has('specialty'))
                <span class="text-danger">{{ $errors->first('specialty') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="availability">Disponibilité:</label>
            <select name="availability" id="availability" class="form-control">
                <option value="1" {{ old('availability') == 1 ? 'selected' : '' }}>Disponible</option>
                <option value="0" {{ old('availability') == 0 ? 'selected' : '' }}>Non disponible</option>
            </select>
            @if($errors->has('availability'))
                <span class="text-danger">{{ $errors->first('availability') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="nb_experience">Nombre d'années d'expérience:</label>
            <input type="number" name="nb_experience" id="nb_experience" class="form-control" placeholder="Saisir le nombre d'années d'expérience" value="{{ old('nb_experience') }}" />
            @if($errors->has('nb_experience'))
                <span class="text-danger">{{ $errors->first('nb_experience') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for ="domaine_id">Domaine:</label>
            <select name ="domaine_id" id ="domaine_id" class ="form-control">
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}" {{ old('domaine_id') == $domaine->id ? 'selected' : '' }}>{{ $domaine->name }}</option>
                @endforeach
            </select>
            @if($errors->has('domaine_id'))
                <span class ="text-danger">{{ $errors->first('domaine_id') }}</span>
            @endif
        </div>

        <!-- Champ pour télécharger l'image -->
        <div class ="form-group">
            <label for ="image">Image:</label>
            <input type ="file" name ="image" id ="image" class ="form-control" accept=".jpg,.jpeg,.png,.gif,.svg"/>
            @if($errors->has('image'))
                <span class ="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>

        <!-- Boutons -->
        <button type ="submit" class ="btn btn-primary">Créer</button>
        <a href="{{ route('experts.index') }}" class ="btn btn-secondary">Retour</a>
    </form>
</div>

@endsection