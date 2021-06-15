@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-3 p-5">
        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
    <div class="col-9 pt-5">
    <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-content-center pb-3">
            <div class="h4">{{ $user->username }}</div>

            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
        </div>

        @can('update', $user->profile)
            <a href="/p/create">Add New Post</a>
        @endcan
    </div>

        @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        @endcan

        <div class="d-flex">
            <div class="pr-5"><strong>{{$user->posts->count()}}</strong>posts</div>
            <a href='#'style='color:black'  data-toggle="modal" data-target="#followersModal"><div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong>followers</div></a>
            <a href='#' style='color:black' data-toggle="modal" data-target="#followingModal"><div class="pr-5"><strong>{{$user->following->count()}}</strong>following</div> </a>
        </div>
        <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
        <div> {{ $user->profile->description }}</div>
        <div><a href="#">{{$user->profile->url }}</a></div>
    </div>
   </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
        <a href="/p/{{$post->id}}">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </a>
        </div>
        @endforeach
</div>

<div id="followersModal" class="modal fade" role="dialog"  >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style='display: block ruby;'>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Followers</h4>
      </div>
      <div class="modal-body">
      @foreach($user->profile->followers as $users ) 
            <div class="row">
                    <div class="col-3 ">
                    <center>   <a style='color:black' href="/profile/show/{{ $user->id }}"><img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50"></a></center>
                    </div>
                    <div class="col-9 ">
                        <b>    <a style='color:black' href="/profile/show/{{ $user->id }}"> {{ $users->profile->title }} </a></b>
                    </div>
                
            </div>
            <hr/>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="followingModal" class="modal fade" role="dialog"  >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style='display: block ruby;'>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Following</h4>
      </div>
      <div class="modal-body">
      @foreach($user->following as $user) 
            <div class="row">
              
                    <div class="col-3 ">
                    <center>   <a style='color:black' href="/profile/show/{{ $user->id }}"><img src="{{ $user->profileImage() }}" class="rounded-circle w-50"></a></center>
                    </div>
                    <div class="col-9 ">
                        <b>    <a style='color:black' href="/profile/show/{{ $user->id }}"> {{ $user->title }} </a></b>
                    </div>
                
            </div>
            <hr/>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
