@extends('layouts.AdminLTE')

@section('content')
    @if(Auth::user()->level->god == 1)
        @component('components.add')
            @slot('add')
                @slot('url')
                    admin/support
                @endslot
                @slot('action')
                    Adicionar atualização
                @endslot
            @endslot
        @endcomponent
    @endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-headset"></i>
            Informações de contato
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <dl>
            <dt>Desenvolvedor</dt>
            <dd>Matheus Teixeira</dd>
            <dt>E-mail</dt>
            <dd>contato.matheusteixeira@gmail.com</dd>
            <dt>Telefone</dt>
            <dd>(21) 994282445</dd>
        </dl>
    </div>
</div>

    <h3 class="mb-2 text-dark">Histórico de atualizações</h3>
    <div class="accordion" id="accordionExample">
        @foreach($updates as $update)
            <div class="card">
                <div class="card-header bg-gray-dark" id="heading{{ $update->id }}">
                    <h2 class="mb-0">
                        <button class="btn btn-bg-gray-dark text-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $update->id }}" aria-expanded="true" aria-controls="collapse{{ $update->id }}">
                            {{ $update->version }} - {{ date( 'd/m/Y', strtotime($update->created_at))  }}
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="heading{{ $update->id }}" data-parent="#accordionExample">
                    <div class="card-body bg-white">
                        {!! $update->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
