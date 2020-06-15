@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="css/contact.css">
@endsection


@section('content')
<br><br>
<div class="container">
<!-- Section: Contact v.1 -->
<section class="my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Contacter nous</h2>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-5 mb-lg-0 mb-4">

            <!-- Form with header -->
            <div class="card">
                    <form action="{{ url('contact') }}" method="post">
                            {{csrf_field()}}
                    <div class="card-body">
                        <!-- Header -->
                        <div class="form-header blue accent-1">
                        <h3 class="mt-2"><i class="fas fa-envelope"></i> Écrivez-nous:</h3>
                        </div>

                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                        @endif

                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif                <!-- Body -->
                        <div class="md-form">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="nomComplet" id="form-name" class="form-control" value="{{ old('nomComplet')}}">
                        <label for="form-name">Votre nom complet</label>
                        </div>
                        <div class="md-form">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="text" id="form-email" name="email" class="form-control" value="{{ old('email')}}">
                        <label for="form-email">Votre email</label>
                        </div>
                        <div class="md-form">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input type="text" id="form-Subject" name="objet" class="form-control" value="{{ old('email')}}">
                        <label for="form-Subject">Objet</label>
                        </div>
                        <div class="md-form">
                        <i class="fas fa-pencil-alt prefix grey-text"></i>
                        <textarea id="form-text" class="form-control md-textarea" rows="3" name="message" >{{ old('message')}}</textarea>
                        <label for="form-text">Votre message</label>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-light-blue">Envoyer</button>
                        </div>
                    </div>
                    </div>
                    <!-- Form with header -->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-7">

                    <!--Google map-->
                    <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1svso_L9TPP8uZWO2chMxNyRJQxp_KEhU" width="640" height="480"></iframe>                    <!-- Buttons-->
                    </div>

                    <div class="row text-center">
                    <div class="col-md-5">
                        <a class="btn-floating blue accent-1">
                        <i class="fas fa-map-marker-alt"></i>
                        </a>
                        <p>N2, imm al gharb B2, massira 2</p>
                        <p class="mb-md-0">Marrakech</p>
                    </div>
                    <div class="col-md-3">
                        <a class="btn-floating blue accent-1">
                        <i class="fas fa-phone"></i>
                        </a>
                        <p>+212 563-016693</p>
                        <p class="mb-md-0">Lun - Ven, 8:00-22:00</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                        <i class="fas fa-envelope"></i>
                        </a>
                        <p>metrocalkcompany@gmail.com </p>
                        <p class="mb-0"></p>
                    </div>
                    </div>
        </form>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->
      </section>
    </div>
      <!-- Section: Contact v.1 -->
@endsection
