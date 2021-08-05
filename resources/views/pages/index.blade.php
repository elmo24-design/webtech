@extends('layouts.template')

@section('content')
    <section class="landing">
      <div class="bg-overlay">
        <div class="landing-inner">
          <h1 class="lead">Visualize and Create</h1>
          <p class="desc">
            Build your own designs, share it and collaborate with other
            developers
          </p>
          <div class="buttons">
            <a href="/register" class="btn btn-primary">Sign Up</a>
            <a href="/login" class="btn btn-secondary">Login</a>
          </div>
        </div>
      </div>
    </section>
@endsection