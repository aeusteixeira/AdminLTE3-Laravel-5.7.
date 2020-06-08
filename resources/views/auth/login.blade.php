@extends('layouts.standard')

@section('content')
<section class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Faça login para iniciar sua sessão</p>

          <form action="{{ route('login') }}" method="post">
              @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" placeholder="*******" class="form-control" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Lembre de mim
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Acessar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>-</p>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="{{ route('password.request') }}">Esqueci a minha senha</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
</section>
@endsection
