@extends('layouts.admin')

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
            <!--<h3>La liste des messages</h3>-->
            <br>
            <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom Complet</th>
                        <th scope="col">email</th>
                        <th scope="col">message</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $msg)
                        <tr>
                        <th scope="row">{{$msg->id}}</th>
                            <td>{{$msg->nomComplet}}</td>
                            <td>{{$msg->email}}</td>
                            <td>{{substr($msg->message,0,30)}}</td>
                            <td>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal">
                                    <i class="fas fa-eye"></i>
                               </button>
                           <!-- Modal de details-->
                                <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$msg->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="showModalLabel{{$msg->id}}">{{$msg->nomComplet}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="color:black">{{$msg->message}}</p>
                                            </div>
                                            <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <!-- fin Modal de supperssion-->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimerModal">
                                        <i class="fas fa-archive"></i>
                                </button>
                                   <!-- Modal de supperssion-->
                        <div class="modal fade" id="supprimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="supprimerModalLabel">Supprimer ce message </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:black">  Êtes-vous sûr vous voulez supprimer ce message !!?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="{{url('admin/messages/'.$msg->id)}}" method="POST">
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
    </div>
</div>
@endsection
