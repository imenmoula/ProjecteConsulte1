@extends('dashboard')
@section('content')

<div class="container">
   

    <table class="table table-responsive-md">
        <thead>
            <tr>
              
                <th><strong>ID#</strong></th>
                <th><strong>Nom & Prenom</strong></th>
                <th><strong>Email</strong></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $d)
                <tr>
                    <td><strong>{{$d->index+1}}</strong></td>
                    <td><strong>{{$d->name}}</strong></td>
                    <td><strong>{{$d->email}}</strong></td>
                    <td><strong>{{$d->phone}}</strong></td>
                    <td><strong>{{$d->adresse}}</strong></td>
                    <td><strong>{{ $d->role == 'user' ? 'User' : 'Other' }}</strong></td>


                    
                
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection