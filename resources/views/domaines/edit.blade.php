@extends('dashboard')
@section('content')
<div class="container">
    <h1>Modifier {{ $domaine->name }}</h1>
    <form action="{{ route('domaines.update', $domaine) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $domaine->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $domaine->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($domaine->image)
                <img src="{{ asset('storage/'.$domaine->image) }}" alt="Image" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
