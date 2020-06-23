@extends('layouts.AdminLTE')

@section('content')
<div class="row">
@foreach ($posts as $post)
<div class="col-sm-12 col-lg-6">
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">
              {{ $post->title }}
          </h5>
          <p class="card-text">
              {{ mb_strimwidth("Hello World", 0, 10, "...")
            }}
          </p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
</div>
@endforeach
</div>
@endsection
