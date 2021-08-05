@extends('layouts.template')

@section('content')
<div class="dashboard-container">
    <div class="inner">
        <h1>Dashboard</h1>
        <div class="welcome">
            <h2><i class="fas fa-user"></i>Welcome {{ Auth::user()->name }}</h2>
        </div>
        <div class="add-container">
            <a href="/posts/create"><img class="addBtn" src="/storage/img/add.png"></a>
            <small>Create a post</small>
        </div>
        <h2 class="your-works">Your works</h2>
        <div class="cards">
         @if(count($posts)>0)
            @foreach ($posts as $post )
            <div class="card">
                <div class="cover-img">
                    <img class="coverImg" src="/storage/img/{{$post->cover_image}}">
                </div>
                <div class="inside">
                    <div class="body-container">
                        <p class="title">{{ $post->title }}</p>
                        <p class="body">{{ $post->body }}</p>
                        <p class="posted-on">Posted on {{ $post->created_at }}</p>
                    </div>
                    <div class="buttons">
                        <a href="/posts/{{ $post->id }}/edit" class="btn edit-btn">Edit</a>
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn delete-btn">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @else 
        <p>No posts yet</p>
        @endif
        </div>
    </div>
</div>
@endsection
