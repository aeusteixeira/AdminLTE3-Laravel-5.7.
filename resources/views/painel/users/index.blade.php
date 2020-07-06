@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/users
        @endslot
        @slot('action')
            Criar usuário
        @endslot
    @endslot
@endcomponent

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Nivel</th>
        <th scope="col">Associação</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">
                {{ $user->id }}
            </th>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->level['name'] }}
            </td>
            <td>
                {{ $user->unit['name'] }}
            </td>
            <td>
                @component('components.crud')
                @slot('view')
                    @slot('url')
                        users
                    @endslot
                    @slot('id')
                        {{ $user->id }}
                    @endslot
                @endslot
                @slot('edit')
                    @slot('url')
                        admin/users
                    @endslot
                    @slot('id')
                        {{ $user->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
