@extends('layouts.app')




@section('content')

<br><br><br>

<div class="py-4 container">
        <h1 style="text-align: center;">Demandez votre stage</h1>
        <p style="text-align: center;">Si vous voullez nous envoyer une demande de stage veuillez remlir ce formulaire</p>

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
        <div class="card mb-3" style="max-width: 1100px, max-height: 700px;" >
        <form action="{{ action('DemandeController@store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row no-gutters">

                        <div class="col-md-4">
                            <br><br>
                            <img src="images/stage2.png" class="card-img" alt="..." style="height:380px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title">Nom Complet</h6>
                            <input type="text" name="nomComplet" class="form-control" value="{{ old('nomComplet')}}">
                            <br>
                            <h6 class="card-title">Email</h6>
                            <input type="text" name="email" class="form-control" value="{{ old('email')}}">
                            <br>
                            <h6 for="card-title">Telephone</h6>
                            <input name="telephone" class="form-control" value="{{ old('telephone')}}">
                            <br>
                            <h6 for="card-title">Lettre de motivation</h6>
                            <textarea name="motivation" class="form-control" >{{ old('motivation')}}</textarea>
                            <br>
                            <div class="form-group">
                                    <label>Votre CV</label>
                                    <input type="file" class="form-control" name="cv" >
                            </div>
                            <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="Envoyer">
                            </div>
                            </div>
                  </div>
                </div>
            </form>
        </div>
    </div>

@endsection

