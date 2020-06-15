@extends('layouts.app')

@section('stylesheets')
<link rel="stylesheet" href="css/contact.css">
<style>
body {
  background-color: #4cc9f0;
   }


h3 {
    font-size: 35px;
    font-family: "ElMessiri-SemiBold";
    text-align: center;
    margin-bottom: 27px;
    color: #4cc9f0;
}

</style>
@endsection


@section('content')

<br><br><br>

<div class="py-4 container" >
       <!-- <h2 class="h1-responsive font-weight-bold text-center my-5">Demandez votre stage</h2> -->

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
    @endif
        <!-- Section: Contact v.3 -->
<section class="contact-section my-5">

    <!-- Form with header -->
    <div class="card" style="height:470px;border-radius:1%">
            <form action="{{ action('DemandeController@store') }}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-8" >

          <div class="card-body form" style="margin-left:40px">

            <!-- Header -->
            <h3 class="mt-4"><i class="fas fa-envelope pr-2"></i> Demandez votre Stage :</h3>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="form-contact-name" class="form-control" name="nomComplet" value="{{ old('nomComplet')}}">
                  <label for="form-contact-name" class="" >Votre Nom Complet</label>
                </div>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="form-contact-email" class="form-control" name="email" value="{{ old('email')}}">
                  <label for="form-contact-email" class="">Votre Email</label>
                </div>
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" name="telephone" id="form-contact-phone" class="form-control" value="{{ old('telephone')}}">
                  <label for="form-contact-phone" class="">Votre Telephone</label>
                </div>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                        <label for="form-contact-company" class="">Votre CV</label><br><br>
                        <input type="file" class="form-control" name="cv" >
                </div>
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <textarea id="form-contact-message" name="motivation" class="form-control md-textarea" rows="1"> {{ old('motivation')}}</textarea>
                  <label for="form-contact-message" style="font-size:20px;">Lettre de motivation</label>


                </div>
              </div>

              <!-- Grid column -->

            </div>
            <div class="form-group">
                    <button type="submit" style="background-color:#4cc9f0;color:white" class="btn"><i class="far fa-paper-plane"></i></button>

                </div>
            <!-- Grid row -->

          </div>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4" style="">

                <div class="image-holder" >
                        <img src="{{asset('images/demande.jpg')}}" alt="" style="height:470px;width:350px;margin-top:0">
                    </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

            </form>

    </div>
    <!-- Form with header -->

  </section>
  <!-- Section: Contact v.3 -->
        </div>
    </div>

@endsection


