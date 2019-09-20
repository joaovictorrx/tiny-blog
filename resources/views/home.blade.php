@extends('layouts.blog')

@section('content')
<section class="page-header py-5">
  <div class="container">
    <div class="row">
        <div class="col-12 text-center">
          <h1>POSTS</h1>
        </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @foreach ($posts as $post)
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

<section class="pb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</section>

@endsection