@extends('layouts.app')

@section('stylesheets')

<style>
    .pink-text {
    color: #33b5e5 !important;
}
</style>
@endsection

@section('content')

<div class=" py-4 container">
    <br><br><br>


    <div class="row">
        @foreach($list as $element)
        <div class="col-md-4 my-2" style="display:block;">
                <!-- Card Narrower -->
                <div class="card card-cascade narrower" style="height:500px">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                        <img class="card-img-top" src="{{asset('storage/'.$element->image)}}"
                            alt="Card image cap" style="height:200px">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade">

                        <!-- Label -->
                        <h5 class="pink-text pb-2 pt-1"><i class="far fa-building"></i> &nbsp METROTALK</h5>
                        <!-- Title -->
                        <h6 class="font-weight-bold card-title">{{$element->titre}}</h6>
                        <!-- Text -->
                        <p class="card-text">{{substr($element->contenu,0,190)}}</p>
                        <!-- Button -->
                        <button type="button" style="margin-left:80px" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSuccess{{$element->id}}">Voir plus
                            </button>

                             <!-- Central Modal Medium Success -->
                             <div class="modal fade" id="centralModalSuccess{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                        <!-- Card footer -->
                        <div class="card-footer text-muted text-center">
                               Ecrit le : {{$element->created_at}}
                        </div>

                    </div>
                    <!-- Card Narrower -->
        </div>
        @endforeach
    </div>
</div>
@endsection


