@extends('layouts.user')

@section('content_header')
<h5 style="color:black">Modifier cet publication</h5>
@endsection

@section('content_body')
<div class="row">
    <div class=" col-md-8">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('publications')}}">Publications</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                    </ol>
                  </nav>
        <form action="{{url('publications/'.$pub->id)}}" method="post" enctype="multipart/form-data">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            {{ method_field('PUT')}}
            <div class="modal-body">
                    <div class="form-group">
                    <label style="color:black">Titre</label>
                    <input type="text" name="titre" class="form-control"  value="{{$pub->titre}}">
                    </div>
                    <div class="form-group">
                    <label style="color:black">Contenu</label>
                    <input type="text" name="contenu" class="form-control" value="{{$pub->contenu}}" >
                    </div>
                    <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="photo" >
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection
