@extends('dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <h3 class="text-center">Modifier l'Expert</h3>
                <form action="{{ route('experts.update', $expert) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="email">Email*:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $expert->email) }}" required />
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse*:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $expert->address) }}" />
                        @if($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone*:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $expert->phone) }}" />
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nb_experience">Nombre d'années d'expérience*:</label>
                        <input type="number" name="nb_experience" id="nb_experience" class="form-control" value="{{ old('nb_experience', $expert->nb_experience) }}" />
                        @if($errors->has('nb_experience'))
                            <span class="text-danger">{{ $errors->first('nb_experience') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="availability">Disponibilité:</label>
                        <select name="availability" id="availability" class="form-control">
                            <option value="1" {{ old('availability', $expert->availability) == 1 ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ old('availability', $expert->availability) == 0 ? 'selected' : '' }}>Non disponible</option>
                        </select>
                        @if($errors->has('availability'))
                            <span class="text-danger">{{ $errors->first('availability') }}</span>
                        @endif
                    </div>

                    <!-- Champ pour télécharger une nouvelle image (facultatif) -->
                    <div class="form-group">
                        <label for="image">Image (laisser vide si pas de changement):</label>
                        @if($expert->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" width="100">
                            </div>
                            <small>Laissez vide si vous ne souhaitez pas changer l'image.</small>
                        @endif
                        <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png,.gif,.svg"/>
                        @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <!-- Boutons -->
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('experts.index') }}" class="btn btn-secondary">Retour</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection