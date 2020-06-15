@extends('layouts.user')

@section('style')
    <style>
        .wrapper .main_content .info div {
    margin-bottom: 0px;
}
    </style>
@endsection


@section('content_header')
<h5 style="color:black">Bienvenue dans la page des publications</h5>
@endsection

@section('content_body')

{{-- Start Add Modal --}}
<div style="color:black" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une Publication</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <!-- Formulaire -->
        <form action="{{ action('PublicationController@store') }}" method="post" enctype="multipart/form-data">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            <div class="modal-body">
                    <div class="form-group">
                      <label style="color:black">Titre</label>
                      <input type="text" name="titre" class="form-control"  placeholder="Entrez le titre">
                    </div>
                    <div class="form-group">
                      <label style="color:black">Contenu</label>
                      <input type="text" name="contenu" class="form-control"  placeholder="Entrez le contenu">
                    </div>
                    <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="photo" >
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
        Ajouter une publication
    </button>
    <br><br>

    @foreach($pubs as $pub)
    <div class="card mb-3" style="max-width: 1200px; max-height: 100%;color:black;zoom:95%;" >
         <div class="row no-gutters">
                <div class="col-md-4">
                <img src="{{asset('storage/'.$pub->photo)}}" class="card-img" alt="..." style="height: 300px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h4 class="card-title">Publier par : {{$pub->user->name}}</h4>
                    <h6 class="card-title">Titre : {{$pub->titre}}</h6>
                    <p class="card-text" style="color:black">{{$pub->contenu}}</p>
                    <p class="card-text"><small class="text-muted">Dernier modification le : {{$pub->updated_at}}</small></p>
                    @can('update',$pub)
                    <a href="{{url('publications/'.$pub->id.'/edit')}}" class="btn btn-success">Modifier</a>
                    @endcan

                    @can('delete',$pub)
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                            Supprimer
                    </button>
                    @endcan
                        <!-- Modal de supperssion-->
                        <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="supprimerModalLabel">Supprimer cet publication </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:black">  Êtes-vous sûr de vouloir supprimer cet pubblication !!?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="{{url('publications/'.$pub->id)}}" method="POST">
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
         <!-- start comments -->
         <div class="card-footer">
            <div class="container">
                <form class="col-12" method="post" action="/comment" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="display: flex;align-items: center;">
                        <input type="hidden" value="{{$pub->id}}" name="prjt">
                        <input type="text"
                               class="form-control" required value="{{old('content')}}" name="content"
                               placeholder="Commentaire">
                        <input type="file" name="image" id="imageselect" accept="image/*"
                               style="display:none;">
                        <div class="input-group-append">
                            <div class="btn-group">
                               <!-- <button id="selectbtn" type="button" class="btn btn-sm btn-nooutline"><i
                                            class="fa fa-image input-group-text"></i>
                                </button> -->
                                <button type="submit" class="btn btn-success btn-sm btn-outline"><i
                                            class="far fa-hand-point-right"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-12">
                        <ul class="list-group">
                            @foreach($pub->comments as $comment)
                                <li class="list-group-item mt-2"><b>{{$comment->user->name}}</b>
                                    : {{$comment->content}}

                                    <br>
                                    <small><i class="fa fa-clock-o"></i> {{$comment->created_at}}
                                        @if($comment->user->id === \Illuminate\Support\Facades\Auth::user()->id)
                                            <form class="float-right" method="post"
                                                  action="/comment/{{$comment->id}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-link btn-sm"><i
                                                            class="fa fa-trash text-danger"></i> Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>



         <!--end comments -->
    </div>
    </div>
     @endforeach
    </div>


@endsection


