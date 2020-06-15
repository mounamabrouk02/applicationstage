<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{URL::asset('mdb/css/style.css')}}">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    @yield('stylesheets')

</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" style="position: fixed; width: 100%;top: 0;z-index: 999;">
                    <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo1.jpg') }}" class="card-img-top" alt="..." style="height:50px;width:50px">
                {{ config('app.name', 'METROCALK') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/stagiaires')}}">Stagiaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/messages')}}">Messages</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/demandes')}}">Demandes de stage</a>
                        </li>

                        <li class="nav-item">
                             <a class="nav-link" href="{{url('/admin/apropos')}}">Actualités</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="{{url('/admin/publications')}}">Publications</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="{{url('/admin/commentaires')}}">Commentaires</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{url('/admin/commentaires')}}">Demandes de certificat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/commentaires')}}">Annonces
                            </a>
                        </li>

              </ul>
              <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                                      <li class="nav-item dropdown">
                                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre>
                                            Admin <span class="caret"></span>
                                          </a>


                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                                <button href="#" class="dropdown-item" data-toggle="modal" data-target="#modelId">
                                                    Changer le mot de passe
                                                </button>

                                              <a class="dropdown-item" href="{{ route('admin-logout') }}"
                                                 onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  &nbsp &nbsp{{ __('Déconnexion') }}
                                              </a>

                                              <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>

                                          </div>
                                      </li>
                              </ul>

            </div>
          </nav>
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Changer le mot de passe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="container" method="post" action="{!! route('changepassword') !!}">
                                    {{ csrf_field()}}

                                    <div class="form-group">
                                        <label>Nouveau mot de passe</label>
                                        <input type="password" class="form-control" name="password" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Répéter le mot de passe</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('success')}}
                    </div>

                    <script>
                        $(".alert").alert();
                    </script>
                </div>
                @endif
                @if(session('error'))
                <div class="container">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('error')}}
                    </div>

                    <script>
                        $(".alert").alert();
                    </script>
                </div>
@endif
            @yield('content')

    </div>

<!-- Scripts -->
<!-- jQuery -->
<script type="text/javascript" src="{{URL::asset('mdb/js/jquery.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{URL::asset('mdb/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{URL::asset('mdb/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{URL::asset('mdb/js/mdb.min.js')}}"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>


@yield('javascripts')
<!-- Tester l'integration de jquery
<script>
    $(document).ready(function(){
        alert(1);
    })
</script> -->
</body>
</html>
