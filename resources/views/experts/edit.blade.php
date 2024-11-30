@extends('dashboard')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-block">
        <strong>Une erreur s'est produite :</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h1 class="text-muted">Modifier l'Expert #{{ $expert->id }}</h1>
                <form action="{{ route('experts.update', $expert) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom*:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $expert->name) }}" required />
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email*:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $expert->email) }}" required />
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe (laisser vide pour ne pas changer):</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Saisir un nouveau mot de passe" />
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $expert->address) }}" />
                        @if($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $expert->phone) }}" />
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="specialty">Spécialité:</label>
                        <input type="text" name="specialty" id="specialty" class="form-control" value="{{ old('specialty', $expert->specialty) }}" />
                        @if($errors->has('specialty'))
                            <span class="text-danger">{{ $errors->first('specialty') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for ="availability">Disponibilité:</label>
                        <select name ="availability" id ="availability" class ="form-control">
                            <option value="1" {{ old('availability', $expert->availability) == 1 ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ old('availability', $expert->availability) == 0 ? 'selected' : '' }}>Non disponible</option>
                        </select>
                        @if($errors->has('availability'))
                            <span class ="text-danger">{{ $errors->first('availability') }}</span>
                        @endif
                    </div>

                    <!-- Domaine -->
                    <div class ="form-group">
                        <label for ="domaine_id">Domaine:</label>
                        <select name ="domaine_id" id ="domaine_id" class ="form-control">
                            @foreach($domaines as $domaine)
                                <option value="{{ $domaine->id }}" {{ old("domaine_id", $expert->domaine_id) == $domaine->id ? "selected": "" }}>{{ $domaine->name }}</option> <!-- Liste des domaines -->
                            @endforeach
                        </select>
                        @if($errors->has('domaine_id'))
                            <span class ="text-danger">{{ $errors->first('domaine_id') }}</span>
                        @endif
                    </div>

                    <!-- Champ pour télécharger une nouvelle image -->
                    <div class ="form-group">
                        <label for ="image">Image (laisser vide si pas de changement):</label>
                        @if($expert->image)
                            <div class ="mb-3">
                                <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" width ="100">
                            </div>
                            <small>Laissez vide si vous ne souhaitez pas changer l'image.</small>
                        @endif
                        <input type ="file" name ="image" id ="image" class ="form-control"/>
                        @if($errors->has('image'))
                            <span class ="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <!-- Boutons -->
                    <button type ="submit" class ="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route("experts.index") }}" class ="btn btn-secondary">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection