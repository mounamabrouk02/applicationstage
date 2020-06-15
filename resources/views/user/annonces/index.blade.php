@extends('layouts.user')

@section('style')

<style>
    .pink-text {
    color: #33b5e5 !important;
}
.wrapper .main_content .info {
    margin: 0px;
}
.wrapper .main_content .info div {
    margin-bottom: 0;
}
</style>
@endsection

@section('content_header')
<h5 style="color:black">Bienvenue dans la page des Annonces de l'administrateur</h5>

@endsection

@section('content_body')

<div class=" py-4 container">

    <div class="row">
        @foreach($annonces as $element)
        <div class="col-md-4 my-2" style="display:block;">
                <!-- Card Narrower -->
                <div class="card card-cascade narrower" style="height:550px">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                        <img class="card-img-top" src="{{asset('storage/'.$element->photo)}}"
                            alt="Card image cap" style="height:200px">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade" style="padding-bottom:0px;">

                        <!-- Label -->
                        <h4 class="pink-text pb-2 pt-1">Publier par l'Administrateur</h4>
                        <!-- Title -->
                        <h6 class="font-weight-bold card-title" style="color:black">{{$element->titre}}</h6>
                        <!-- Text -->
                        <p class="card-text">{{substr($element->contenu,0,190)}}</p>
                        <!-- Button -->
                        <a href="/annonces/{{$element->id}}" class="btn btn-primary" style="margin-left:80px;">Voir plus</a>

                        </button>

                        </div>

                        <!-- Card footer -->
                        <div class="card-footer text-muted text-center">
                               Publié le : {{$element->created_at}}
                        </div>

                    </div>
                    <!-- Card Narrower -->
        </div>
        @endforeach
    </div>
</div>
@endsection


