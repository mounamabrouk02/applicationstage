@extends('layouts.user')

@section('content_header')
<h5 style="color:black">Modifier votre profile</h5>
@endsection

@section('content_body')
<div class="row">
    <div class=" col-md-8">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('profile')}}">Profile</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                    </ol>
                  </nav>
        <form action="{{url('profile/'.$prfl->id)}}" method="post" enctype="multipart/form-data">
            <!--securité token for the laravel-->
            {{ csrf_field()}}
            {{ method_field('PUT')}}
            <div class="modal-body">
                    <div class="form-group">
                    <label for="inputCity" style="color:black">Genre</label>
                        <select id="inputState" class="form-control" name="genre" >
                            <option selected>Homme</option>
                            <option>Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label style="color:black">Date de naissance</label>
                    <input type="text" name="dateN" class="form-control"  value="{{$prfl->dateN}}">
                    </div>
                    <div class="form-group">
                    <label style="color:black">Ville de naissance</label>
                    <input type="text" name="villeN" class="form-control"  value="{{$prfl->villeN}}">
                    </div>
                    <div class="form-group">
                            <label style="color:black">Établissement</label>
                            <input type="text" name="ecole" class="form-control"  value="{{$prfl->ecole}}">
                   </div>
                   <div class="form-group">
                        <label style="color:black">Niveau scolaire </label>
                        <input type="text" name="niveau" class="form-control"  value="{{$prfl->niveau}}">
                   </div>
                   <div class="form-group">
                        <label style="color:black">Filière </label>
                        <input type="text" name="filiere" class="form-control"  value="{{$prfl->filiere}}">
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
                        <label style="color:black">Addresse</label>
                        <input type="text" name="addresse" class="form-control"  value="{{$prfl->addresse}}">
                    </div>
                    <div class="form-group">
                        <label style="color:black">Telephone</label>
                        <input type="text" name="telephone" class="form-control"  value="{{$prfl->telephone}}">
                    </div>
                    <div class="form-group">
                            <label style="color:black">Votre CV</label>
                            <input type="file" class="form-control" name="cv" >
                    </div>
            </div>
            <div class="modal-footer">
            <a href="/profile" class="btn btn-primary">Go Back</a>
            <button type="submit" class="btn btn-success">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection
