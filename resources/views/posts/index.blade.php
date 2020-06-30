@extends('layouts.app')

@section('content')
@foreach ($posts as $post)
<div class="container justify-content-center">
    <div class="row pt-5 pb-2">
        <div class="col-6 offset-2 pr-0">
            <div class="pt-3">
                <a href="/profile/{{$post->user->profile->id}} ">
                    <img src=" {{ $post->user->profile->profileImage() }}" class=" rounded-circle" style="max-width:35px">
                    <span class="font-weight-bold pl-3 text-dark"> {{$post->user->username}} </span>
                </a>
                <button class="btn btn-primary m-3 btn-sm ">follow</button>
            </div>
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>

    </div>
    <div class="row">
        <div class="col-6 offset-2">
            <a href="/profile/{{$post->user->profile->id}} ">
                <span class="font-weight-bold text-dark"> {{$post->user->username}} </span>
            </a>
            {{$post->caption}}
        </div>
    </div>
</div>
@endforeach
@endsection
