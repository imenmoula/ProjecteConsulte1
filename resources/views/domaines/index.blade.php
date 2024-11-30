@extends('dashboard')
@section('content')

<h1>Liste des Domaines</h1>
<a href="{{ route('domaines.create') }}">Ajouter un Domaine</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($domaines as $domaine)
            <tr>
                <td>{{ $domaine->id }}</td>
                <td>{{ $domaine->name }}</td>
                <td>{{ $domaine->description }}</td>
                <td><img src="{{ asset('storage/' . $domaine->image) }}" alt="{{ $domaine->name }}" width="100"></td>
                <td>


                    <a href="{{ route('domaines.edit', $domaine) }}">Modifier</a>
                    <a href="{{ route('domaines.show', $domaine->id) }}">Voir le Domaine</a>

                    <form action="{{ route('domaines.destroy', $domaine) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des Domaines</h4>
                </div>

                <div class="text-right">
                    <a href="{{ route('domaines.create') }}" class="btn btn-primary mt-2">
                        Ajouter un Domaine
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>ID#</strong></th>
                                    <th><strong>Nom</strong></th>
                                    <th><strong>Description</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($domaines as $domaine)
                                    <tr>
                                        <td><strong>{{ $loop->index + 1 }}</strong></td>
                                        <td><strong>{{ $domaine->name }}</strong></td>
                                        <td>{{ $domaine->description }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $domaine->image) }}" class="rounded-lg mr-2" width="50" height="50" alt="{{ $domaine->name }}" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $domaine->image) }}" class="rounded-lg mr-2" width="50" height="50" alt="{{ $domaine->name }}" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('domaines.edit', $domaine) }}" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form action="{{ route('domaines.destroy', $domaine) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ route('domaines.show', $domaine->id) }}" class="btn btn-primary shadow btn-xs sharp mr-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success mt-2">
                        {{ session()->get('success') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection