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
    <div class="row">
        <div class="col-md-12">
            <!--<h3>La liste des demandes de stage</h3>-->
            <br>
            <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom Complet</th>
                        <th scope="col">email</th>
                        <th scope="col">telephone</th>
                        <th scope="col">Lettre de motivation</th>
                        <th scope="col">Etat actuel</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $dmnd)
                        <tr>
                        <th scope="row">{{$dmnd->id}}</th>
                            <td>{{$dmnd->nomComplet}}</td>
                            <td>{{$dmnd->email}}</td>
                            <td>{{$dmnd->telephone}}</td>
                            <td>{{substr($dmnd->motivation,0,25)}}</td>
                            <td>{{$dmnd->etat}}</td>
                            <td>
                                <a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                                        <i class="fas fa-archive"></i>
                                </button>
                                   <!-- Modal de supperssion-->
                        <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="supprimerModalLabel">Supprimer cet demande </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:black">  Êtes-vous sûr vous voulez supprimer cet demande de stage !!?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="{{url('admin/demandes/'.$dmnd->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Confirmer</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- fin Modal de supperssion-->                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
