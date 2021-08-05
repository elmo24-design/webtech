@extends('layouts.template')

@section('content')
   <div class="show-container">
      <div class ="inner">
         <div class="back-container">
            <a href="/posts"><img class="backBtn" src="/storage/img/backBtn.png"></a>
            <small class="goBack"> Go back </small>
         </div>
         <div class="cards">
            <div class="card">
               <h1 class="title">{{ $post->title }} <h1>
               <div class="img-container">
                  <img class="design-img" src="/storage/img/{{$post->cover_image}}">
               </div>
               <div class="bottom">
                  <div class="desc">
                     <h3 class="body">{{ $post->body }}</h3>
                     <small>Posted on {{ $post->created_at }} by {{ $post->user->name  }}</small>
                  </div>
                  @if(!Auth::guest())
                     @if(Auth::user()->id == $post->user_id)
                        <div class="buttons">
                           <a href="/posts/{{ $post->id }}/edit" class="btn btn-edit">Edit </a>
                           <form action="/posts/{{ $post->id }}" method="POST" class="float-right">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-delete">Delete</button>
                           </form>
                        </div>
                     @endif
                  @endif
               </div>
            </div>
         </div> 
      </div>
   </div>

@endsection