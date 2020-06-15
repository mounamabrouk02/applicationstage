@extends('layouts.app')

@section('stylesheets')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@yield('style')
@endsection


@section('content')
<br><br><br>
<div class="wrapper">
    <div class="sidebar">
        <!-- style="overflow: hidden; position: fixed; top: 10; height: 100%;-->
        <ul>
            <li><a href="{{url('/profile')}}"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="{{url('/publications')}}"><i class="fas fa-home"></i>Publications</a></li>
            <li><a href="{{url('/annonces')}}"><i class="fas fa-scroll"></i>Annonces</a></li>
            <li><a href="{{url('/messageries')}}"><i class="fas fa-address-book"></i>Messagerie</a></li>
            <li><a href="{{url('/certificat')}}"><i class="fas fa-file-alt"></i>Certificat</a></li>
            <li><a href="{{url('/reglages')}}"><i class="fas fa-tools"></i>Réglages</a></li>
        </ul>

    </div>
    <div class="main_content">
        <div class="header">
          @yield('content_header')
        </div>
        <div class="info">
         @yield('content_body')
        </div>
    </div>
</div>

@endsection

@section('javascripts')

    @yield('javascripts')
@endsection
