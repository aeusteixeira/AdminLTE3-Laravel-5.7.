@extends('layouts.AdminLTE')
@section('content')
    <div class="row">
        @foreach ($accompaniments as $accompaniment)
        <div class="col-sm 12 col-lg-6">
            <div class="card">
            <h5 class="card-header">{{ $accompaniment->name }}</h5>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($accompaniment->comments as $comment)
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $comment->name }}</h5>
                          <small>
                            {{ date('d-m-y', strtotime($comment->created_at)) }}</span>
                          </small>
                        </div>
                        <p class="mb-1">
                            {{ $comment->pivot->description }}
                        </p>
                      </a>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
