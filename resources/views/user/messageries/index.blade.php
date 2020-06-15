@extends('layouts.user')



@section('style')
    <style>

ul{
            margin: 0;
            padding: 0;
        }
        li{
            list-style: none;
        }

        .user-wrapper, .message-wrapper{
            border: 1px solid #dddddd;
            overflow-y: auto;
        }
        .user-wrapper{
            height: 470px;

        }
        .user{
            cursor: pointer;
            padding: 0px 0;
            position: relative;

        }
        .user:hover{
             background: #eeeeee;
        }
        .user:last-child{
            margin-bottom: 0;
        }
        .pending{
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin : 0;
            border-radius: 50%;
            width: 18px;
            height : 18px;
            line-height: 18px;
            padding-left: 5px;
            color : #ffffff;
            font-size: 12px;
        }
        .media-left{
            margin : 0 10px;
        }
        .media-left img{
            width: 64px;
            height: 60px;
            border-radius: 100%;
        }
        .media-body p{
             margin: 6px 0;
        }
        .message-wrapper{
            padding: 10px;
            height: 400px;
            background: #eeeeee;
        }
        .messages .message{
            margin-bottom: 15px;
        }
        .messages .message:last-child{
            margin-bottom: 0;
        }
        .received, .sent{
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }
        .received{
            background: #ffffff;
        }
        .sent{
            background: #3bebff;
            float: right;
            text-align: right;
        }
        .message p{
            margin: 5px 0;
        }
        .date{
            color: #777777;
            font-size: 12px;
        }
        .active{
            background: #eeeeee;
        }
        input[type=text]{
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid  #cccccc;
        }
        input[type=text]:focus{
            border: 1px solid #aaaaaa;
        }
        p{
            font-size: 12px;
        }
        .wrapper .main_content .info div {
             margin-bottom: 0px;
        }


    </style>
@endsection



@section('content_header')
<h5 style="color:black">Bienvenue dans votre boite Messagerie</h5>
@endsection



@section('content_body')
<div class="container-fluid">
    <div class="row" style="color:black">
        <div class="col-md-4">
            <div class="user-wrapper">
                <ul class="users">
                    @foreach($users as $user)
                   <li class="user" id="{{$user->id}}">
                       <span class="pending">1</span>

                       <div class="media">
                            <div class="media-left">
                                    <img src="/profiles/images/{{$user->image}}" alt="" class="media-object">
                                </div>
                            <div class="media-body">
                                <p class="name">{{$user->name}}</p>
                                <p class="email">{{$user->email}}</p>
                            </div>
                       </div>
                   </li>
                   @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-8" id="messages">

        </div>
    </div>
</div>
@endsection

@section('javascripts')

@endsection
