
@extends('dashboard')

@section('content')
<div class="container">
    <h1>Modifier mon Profil</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<h1>Welcome, {{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>
<p>Job: {{ $user->job }}</p>
<p>Availability: {{ $user->availability ? 'Available' : 'Not Available' }}</p>
<p>Experience: {{ $user->nb_experience }} years</p>
<img src="{{ Storage::url($user->image) }}" alt="Profile Image">
<a href="{{ route('profile.edit') }}">Edit Profile</a>

</div>
@endsection