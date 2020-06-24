@extends('layouts.AdminLTE')

@section('content')
<div class="row">
@foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <h1 class="text-dark">
                <a href="{{ route('admin.posts.show', ['id' => $post->slug]) }}">
                        {{ $post->title }}
                    </a>
                </h1>
            <p class="lead">Por: {{ $post->user['name'] }} - {{ $post->created_at->format('d/m/Y') }}</p>
                <p class="card-text">
                    {!! $post->description  !!}
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
      </div>
@endforeach
</div>
@endsection
