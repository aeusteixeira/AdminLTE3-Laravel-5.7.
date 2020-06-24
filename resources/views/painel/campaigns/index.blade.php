@extends('layouts.AdminLTE')

@section('content')

@if(Auth::user()->level->create_campaign == 1)

@component('components.add')
    @slot('add')
        @slot('url')
            campaigns
        @endslot
        @slot('action')
            Criar campanha
        @endslot
    @endslot
@endcomponent

@endif

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
        @foreach ($campaigns as $campaign)
        <tr>
            <th scope="row">
                {{ $campaign->id }}
            </th>
            <td>
                {{ $campaign->name_private }}
            </td>
            <td>
                @switch($campaign->status)
                @case('active')
                <span class="badge badge-success">Ativa</span>
                    @break
                @case('paused')
                    <span class="badge badge-warning">Pausada</span>
                    @break
                @default
                    <span class="badge badge-danger">Finalizada</span>
            @endswitch
            </td>
            <td>
                @component('components.crud')
                @slot('view')
                    @slot('url')
                        marketing/campaigns
                    @endslot
                    @slot('id')
                        {{ $campaign->id }}
                    @endslot
                @endslot
                @if(Auth::user()->level->update_campaign == 1)
                    @slot('edit')
                        @slot('url')
                            marketing/campaigns
                        @endslot
                        @slot('id')
                            {{ $campaign->id }}
                        @endslot
                    @endslot
                @endif
            @endcomponent
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
