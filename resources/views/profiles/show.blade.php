@extends('dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h1 class="card-title">Mon Profil</h1>
        </div>
        <div class="card-body text-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <img 
                src="{{ Storage::url($user->image) }}" 
                alt="Profile Image" 
                class="rounded-circle mb-4" 
                style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #007bff;"
            >
            <h2>Bienvenue, {{ $user->name }}</h2>
            <p class="text-muted mb-1"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-muted mb-1"><strong>Profession:</strong> {{ $user->job }}</p>
            <p class="text-muted"><strong>Expérience:</strong> {{ $user->nb_experience }} ans</p>
            <p class="text-muted mb-1"><strong>Domaine:</strong> {{ $user->domaine->name }}</p>
            <p class="text-muted mb-1"><strong>phone:</strong> {{ $user->phone}}</p>
            <p class="text-muted"><strong>Adresse:</strong> {{ $user->address }}</p>


        </div>
        <div class="card-footer text-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Modifier le Profil</a>
        </div>
    </div>
</div>
@endsection
