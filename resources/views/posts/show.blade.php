@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row offset-2">
        <div class="col-6 pr-0">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div class="pt-3">
                <a href="/profile/{{$post->user->profile->id}} ">
                    <img src=" {{ $post->user->profile->profileImage() }}" class=" rounded-circle" style="max-width:35px">
                    <span class="font-weight-bold pl-3 text-dark"> {{$post->user->username}} </span>
                </a>
                <button class="btn btn-primary m-3 btn-sm ">follow</button>

            </div>
            <hr>
            <div class=" d-flex">

               <div class="pr-4">
                    <a href="/profile/{{$post->user->profile->id}} ">
                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle" style="max-width:35px">
                    </a>
               </div>
                <div class="">
                    <a href="/profile/{{$post->user->profile->id}} ">
                        <span class="font-weight-bold text-dark"> {{$post->user->username}} </span>
                    </a>
                    {{$post->caption}}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
