@extends('layouts.AdminLTE')

@section('content')

@component('components.add')
    @slot('add')
        @slot('url')
            templates
        @endslot
        @slot('action')
            Criar template
        @endslot
    @endslot
@endcomponent

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Endereço</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($templates as $template)
        <tr>
            <th scope="row">
                {{ $template->id }}
            </th>
            <td>
                {{ $template->name }}
            </td>
            <td>
                {{ $template->description }}
            </td>
            <td>
                {{ $template->address }}
            </td>
            <td>
                @component('components.crud')
                @slot('edit')
                    @slot('url')
                        templates
                    @endslot
                    @slot('id')
                        {{ $template->id }}
                    @endslot
                @endslot
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
