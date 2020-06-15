@extends('layouts.admin')

@section('stylesheets')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')

 {{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une actualité</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <!-- Formulaire -->
        <form action="{{ action('AdminApropoController@store') }}" method="post" enctype="multipart/form-data">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            <div class="modal-body">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="titre" class="form-control"  placeholder="Entrez le titre">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="contenu" class="form-control"  placeholder="Entrez le contenu">
                    </div>
                    <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" >
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


{{-- Start Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier cette actualité</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <!-- Formulaire -->
        <form action="/admin/apropos" method="post" id="editForm" enctype="multipart/form-data">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            {{ method_field('PUT')}}

            <div class="modal-body">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="titre" id="titre" class="form-control"  placeholder="Entrez le titre">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="contenu" id="contenu" class="form-control"  placeholder="Entrez le contenu">
                    </div>
                    <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="image" class="form-control" name="image" >
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
        <!-- End Formulaire -->
          </div>
        </div>
      </div>
{{-- End Edit Modal --}}







<!-- montrer les erreurs ou la validation d'insersion apres le clique sur "serve data" using session of laravel-->
    <div class="container">
        <br>
        <h3>La liste des actualités de l'entreprise : </h3>
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
        <br>
        <div class="alert alert-success">
            <p> {{\Session::get('success')}} </p>
        </div>
        @endif
        @if(\Session::has('danger'))
        <br>
        <div class="alert alert-danger">
            <p> {{\Session::get('danger')}} </p>
        </div>
        @endif
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Ajouter une actualité
    </button>
    <br><br>
    <table  id="datatable" class="table table-bordered table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Designation</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $apropo)
              <tr>
                <th>{{ $apropo->id}}</th>
                <td>{{ $apropo->titre}}</td>
                <td>{{ substr($apropo->contenu,0,80)}}</td>
                <td>
                        <img src="{{asset('storage/'.$apropo->image)}}" alt="..." style="height: 60px;width:60px;">
                </td>
                <td>
                    <form action="{{url('admin/apropos/'.$apropo->id)}}" method="post" id="deleteForm">

                    <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent"><i class="fas fa-eye"></i></button>

                            <!--Modal: modalRelatedContent-->
                            <div class="modal fade" id="modalRelatedContent" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                    <p class="heading">Details de L'actualité {{$apropo->id}}</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                    <div class="row">
                                        <div class="col-4">
                                        <img src="{{asset('storage/'.$apropo->image)}}"
                                            class="img-fluid" alt="">
                                        </div>

                                        <div class="col-8">
                                        <p><strong>{{$apropo->titre}}</strong></p>
                                        <p>{{$apropo->contenu}}</p>
                                        <button type="button" class="btn btn-info btn-md"  data-dismiss="modal">Fermer</button>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal: modalRelatedContent-->
                    <a href="#" class="btn btn-success edit"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                            <i class="fas fa-archive"></i>
                    </button>
                        {{-- Start Delete Modal --}}
                            <div class="modal fade" id="supprimerModal" style="color:black" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer l'actualité</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    <!-- Formulaire -->
                                    <form action="{{url('admin/apropos/'.$apropo->id)}}" method="post" id="deleteForm">
                                        <!--securité token for the laravel-->
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <div class="modal-body">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <p>Etes vous sur ?!.. Vous voulez supprimer cette actualité ?!</p>
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
//code for edit reccord

         table.on('click','.edit',function(){
         $tr = $(this).closest('tr');
         if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
         }
        var data = table.row($tr).data();
        console.log(data);
        // feetsh data on the form
        $('#titre').val(data[1]);
        $('#contenu').val(data[2]);

        $('#editForm').attr('action','/admin/apropos/'+data[0]);
        $('#editModal').modal('show');
          });

//end edit reccord

              });
</script>


@endsection
