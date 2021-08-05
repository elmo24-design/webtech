@extends('layouts.template')

@section('content')
   <div class="create-container">
      <div class="inner">
         <div class="back-container">
            <a href="/posts"><img class="backBtn" src="/storage/img/backBtn.png"></a>
            <small class="goBack"> Go back </small>
         </div>
         <div class="show">
            <h1>Update Post</h1>
         </div>
         <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
         @csrf
         {{ method_field('PUT') }}
            <div class="form-group">
               <label>Insert Title</label><br>
               <input type="text" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
               <label>Insert Caption</label><br>
               <input type="text" name="body" value="{{ $post->body }}" required>
            </div>
            <div class="form-group">
               <input type="file" name="cover_image" class="imgInput">
            </div>
            <div class="form-group">
               <button type="submit" class="submit">Update</button>
            </div>
         </form>
      <div>
   </div>
@endsection
