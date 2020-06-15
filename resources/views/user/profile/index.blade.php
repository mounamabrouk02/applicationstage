@extends('layouts.user')


@section('content_header')
<h5 style="color:black">Bienvenue dans votre profile</h5>
@endsection

@section('content_body')
{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" style="color:black;"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Compléter votre profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <!-- Formulaire -->
    <form action="{{ action('ProfileController@store') }}" method="post" enctype="multipart/form-data" style="color:black">
        <!--securité token for the laravel-->
        {{ csrf_field()}}
        <div class="modal-body">
                <div class="form-group">
                        <label for="inputCity">Genre</label>
                        <select id="inputState" class="form-control" name="genre">
                                <option selected>Homme</option>
                                <option>Femme</option>
                        </select>
                </div>
                <div class="form-group">
                  <label style="color:black">Date de naissance</label>
                  <input type="text" name="dateN" class="form-control"  placeholder="Entrez votre date de naissance AAAA-MM-JJ">
                </div>
                <div class="form-group">
                  <label style="color:black">Ville de naissance</label>
                  <input type="text" name="villeN" class="form-control"  placeholder="Entrez votre ville de naissance">
                </div>
                <div class="form-group">
                    <label style="color:black">Addresse</label>
                    <input type="text" name="addresse" class="form-control"  placeholder="Entrez votre ville de naissance">
                </div>
                <div class="form-group">
                        <label style="color:black">Établissement</label>
                        <input type="text" name="ecole" class="form-control" >
               </div>
               <div class="form-group">
                    <label style="color:black" placeholder="Entrez votre niveau d'études">Niveau scolaire </label>
                    <input type="text" name="niveau" class="form-control">
               </div>
               <div class="form-group">
                    <label style="color:black" placeholder="Entrez votre filière">Filière </label>
                    <input type="text" name="filiere" class="form-control">
               </div>
               <div class="form-group">
                    <label for="inputCity" style="color:black">Departement de stage</label>
                        <select id="inputState" class="form-control" name="departement" >
                            <option selected>Informatique</option>
                            <option>Commercial</option>
                            <option>Marketing</option>
                            <option>Financière</option>

                        </select>
                </div>
                <div class="form-group">
                    <label style="color:black">Telephone</label>
                    <input type="text" name="telephone" class="form-control"  placeholder="Entrez votre ville de naissance">
                </div>
                <div class="form-group">
                        <label>Votre CV</label>
                        <input type="file" class="form-control" name="cv" >
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    <!-- End Formulaire -->
      </div>
    </div>
  </div>
{{-- End Add Modal --}}
        <div class="container" style="color:black">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <img src="/profiles/images/{{$user->image}}" style="width:150px; height:150px; float:left; border: solid 1px gray ;border-radius:50%; margin-right:25px;">
                       <h3>{{$user->name}}</h3>
                       <form  style="color:black" enctype="multipart/form-data" action="{{ action('UserController@store') }}" method="POST">
                            {{ csrf_field()}}
                            <label style="color:black">Télécharger la photo du profile</label><br>
                            <input type="file" name="image" style="color: black;"><br>
                            <input type="submit" class="btn btn-sm btn-primary" value="Telecharger" style="margin-left:0px">
                       </form>
                  </div>
              </div>
              @if(\Session::has('success'))
              <div class="alert alert-success">
                  <p> {{\Session::get('success')}} </p>
              </div>
              @endif
        </div>
        <hr>
        @if($prfl===null)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Compléter votre profile
        </button>
        <br><br>
        @else
        <div class="container" style="color:black">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="card-body">
                            <p class="card-text">Genre : {{$prfl->genre}}</p>
                            <p class="card-text">Date de naissance : {{$prfl->dateN}}</p>
                            <p class="card-text">Ville de naissance : {{$prfl->villeN}}</p>
                            <p class="card-text">Établissement : {{$prfl->ecole}}</p>
                            <p class="card-text">Filière : {{$prfl->filiere}}</p>
                            <p class="card-text">Niveau Scolaire : {{$prfl->niveau}}</p>
                            <p class="card-text">Departement de stage: {{$prfl->departement}}</p>
                            <p class="card-text">Addresse : {{$prfl->addresse}}</p>
                            <p class="card-text">Telephone : {{$prfl->telephone}}</p>
                            <a href="{{url('profile/'.$prfl->id.'/edit')}}" class="btn btn-success">Modifier</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                            Supprimer
                            </button>
                              <!-- Modal de supperssion-->
                        <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="supprimerModalLabel">Supprimer mon profile </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:black">  Êtes-vous sûr vous voulez supprimer votre profile !!?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="{{url('profile/'.$prfl->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Confirmer</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- fin Modal de supperssion-->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
@endsection


