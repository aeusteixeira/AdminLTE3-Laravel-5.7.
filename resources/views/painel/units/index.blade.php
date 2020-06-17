@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            admin/units
        @endslot
        @slot('action')
            Criar unidade
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
        @foreach ($units as $unit)
        <tr>
            <th scope="row">
                {{ $unit->id }}
            </th>
            <td>
                {{ $unit->name }}
            </td>
            <td>
                {{ $unit->description }}
            </td>
            <td>
                @component('components.crud')
                @slot('edit')
                    @slot('url')
                        admin/units
                    @endslot
                    @slot('id')
                        {{ $unit->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
