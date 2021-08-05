@extends('layouts.template')

@section('content')
    <section class="posts-index">
      <div class="inner">
         <div class="header-container">
            <div class="header">
               <img src="/storage/img/posts-icon.png"><h1>Posts</h1>
            </div>
            <div class="search-container">
               <form action="/search" type="get">
                  <input type="search" id="search" name="search" class="search" value="{{ old('search') }}" placeholder="Search for title" required >
                  <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
               </form>
            </div>
         </div>
         <div class="cards">
            @if(count($posts) > 0)
               @foreach ($posts as $post )
                  <div class="card">
                     <div class="image">
                        <img class="coverImg" src="/storage/img/{{$post->cover_image}}">
                     </div>
                     <div class="body">
                        <div class="caption">
                           <h2 class="title">{{ $post->title }}</h2>
                           <small>Posted on {{ $post->created_at }} by {{ $post->user->name}} </small>
                        </div>
                        <div class="button">
                           <a href="/posts/{{ $post->id }}">View </a>
                        </div>
                     </div>
                  </div> 
               @endforeach 
            @else
         <p>No posts found</p>
         @endif
        </div>
           <div class="links">
                 <p class="link">{{ $posts->links() }}</p>
            </div>   
      </div>
    </section>
@endsection