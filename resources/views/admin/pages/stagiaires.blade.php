@extends('layouts.admin')

@section('stylesheets')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
<br><br><br><br>
<div class="container">
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
    <h3>La liste des stagiaires de l'entreprise</h3>
    <br>
    <table  id="datatable" class="table table-bordered table-striped table-dark">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom complet</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Departement</th>
                <th>Mot de passe</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              @foreach($prfls as $prfl)
              @if($prfl->user_id === $user->id)
              <tr>
                <th>{{ $user->id}}</th>
                <td>
                        <img src="{{asset('profiles/images/'.$user->image)}}" alt="..." style="border-radius:50%;height: 60px;width:60px;">
                </td>
                <td>{{ $user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$prfl->telephone}}</td>
                <td>{{$prfl->departement}}</td>
                <td>
                        <a href="/admin/stagiaires/forgot/{{$user->id}}" class="btn btn-sm btn-warning">Réinitialiser</a>
                    </td>
                <td class="row">
                        @if($user->active === 0)
                        <form method="post" action="">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Activer</button>
                        </form>

                        @else
                        <form method="post" action="">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Désactiver</button>
                        </form>

                        @endif
                    <form action="{{url('admin/stagiaires/'.$user->id)}}" method="post" id="deleteForm">

                    <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent{{$user->id}}"><i class="fas fa-eye"></i></button>


                        <!--Modal: modalRelatedContent-->
                        <div class="modal fade" id="modalRelatedContent{{$user->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                            <p class="heading">Le profile de  {{$user->name}}</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">

                            <div class="row">
                                <div class="col-3">
                                        <img src="{{asset('profiles/images/'.$user->image)}}" class="img-fluid" alt="..." style="border-radius:50%;height: 100px;width:100px;">

                                </div>

                                <div class="col-8">
                                    <p class="card-text">Date de naissance : {{$prfl->dateN}}</p>
                                    <p class="card-text">Ville de naissance : {{$prfl->villeN}}</p>
                                    <p class="card-text">Établissement : {{$prfl->ecole}}</p>
                                    <p class="card-text">Filière : {{$prfl->filiere}}</p>
                                    <p class="card-text">Niveau Scolaire : {{$prfl->niveau}}</p>
                                    <p class="card-text">Departement de stage: {{$prfl->departement}}</p>
                                    <p class="card-text">Addresse : {{$prfl->addresse}}</p>
                                    <p class="card-text">Telephone : {{$prfl->telephone}}</p>
                                <button type="button" class="btn btn-info btn-md"  data-dismiss="modal">Fermer</button>

                                </div>
                            </div>
                            </div>
                        </div>
                        <!--/.Content-->
                        </div>
                    </div>
                    <!--Modal: modalRelatedContent-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                            <i class="fas fa-archive"></i>
                    </button>
                        {{-- Start Delete Modal --}}
                            <div class="modal fade" id="supprimerModal" style="color:black" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer ce Stagiaire</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    <!-- Formulaire -->
                                    <form action="{{url('admin/stagiaires/'.$user->id)}}" method="post" id="deleteForm">
                                        <!--securité token for the laravel-->
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <div class="modal-body">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <p>Etes vous sur ?!.. Vous voulez supprimer ce Stagiaire ?!</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                        </div>
                                    </form>
                                    <!-- End Formulaire -->
                                    </div>
                                    </div>
                            </div>
                        {{-- End Delete Modal --}}
                </td>
              </tr>
              @endif
              @endforeach
              @endforeach
            </tbody>
          </table>
    </div>

@endsection


@section('javascripts')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
         var table = $('#datatable').DataTable();
              });
</script>


@endsection
