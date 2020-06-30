@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{ $user->username }}</h1>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can( 'update', $user->profile )
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts()->count() }} </strong>posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }} </strong>followers</div>
                <div class="pr-5"><strong> {{ $user->following->count() }} </strong>following</div>
            </div>
            <div class="font-weight-bold pt-4">{{$user->name}} </div>
            <hr>
            <div>{{ $user->profile->title }} </div>
            <div>{{ $user->profile->description }} </div>
            <div class="pb-5"><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
        <hr>
        <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-4 pt-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
