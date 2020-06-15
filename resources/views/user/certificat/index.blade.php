@extends('layouts.user')

@section('style')
    <style>
        .wrapper .main_content .info div {
    margin-bottom: 0px;
}
    </style>
@endsection


@section('content_header')
<h5 style="color:black">Demander votre certificat de stage</h5>
@endsection

@section('content_body')

{{-- Start Add Modal --}}
<div style="color:black" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Demander</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <!-- Formulaire -->
        <form action="{{ action('CertificatController@store') }}" method="post">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            <div class="modal-body">
                    <div class="form-group">
                      <label style="color:black">Nom complet</label>
                      <input type="text" name="titre" class="form-control"  placeholder="Entrez le titre">
                    </div>
                    <div class="form-group">
                      <label style="color:black">Certifiat de </label>
                      <input type="text" name="contenu" class="form-control"  placeholder="Entrez le contenu">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
        <!-- End Formulaire -->
          </div>
        </div>
      </div>
{{-- End Add Modal --}}

<!-- montrer les erreurs ou la validation d'insersion apres le clique sur "serve data" using session of laravel-->
    <div class="container">

       <!-- <h3>La liste des publications </h3>-->
        @if(count($errors) > 0)
             <div class ="alert alert-danger">
                 <ul>
                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
                 </ul>
             </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p> {{\Session::get('success')}} </p>
        </div>
        @endif
        @if(\Session::has('danger'))
        <div class="alert alert-danger">
            <p> {{\Session::get('danger')}} </p>
        </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
           Demander Certificat
        </button>
    <br><br>


        <div class="card mb-3" style="max-width: 1200px; max-height: 100%;color:black;zoom:95%;" >
        <div class="row no-gutters">

         </div>

    </div>
    </div>
    </div>


@endsection


