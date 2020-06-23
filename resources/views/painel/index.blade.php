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
            <a href="{{ route('dashboard.trainings.index') }}" class="small-box-footer">
            Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-lg-3">
        <div class="small-box bg-info">
            <div class="inner">
            <h3>150</h3>

            <p>Contato/Suporte</p>
            </div>
            <div class="icon">
                <i class="fas fa-headset"></i>
            </div>
            <a href="#" class="small-box-footer">
            Acessar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
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
            <h3 class="card-title"><i class="fas fa-headset"></i> Meus leads</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus qui earum impedit doloremque consequuntur ullam! Rem rerum distinctio aspernatur quisquam autem, repellat excepturi suscipit voluptatem, numquam architecto nisi odio, tenetur nulla quos.

                <div class="row pt-4">
                    <div class="col-sm-12 col-lg-6">
                        <a href="#" class="info-box mb-3 bg-info">
                            <span class="info-box-icon">
                                <i class="fas fa-headset"></i>
                            </span>

                            <div class="info-box-content">
                              <span class="info-box-text">Meus leads</span>
                              <span class="info-box-number">5,200</span>
                            </div>
                          </a>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <a href="#" class="info-box mb-3 bg-success">
                            <span class="info-box-icon">
                                <i class="fas fa-user-plus"></i>
                            </span>

                            <div class="info-box-content">
                              <span class="info-box-text">Adicionar lead</span>
                            </div>
                          </a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <!-- TO DO List -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                To Do List
            </h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm">
                <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                </ul>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                <li>
                <!-- drag handle -->
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                    <label for="todoCheck1"></label>
                </div>
                <!-- todo text -->
                <span class="text">Design a nice theme</span>
                <!-- Emphasis label -->
                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                <!-- General tools such as edit or delete-->
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
                <li>
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                    <label for="todoCheck2"></label>
                </div>
                <span class="text">Make the theme responsive</span>
                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
                <li>
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                    <label for="todoCheck3"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
                <li>
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                    <label for="todoCheck4"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
                <li>
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                    <label for="todoCheck5"></label>
                </div>
                <span class="text">Check your messages and notifications</span>
                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
                <li>
                <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo6" id="todoCheck6">
                    <label for="todoCheck6"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                </div>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
            </div>
        </div>
    </div>
    </div>
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

</script>
@endsection
