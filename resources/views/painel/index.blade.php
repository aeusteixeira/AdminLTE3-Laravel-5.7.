@extends('layouts.AdminLTE')

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-3">
        <div class="small-box bg-primary">
            <div class="inner">
            <h3>{{ $divulgation }}</h3>
            <p>Divulgação</p>
            </div>
            <div class="icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <a href="{{ route('dashboard.divulgation.index') }}" class="small-box-footer">
                Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $trainings }}</h3>
            <p>Treinamentos</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('dashboard.trainings.index') }}" class="small-box-footer">
            Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $information }}</h3>

            <p>Informações</p>
            </div>
            <div class="icon">
                <i class="fas fa-info"></i>
            </div>
            <a href="{{ route('dashboard.information.index') }}" class="small-box-footer">
            Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="small-box bg-info">
            <div class="inner">
            <h3>8hrs/dia</h3>

            <p>Contato/Suporte</p>
            </div>
            <div class="icon">
                <i class="fas fa-headset"></i>
            </div>
            <a href="{{ route('dashboard.support.index') }}" class="small-box-footer">
            Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

@if(
    Auth::user()->level->administrator == 1
    OR
    Auth::user()->level->marketing == 1
    OR
    Auth::user()->level->administrative == 1
    )
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-users"></i> Cadastros nas ultimas 24 horas</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <hr>
            <div><b>Nova Iguaçu: </b>{{ $registersLastNVG }}</div>
            <div><b>Santa Cruz: </b>{{ $registersLastSTC }}</div>
            <div><b>Bonsucesso: </b>{{ $registersLastBONS }}</div>
            <div><b>Todas: </b>{{ $registersLastNVG + $registersLastSTC + $registersLastBONS }}</div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-sm-12 col-lg-6">
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Total de Cadastros</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Nova Iguaçu</h3>
                                </div>
                                <div class="card-body">
                                    <div><b>Total:</b> {{ $registerAllNVG }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Santa Cruz</h3>
                                </div>
                                <div class="card-body">
                                    <div><b>Total:</b> {{ $registerAllSTC }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Bonsucesso</h3>
                                </div>
                                <div class="card-body">
                                    <div><b>Total:</b> {{ $registerAllBONSS }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
    </div>
</div>
@endif
<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card card-outline card-info">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-sticky-note"></i> Recado para você</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
            <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <h4 class="text-center">{{ $message->title }}</h4>
            {!! $message->description !!}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card card-outline card-info">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-headset"></i> Cadastros</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                Cadastros são pessoas que possuem interesse em estudar conosco. Você pode acessar a aba <b>Meus atendimentos</b> para acompanhar as pessoas que você atendendo. Em campanhas você consegue encontrar novos cadastros que estão em uma determinada campanha e adicionar aos seus cadastros para começar o processo de fechamento de venda com essa pessoa. Ao adicionar um cadastro ao seu atendimento somente você tem acesso aos dados de contato dele e ele deixa de aparecer na listagem nas demais campanhas.
                <div class="row pt-4">
                    <div class="col-sm-12 col-lg-6">
                    <a href="{{ route('dashboard.mycalls.index') }}" class="info-box mb-3 bg-info">
                            <span class="info-box-icon">
                                <i class="fas fa-headset"></i>
                            </span>
                            <div class="info-box-content">
                              <span class="info-box-text">Meus atendimentos</span>
                            </div>
                          </a>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                    <a href="{{ route('mkt.campaigns.index') }}" class="info-box mb-3 bg-success">
                            <span class="info-box-icon">
                                <i class="fas fa-bullhorn"></i>
                            </span>

                            <div class="info-box-content">
                              <span class="info-box-text">Campanhas</span>
                            </div>
                          </a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Atualização - {{ $update->version }} - {{ date( 'd/m/Y', strtotime($update->created_at))  }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! $update->content !!}
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok, entendi</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('script')
<script>
    $(document).Toasts('create', {
        title: 'Bem-vindo(a) de volta <i class="fas fa-smile"></i>',
        autohide: true,
        delay: 5000,
        class: 'bg-success',
  });

  $(document).ready(function() {
    $('#modal-default').modal('show');
})

</script>

@if(
    Auth::user()->level->administrator == 1
    OR
    Auth::user()->level->marketing == 1
    OR
    Auth::user()->level->administrative == 1
)
<script type="text/javascript">
var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Todas',
          'Nova Iguaçu',
          'Santa Cruz',
          'Bonsucesso',
      ],
      datasets: [
        {
          data: [{{ $registersLastNVG + $registersLastSTC + $registersLastBONS }},{{$registersLastNVG}},{{$registersLastSTC}},{{$registersLastBONS}}],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>
@endif

@endsection
