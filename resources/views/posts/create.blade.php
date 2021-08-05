@extends('layouts.template')

@section('content')
   <div class="create-container">
      <div class="inner">
         <div class="back-container">
            <a href="/home"><img class="backBtn" src="/storage/img/backBtn.png"></a>
            <small class="goBack"> Go back </small>
         </div>
         <div class="show">
            <h1>Create a Post</h1>
            <p>Share your designs around the world</p>
         </div>
         <form action="/posts" method="POST" enctype="multipart/form-data">
         @csrf
            <div class="form-group">
               <label>Insert Title</label><br>
               <input type="text" name="title" required>
            </div>
            <div class="form-group">
               <label>Insert Caption</label><br>
               <input type="text" name="body" required>
            </div>
            <div class="form-group">
               <input type="file" name="cover_image"  class="imgInput">
            </div>
            <div class="form-group">
               <button type="submit" class="submit">Submit</button>
            </div>
         </form>
      <div>
   </div>
@endsection
