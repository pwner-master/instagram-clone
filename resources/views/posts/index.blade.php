@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <img src="/storage/{{ $post->image}}" class="w-100">
                </div>
            </div>
            <div class="row pt-2 py-4">


                <div class="col-46 offset-3">
                    <div>

                        <p>
                    <span class="font-weight-bold">
                      <a href="/profile/show/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                      </a>

                    </span> {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
    </div>
@endsection
