@extends('dashboard')
@section('content')


<div class="content-body">

    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600 mb-0">Dashboard</h2>
                <p class="mb-0">Welcome {{$data->name}} -  {{$data->email}}</p>

                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                          
                            <th><strong>ID#</strong></th>
                            <th><strong>Nom & Prenom</strong></th>
                            <th><strong>Email</strong></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td><strong>{{$d->index+1}}</strong></td>
                                <td><strong>{{$d->name}}</strong></td>
                                <td><strong>{{$d->email}}</strong></td>
                                <td><strong>{{$d->phone}}</strong></td>
                                <td><strong>{{$d->adresse}}</strong></td>
                                <td><strong>{{$d->password}}</strong></td>
                                <td><strong>{{ $d->role == 'user' ? 'User' : 'Other' }}</strong></td>


                                
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</div>

@include('partials.footer') 	

</div>