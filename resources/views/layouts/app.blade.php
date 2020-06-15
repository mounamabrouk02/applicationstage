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
                            <a class="nav-link" href="{{url('/')}}">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/apropos')}}">Actualités</a>
                        </li>

                        <li class="nav-item">
                             <a class="nav-link" href="{{url('/demandes')}}">Stages</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="{{url('/contact')}}">Contacts</a>
                        </li>
              </ul>
              <ul class="navbar-nav ml-auto">
                                  <!-- Authentication Links -->
                                  @guest
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                      </li>
                                      @if (Route::has('register'))
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                          </li>
                                      @endif
                                  @else
                                  <li class="nav-item">
                                        <a class="nav-link" href="{{url('/publications')}}">Espace stagiaire</a>
                                   </li>
                                      <li class="nav-item dropdown">
                                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre>
                                            <img src="/profiles/images/{{Auth::user()->image}}" style="width:35px; height:35px; position:absolute; top:1px; left:10px; border-radius:50%">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                          </a>

                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                              <a class="dropdown-item" href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  {{ __('Déconnexion') }}
                                              </a>

                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>
                                          </div>
                                      </li>
                                  @endguest
                              </ul>

            </div>
          </nav>

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

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var receivar_id = '';
        var my_id = "{{Auth::id()}}";
         $(document).ready(function(){
            // ajax setup form csrf token
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

             $('.user').click(function(){
                 $('.user').removeClass('active');
                 $(this).addClass('active');

                 receivar_id = $(this).attr('id');

                 $.ajax({
                     type: "get",
                     url: "messageries/message/" + receivar_id, //need to create this root
                     data: "",
                     cache: false,
                     success: function(data){
                          $('#messages').html(data);
                     }
                 });
             });


               $(document).on('keyup', '.input-text input', function (e) {
               var message = $(this).val();
               // check if enter key is pressed and message is not null also receivar is selected
               if (e.keyCode == 13 && message != '' && receivar_id != '') {
                $(this).val(''); // while pressed enter text box will be empty
                var datastr = "receivar_id=" + receivar_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {

                    }
                })
            }
        });

         });
    </script>

@yield('javascripts')
<!-- Tester l'integration de jquery
<script>
    $(document).ready(function(){
        alert(1);
    })
</script> -->
</body>
</html>
