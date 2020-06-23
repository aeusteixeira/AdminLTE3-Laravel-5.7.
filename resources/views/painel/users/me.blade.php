@extends('layouts.AdminLTE')

@section('content')
<section class="content">
<form action="{{ route('perfil.update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                src="{{
                    Auth::user()->attribute['photo'] == null ? asset('icon/'.Auth::user()->thumbnail) : Storage::url(Auth::user()->attribute['photo']) }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">
                {{ Auth::user()->name }}
              </h3>

              <p class="text-muted text-center">
                {{ Auth::user()->level['name'] }}
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Sobre mim Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sobre mim</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Sobre</strong>

                <p class="text-muted">
                    {{ Auth::user()->attribute['about'] }}
                </p>

              <hr>
              <strong><i class="fas fa-book mr-1"></i> Educação</strong>

                <p class="text-muted">
                    {{ Auth::user()->attribute['education'] }}
                </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Local</strong>

              <p class="text-muted">
                {{ Auth::user()->attribute['local'] }}
              </p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

              <p class="text-muted">
                <span class="tag tag-danger">{{ Auth::user()->attribute['skills'] }}</span>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Configurações</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">


                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nome</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}" id="name" name="name" placeholder="Seu nome completo">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" disabled id="email" value="{{ Auth::user()->email }}" name="email" placeholder="Um e-mail válido">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->CPF }}" placeholder="CPF">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telephone" class="col-sm-2 col-form-label">Telefone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->telephone }}" id="telephone" name="telephone" placeholder="Telefone">
                      </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                      <label for="about" class="col-sm-2 col-form-label">Sobre</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="about" name="about" placeholder="Fale um pouco sobre você">{{ Auth::user()->attribute['about'] }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="experience" class="col-sm-2 col-form-label">Experiência</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="experience" name="experience" placeholder="Conte um pouco sobre sua Experiência profissional">{{ Auth::user()->attribute['experience'] }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="education" class="col-sm-2 col-form-label">Educação</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="education" name="education" placeholder="Administração na Universidade Veiga de Almeida" value="{{ Auth::user()->attribute['education'] }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="local" class="col-sm-2 col-form-label">Local</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="local" name="local" value="{{ Auth::user()->attribute['local'] }}" placeholder="Nova Iguaçu - Rio de Janeiro">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="skills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Auth::user()->attribute['skills'] }}" id="skills" name="skills" placeholder="Boa dicção, bom atendimento ao cliente">
                      </div>
                    </div>


                    @if (Auth::user()->attribute['photo'] != null)

                        <div class="callout callout-warning">
                            <h5>Atenção!</h5>
                            <p>Você já alterou a foto de perfil.</p>
                        </div>

                    @else

                    <div class="callout callout-warning">
                        <h5>Atenção!</h5>
                        <p>Só é possível alterar a foto de perfil apenas uma vez. Escolha a foto corretamente</p>
                    </div>

                    <div class="form-group row">
                      <label for="skills" class="col-sm-2 col-form-label">Foto de perfil</label>
                      <div class="col-sm-10">
                        <input required type="file" name="photo" class="form-control-file" id="photo">
                      </div>
                    </div>

                    @endif

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Atualizar dados</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</form>
  </section>
@endsection
