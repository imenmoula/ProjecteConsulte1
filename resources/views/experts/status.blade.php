@extends('dashboard')

@section('content')
<div class="container">
    <h1>Suivi des Statuts des Experts</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Poste</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Disponibilités</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experts as $expert)
                <tr>
                    <td>{{ $expert->name }}</td>
                    <td>{{ $expert->job }}</td>
                    <td>{{ $expert->phone }}</td>
                    <td>{{ $expert->email }}</td>
                    <td>{{ $expert->address }}</td>
                    <td>
                        @foreach($expert->availabilities as $availability)
                            <div>
                                <span class="badge" style="background-color: {{ $availability->status_color }}; color: white;">
                                    {{ ucfirst($availability->status) }}
                                </span>
                                ({{ $availability->start_time }} - {{ $availability->end_time }})
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
