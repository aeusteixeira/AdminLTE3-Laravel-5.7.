@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/divulgation
        @endslot
        @slot('action')
            Criar divulgação
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
        @foreach ($divulgations as $divulgation)
        <tr>
            <th scope="row">
                {{ $divulgation->id }}
            </th>
            <td>
                {{ $divulgation->name }}
            </td>
            <td>
                @switch($divulgation->type)
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
                @slot('delete')
                    @slot('url')
                        admin/divulgation
                    @endslot
                    @slot('id')
                        {{ $divulgation->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
