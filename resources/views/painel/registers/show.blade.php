@extends('layouts.AdminLTE')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Informações</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="row">
                  <div class="col-12">
                    <h4>FollowUps</h4>
                    <form action="{{ route('mkt.comment') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="register_id" value="{{ $register->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success">Comentar</button>
                        </div>
                    </form>
                      @foreach ($register->comments as $comment)
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('icon/'.$comment->thumbnail) }}" alt="user image">
                          <span class="username">
                            <a href="#">{{ $comment->name }}</a>
                          </span>
                          <span class="description">
                            {{ date('d-m-y h:m', strtotime($comment->pivot->created_at)) }}</span>
                        </div>
                        <p>
                            {{ $comment->pivot->description }}
                        </p>

                      </div>
                      @endforeach
                  </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-5">
                <h3 class="text-primary">{{ $register->name }}</h3>
                <hr>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-default">
                    Atualizar
                </button>
                <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-email">
                    <i class="fas fa-paper-plane"></i> Enviar e-mail
                </button>
                <hr>
                @if ($register->user_id == null OR $register->user_id == Auth::user()->id)
                    <div class="text-muted">
                        <p class="text-sm">E-mail
                        <b class="d-block">{{ $register->email }}</b>
                        </p>
                        <p class="text-sm">Telefone
                        <b class="d-block">{{ $register->telephone }} @component('components.crud')
                            @slot('wpp')
                            @slot('number')
                              {{ $register->telephone }}
                            @endslot
                            @slot('msg')
                              Olá, {{ $register->name }}. Tudo bem?
                            @endslot
                        @endslot
                        @endcomponent</b>
                        </p>
                        <p class="text-sm">Cidade
                        <b class="d-block">{{ $register->city }}</b>
                        </p>
                        <p class="text-sm">Bairro
                        <b class="d-block">{{ $register->district }}</b>
                        </p>
                        <p class="text-sm">Unidade
                        <b class="d-block">{{ $register->unit['name'] }}</b>
                        </p>
                        <p class="text-sm">Possui o interesse em:
                        <b class="d-block">{{ $register->courses }}</b>
                        </p>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list"></i> Inscrito nas campanhas
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($register->campaign as $campaign)
                                <tr>
                                <td>
                                    {{ $campaign->name_private }}
                                </td>
                                    <td scope="row">
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
                                    @endcomponent
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Atualizar registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('mkt.registers.update', ['id' => $register->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input required type="text" name="name" id="name" value="{{ $register->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input required type="email" class="form-control" name="email" value="{{ $register->email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_id">Unidade</label>
                        <select name="unit_id" id="unit_id" class="form-control">
                            <optgroup label="Rio de Janeiro">
                                <option value="1" {{ $register->unit_id == 1 ? 'selected' : '' }}>Nova Iguaçu</option>
                                <option value="2" {{ $register->unit_id == 2 ? 'selected' : '' }}>Santa Cruz</option>
                                <option value="7" {{ $register->unit_id == 7 ? 'selected' : '' }}>Bonsucesso</option>
                            </optgroup>
                            <optgroup label="Espírito Santo - ES">
                                <option value="4" {{ $register->unit_id == 4 ? 'selected' : '' }}>Vitória</option>
                            </optgroup>

                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-email">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enviar e-mail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('mkt.registers.sendEmail') }}" method="post">
                @csrf
                <input type="hidden" name="register_id" value="{{ $register->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensagem</label>
                        <textarea required name="message" id="message" rows="5" class="form-control">Olá, {{ $register->name }}, tudo bem? Aqui é {{ Auth::user()->name }}. Estou encaminhando esse e-mail apenas para...</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Enviar e-mail</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
