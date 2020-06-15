@extends('layouts.app')

@section('content')

<div class=" py-4 container">
    <br><br><br>


    <div class="row">
        @foreach($list as $element)
        <div class="col-md-6 my-2" style="display:block;">
        <!-- Card -->
        <div class="card card-image"
        style="background-image: url({{asset('storage/'.$element->image)}});">

        <!-- Content -->
        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4" style="height:350px">
        <div>
            <h5 class="blue-text"><i class="fas fa-chart-pie"></i>METROCLACK</h5>
            <h3 class="card-title pt-2"><strong>{{$element->titre}}</strong></h3>
            <p>{{substr($element->contenu,0,200)}}</p>
            <p class="blue-text"><i class="fas fa-chart-pie"></i>Dernier Modification le {{$element->updated_at}}</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSuccess">Voir plus
                 </button>

                  <!-- Central Modal Medium Success -->
                  <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-info" role="document">
                      <!--Content-->
                      <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                          <p class="heading lead">{{$element->titre}}</p>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                          </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                          <div class="text-center">
                            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                            <p>{{$element->contenu}}</p>
                          </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                          <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Fermer</a>
                        </div>
                      </div>
                      <!--/.Content-->
                    </div>
                  </div>
                  <!-- Central Modal Medium Success-->
        </div>
        </div>

        </div>
        <!-- Card -->
        </div>
        @endforeach
    </div>
</div>
@endsection
