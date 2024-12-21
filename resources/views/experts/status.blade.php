@extends('dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Suivi des Statuts des Experts</h1>

    @if($experts->isEmpty())
        <div class="alert alert-warning text-center">
            Aucun expert trouvé.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Profession</th>
                        <th>domaine</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Disponibilités</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experts as $expert)
                        <tr>
                            <td><strong>{{ $expert->name }}</strong></td>
                            <td>{{ $expert->job }}</td>
                            <td>{{ $expert->domaine->name ?? 'N/A' }}</td>

                            <td>{{ $expert->phone }}</td>
                            <td>{{ $expert->email }}</td>
                            <td>{{ $expert->address }}</td>
                            <td>
                                @if($expert->availabilities->isEmpty())
                                    <span class="badge bg-secondary">Pas de disponibilités</span>
                                @else
                                @foreach($expert->availabilities as $availability)
                                <div class="mb-2">
                                    <span class="badge" 
                                          style="background-color: 
                                                 {{ $availability->status == 'disponible' ? '#28a745' : 
                                                    ($availability->status == 'reserver' ? '#ffc107' : '#dc3545') }}; 
                                                 color: white;">
                                        {{ ucfirst($availability->status) }}
                                    </span>
                                    <br>
                                    <small>{{ date('d/m/Y H:i', strtotime($availability->start_time)) }} - {{ date('d/m/Y H:i', strtotime($availability->end_time)) }}</small>
                                </div>
                            @endforeach
                            
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
