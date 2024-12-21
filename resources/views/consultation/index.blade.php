@extends('dashboard')

@section('content')
    <h1 class="mb-4">Liste des Rendez-Vous</h1>

    <!-- Flash Messages -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Sujet</th>
                    <th>Utilisateur</th>
                    <th>Date et Heure</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rendivents as $rendivent)
                    <tr>
                        <td>{{ $rendivent->title }}</td>
                        <td>{{ Str::limit($rendivent->sujet, 50) }}</td> <!-- Limite de 50 caractères pour le sujet -->
                        <td>{{ $rendivent->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($rendivent->timedate)->format('d M Y, H:i') }}</td>
                        <td>
                            <!-- Action Buttons -->
                            @if ($rendivent->availability_status == 'disponible')
                                <form action="{{ route('acceptRendezVous', ['id' => $rendivent->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accepter</button>
                                </form>
                            @else
                                <button class="btn btn-danger btn-sm" disabled>Non accepté</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
