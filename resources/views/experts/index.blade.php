@extends('dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des Experts</h4>
                </div>

                <div class="text-right">
                    <a href="{{ route('experts.create') }}" class="btn btn-primary mt-2">
                        Ajouter un Expert
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><strong>ID#</strong></th>
                                    <th><strong>Nom</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Adresse</strong></th>
                                    <th><strong>Téléphone</strong></th>
                                    <th><strong>Spécialité</strong></th>
                                    <th><strong>Disponibilité</strong></th>
                                    <th><strong>Expérience</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Domaine</strong></th>
                                    <th><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experts as $expert)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>{{ $expert->name }}</td>
                                        <td>{{ $expert->email }}</td>
                                        <td>{{ $expert->address }}</td>
                                        <td>{{ $expert->phone }}</td>
                                        <td>{{ $expert->specialty }}</td>
                                        <td>{{ $expert->availability ? 'Disponible' : 'Non disponible' }}</td>
                                        <td>{{ $expert->nb_experience }}</td>
                                        <td>
                                            <div class="text-center mt-3">
                                                <img src="{{ $expert->image ? asset('storage/' . $expert->image) : asset('images/default-placeholder.png') }}" 
                                                     class="rounded img-fluid" alt="{{ $expert->name }}" width="50" height="50">
                                            </div>                                        
                                        </td>
                                        <td>{{ optional($expert->domaine)->name ?: 'N/A' }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('experts.edit', $expert) }}" class="btn btn-primary shadow btn-xs sharp mr-1" title="Modifier">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('experts.destroy', $expert) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp" title="Supprimer">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('experts.show', $expert) }}" class="btn btn-info shadow btn-xs sharp ml-1" title="Voir">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                    </div> <!-- End of table-responsive -->
                </div> <!-- End of card-body -->
            </div> <!-- End of card -->
        </div> <!-- End of col -->
    </div> <!-- End of row -->
</div> <!-- End of container-fluid -->

@endsection