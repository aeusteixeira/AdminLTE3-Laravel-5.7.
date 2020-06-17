@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/levels
        @endslot
        @slot('action')
            Criar nível
        @endslot
    @endslot
@endcomponent

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($levels as $level)
        <tr>
            <th scope="row">
                {{ $level->id }}
            </th>
            <td>
                {{ $level->name }}
            </td>
            <td>
                {{ $level->description }}
            </td>
            <td>
                @component('components.crud')
                @slot('edit')
                    @slot('url')
                        admin/levels
                    @endslot
                    @slot('id')
                        {{ $level->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
