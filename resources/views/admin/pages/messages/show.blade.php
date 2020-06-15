@extends('layouts.admin')

@section('content')
@section('content')
<div class="container">
            <div>
                <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="/services">Services</a></li>
                       <li class="breadcrumb-item active" aria-current="page">{{ $service->id }}</li>
                   </ol>
                 </nav>
             </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$msg->nomComplet}}</h4>
                        <hr>
                        <p class="card-text">Créé a : <b>{{$msg->created_at}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-header text-center">Les informations personnel</div>
                <div class="card-body bg-white">
                    <a href="/profile/edit" class="btn btn-primary">Modifier</a>
                    <br>
                    <br>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Date de naissance</th>
                            <td>{{$msg->email}}</td>
                        </tr>
                        <tr>
                            <th>Adresse</th>
                            <td>{{$msg->message}}</td>
                        </tr>
                        <tr>
                            <td class="bg-light"></td>
                            <td class="bg-light"></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="/services" class="btn btn-primary btn-lg">Go Back</a>

@endsection
