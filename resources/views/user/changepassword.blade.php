@extends('layouts.user')

@section('content_header')
<h5 style="color:black">Changer votre mot de passe</h5>
@endsection


@section('content_body')

<div class="col-md-8">
        @if(session('error'))
        <br>
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif

        @if(session('success'))
        <br>
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        @if(count($errors) > 0)
        <div class ="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
</div>
<div class="col-md-8">
    <div class="card" style="color:black">
        <div class="card-header" style="color:gray">Réglages de  {{{Auth::user()->name}}}</div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{url('reglages/')}}" method="post">
                    {{ csrf_field()}}
                <div class="form-group">
                    <label for="current_password" style="font-weight: bold;">Le mot de passe actuel :</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="new_password" style="font-weight: bold;">Le nouveau mot de passe :</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation" style="font-weight: bold;">Confirmer le mot de passe :</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                </div>

                <button class="btn btn-primary" type="submit">Changer le mot de passe</button>
            </form>

        </div>
    </div>
</div>

@endsection
