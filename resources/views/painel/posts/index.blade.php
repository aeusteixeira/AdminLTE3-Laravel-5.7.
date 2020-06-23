@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/posts
        @endslot
        @slot('action')
            Criar post
        @endslot
    @endslot
@endcomponent

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Tipo</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">
                {{ $post->id }}
            </th>
            <td>
                {{ $post->title }}
            </td>
            <td>
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
            </td>
            <td>
                @component('components.crud')
                @slot('view')
                    @slot('url')
                        admin/posts
                    @endslot
                    @slot('id')
                        {{ $post->id }}
                    @endslot
                @endslot
                @slot('edit')
                    @slot('url')
                        admin/posts
                    @endslot
                    @slot('id')
                        {{ $post->id }}
                    @endslot
                @endslot
                @slot('delete')
                    @slot('url')
                        admin/posts
                    @endslot
                    @slot('id')
                        {{ $post->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
