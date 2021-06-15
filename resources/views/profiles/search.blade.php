@extends('layouts.app')

@section('content')
<div class="container"> 
<h4> Search results </h4>
<br/>
@if(!empty($users))         
        @foreach($users as $user )
        <div class="row">
                    <div class="col-3 ">
                    <center>   <a style='color:black' href="/profile/show/{{ $user->id }}"><img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50"></a></center>
                    </div>
                    <div class="col-9 ">
                        <b>    <a style='color:black' href="/profile/show/{{ $user->id }}"> {{ $user->profile->title }} </a></b>
                    </div>
                
            </div>
            <hr/>

        @endforeach 
        @endif
</div>
 
 
@endsection
