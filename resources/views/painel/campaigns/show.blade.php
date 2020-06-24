@extends('layouts.AdminLTE')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> {{ $campaign->name_private }}
                  <small class="float-right">Criado em: {{ $campaign->created_at->format('d/m/Y') }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <p class="">{{ $campaign->description_private }}</p>
            <hr>
            <!-- info row -->

            <div class="card">
                <div class="card-header card-outline card-info">
                    Detalhes da campanha
                </div>
                <div class="card-body">
                    <div class="row invoice-info align-items-center">
                        <div class="col-sm-3 invoice-col">
                            <strong>Status:</strong>
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
                            <br>
                            <strong>Visibilidade: </strong> {{ $campaign->unit['name'] }}<br>
                        </div>

                        <div class="col-sm-4 invoice-col">
                          <strong>
                            Visualizações da página:
                          </strong>
                          {{ $campaign->views }} <br>
                          <strong>
                              Criado por:
                          </strong>
                          {{ $campaign->user['name'] }} - {{ $campaign->user->level['name'] }}</strong><br>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <strong>Compartilhar a campanha:</strong><br>
                            <div class="btn-group">
                                <a href="https://api.whatsapp.com/send?text={{ route('campaigns.view', ['url' => $campaign->slug]) }}" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('campaigns.view', ['url' => $campaign->slug]) }}" target="_blank" class="btn btn-primary">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/home?status={{ route('campaigns.view', ['url' => $campaign->slug]) }}" target="_blank" class="btn btn-info"><i class="fab fa-twitter"></i></a>
                                <button class="btn btn-default" id="copy"><i class="far fa-copy"></i> Copiar endereço</button>
                            </div>

                        </div>
                      </div>
                </div>
            <div class="card-footer {{ Auth::user()->level->marketing == 1 ? '' : 'd-none'}}">
                    <button target="_blank" class="btn btn-default float-right">
                        <i class="fas fa-print"></i> Imprimir
                    </button>

                    <button type="button" class="btn btn-secondary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Gerar PDF
                    </button>

                    <div class="btn-group float-right" style="margin-right: 5px;">
                        <button type="button" class="btn btn-success"><i class="fas fa-file-excel"></i> Excel</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#">Exportar para Excel</a>
                            <a class="dropdown-item" href="#">Importar dados do Excel</a>
                          </div>
                    </div>

                <a href="{{ route('campaigns.view', ['url' => $campaign->slug]) }}" type="button" class="btn btn-info">
                        <i class="fas fa-eye"></i> Visualizar
                    </a>

                    <a href="{{ route('mkt.campaigns.edit', ['id' => $campaign->id]) }}" class="btn btn-primary">
                        <i class="fas fa-bullhorn"></i> Editar
                    </a>

                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($campaign->register as $register)
                        <tr>
                            <td>{{ $register->id }}</td>
                            <td>{{ $register->name }}</td>
                            <td>{{ $register->telephone }}</td>
                            <td>
                                @component('components.crud')
                                @slot('view')
                                    @slot('url')
                                        marketing/registers
                                    @endslot
                                    @slot('id')
                                        {{ $register->id }}
                                    @endslot
                                @endslot
                                @endcomponent
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
              {{ $campaign->register->links() }}
              <input type="text" class="form-control" id="url" value="{{ route('campaigns.view', ['url' => $campaign->slug]) }}">
            </div>
            <!-- /.row -->
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('script')
<script>
$(function(){
    // Executa o evento click no button
    $('#copy').click(function(){
        // Seleciona o conteúdo do input
        $('#url').select();
        // Copia o conteudo selecionado
        var copiar = document.execCommand('copy');
        // Verifica se foi copia e retona mensagem
        if(copiar){
            alert('Copiado');
        }else {
            alert('Erro ao copiar, seu navegador pode não ter suporte a essa função.');
        }
        // Cancela a execução do formulário
        return false;
    });
});
</script>
@endsection
