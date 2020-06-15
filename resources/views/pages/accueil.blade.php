@extends('layouts.app')


@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('content')
<br><br><br>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('images/img1.jpg')}}" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>La société METROCALCK</h5>
              <p>Bienvenue Dans notre Application web pour la gestion des stagiaires</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/img2.jpg')}}" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>La société METROCALCK</h5>
              <p>Notre société cous offre la possibilitée de postuler pour un stage chez nous</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/img3.jpg')}}" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>La société METROCALCK</h5>
              <p>Cette application permet notre stagiaires acceptés de la creation de leurs comptes</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
<!---------------------------------------------------------------------------------------------------------------------------->
<br><br>
<div class="container">
    <center><h1>La liste des stagiaires actuels</h1></center>
    <center><p>Cette partie contient les stagiaires acceptés dans l'entreprise</p></center>

    <div class="row">
            @foreach($prfl as $prfl)
            <!-- Card Wider -->
            <div class="col-md-4 my-2" style="display:block;">
            <div class="card card-cascade wider" style="margin-bottom:30px;height:450px;">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                    <img class="card-img-top" src="{{asset('profiles/images/'.$prfl->user->image)}}" style="height:200px;" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>{{$prfl->user->name}}</strong></h4>
                    <!-- Subtitle -->
                    <h5 class="blue-text pb-2"><strong>Departement {{$prfl->departement}}</strong></h5>
                    <!-- Text -->
                    <p class="card-text">Etudiant dans {{$prfl->niveau}} à l'{{$prfl->ecole}} ,filière {{$prfl->filiere}}  </p>

                    <!-- Linkedin -->
                    <a href="#" class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Twitter -->
                    <a href="#" class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                    <!-- Dribbble -->
                    <a href="#" class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>

                    </div>

                </div>
                <!-- Card Wider -->
            </div>
                @endforeach

    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------->
  <!-- Site footer -->
  <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>À propos de nous</h6>
              <p class="text-justify">-	La société : « METROCALK » S.A.R.L  (Société A Responsabilité Limité) est créé en 2014 avec un capital de 100000Dhs, dans le siège est à Marrakech. -	Les activités de l’entreprise : la société se compose de 6 salariés et opère principalement dans le domaine de communication et précisément le marketing digital et le développement des jeux vidéo.</p>
            </div>

            <div class="col-xs-6 col-md-3">
              <h6 style="color:black">Categories</h6>

            </div>

            <div class="col-xs-6 col-md-3">
              <h6>RUBRIQUES</h6>
              <ul class="footer-links">
                <li><a href="/">Accueil</a></li>
                <li><a href="apropos">Actualités</a></li>
                <li><a href="demandes">Stages</a></li>
                <li><a href="contact">Contacts</a></li>
              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12" style="margin-left:270px">
              <ul class="social-icons">
                <li><a href="#" class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
  </footer>
</div>
@endsection
