@extends('layouts.AdminLTE')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                @switch($post->type)
                    @case(0)
                    <span class="badge badge-success">Treinamento</span>
                        @break
                    @case(1)
                        <span class="badge badge-info">Informação</span>
                        @break
                    @default
                        <span class="badge badge-danger">404</span>
                @endswitch
            </div>
            <h3 class="text-center display-4 py-3 m-0">{{ $post->title }}</h3>
            <div class="text-center">
                <img src="{{  $post->user['thumbnail'] }}" alt="">
                {{ $post->user['name']}} - {{ $post->created_at->format('d/m/Y') }}
            </div>
            <hr>
            {!! $post->description !!}
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
