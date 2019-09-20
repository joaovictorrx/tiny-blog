@extends('layouts.blog')

@section('content')
<section class="page-header py-5">
  <div class="container">
    <div class="row">
        <div class="col-12 text-center">
          <h1>{{ $post->title }}</h1>
        </div>
    </div>
  </div>
</section>

<section class="pt-5">
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-6 text-center mb-4">
          <img class="img-fluid" src="{{ $post->image }}" alt="">
        </div>
        <div class="col-12 col-md-6">
          <div class="mb-4">
            {{ $post->body }}
          </div>
          <p>{{ $post->author->name }}, {{ $post->created_at->diffForHumans() }}.</p>
        </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
      @foreach ($recentPosts as $post)
        <div class="card mb-5 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            
            <p class="card-text">{{ Str::words($post->body, 50) }} <a class="stretched-link" href="{{ route('show.post', $post->slug) }}">Ler mais</a></p>
            <p>{{ $post->author->name }}, {{ $post->created_at->diffForHumans() }}.</p>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(document).ready(function(){
  });
</script>
@endsection