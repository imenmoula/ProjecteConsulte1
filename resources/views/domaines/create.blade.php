@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Ajouter un Domaine</title>
</head>
<body>
  
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

  <div class="container mt-5">
    <h4>Ajouter un Nouveau Domaine</h4>
    <form method="POST" action="{{ route('domaines.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Nom du Domaine*:</label>
        <input type="text" class="form-control" name="name" placeholder="Saisir le nom du domaine" value="{{ old('name') }}" required />
        @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label>Description*:</label>
        <textarea class="form-control" rows="3" name="description" placeholder="Saisir la description">{{ old('description') }}</textarea>
        @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label>Image*:</label>
        <input type="file" name="image" class="form-control" />
        @if($errors->has('image'))
        <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
      </div>

      <button type="submit" class="btn btn-primary">Créer</button>
      <a href="{{ route('domaines.index') }}" class="btn btn-secondary">Retour</a>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection