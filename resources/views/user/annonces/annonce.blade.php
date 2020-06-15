@extends('layouts.user')

@section('content_body')
    <div class="py-4 container" style="width:780px;gheight:800px">
        <div>
           <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/services">Annonces</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $annonce->id }}</li>
              </ol>
            </nav>
        </div>
        <div class="card mb-3">
                <img src="{{ asset('images/jss.png') }}" class="card-img-top" alt="..." style="height:300px;width:750px">
                <div class="card-body">
                  <h5 class="card-title" style="color:black">{{$annonce->titre}}</h5>
                  <p class="card-text">{{$annonce->contenu}}</p>
                  <p class="card-text"><small class="text-muted">Ecrit le {{$annonce->created_at}}</small></p>
                </div>
        </div>
        <a href="/services" class="btn btn-primary btn-lg">Retour</a>
    </div>


@endsection
