@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/layouts
        @endslot
        @slot('action')
            Criar layout
        @endslot
    @endslot
@endcomponent

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($layouts as $layout)
        <tr>
            <th scope="row">
                {{ $layout->id }}
            </th>
            <td>
                {{ $layout->name }}
            </td>
            <td>
                @component('components.crud')
                @slot('edit')
                    @slot('url')
                        admin/layouts
                    @endslot
                    @slot('id')
                        {{ $layout->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
