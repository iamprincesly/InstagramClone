@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h4 font-weight-bold">{{ $user->username }}</div>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="{{ route('profile.edit', $user->id) }}" class="text-dark btn btn-outline-secondary font-weight-bold">Edit Profile</a>
                        <a href="{{ route('post.create') }}" class="btn btn-outline-primary font-weight-bold">Add New Post</a>
                    @endcan

                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                    <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                    <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold h5">
                    {{ $user->profile->title }}
                </div>
                <div class="h5">
                    {{ $user->profile->description }}
                </div>
                <div class="pt-1">
                    <a href="{{ $user->profile->url ?? '#' }}" class="text-dark font-weight-bold h5">{{ $user->profile->url ?? 'N/A' }}</a>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
