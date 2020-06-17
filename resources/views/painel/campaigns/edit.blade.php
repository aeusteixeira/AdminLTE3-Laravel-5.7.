@extends('layouts.AdminLTE')

@section('content')
    <div class="card">
    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Informações pessoais</h3>
                </div>
                    <section class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Maria Gadú" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephone" class="col-sm-2 col-form-label">Telefone</label>
                            <div class="col-sm-10">
                                <input required type="text" name="telephone" class="form-control" id="telephone" placeholder="Ex: 21937423240" value="{{ $user->telephone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CPF" class="col-sm-2 col-form-label">CPF</label>
                            <div class="col-sm-10">
                                <input required type="text" name="CPF" class="form-control" id="CPF" placeholder="85668708080" value="{{ $user->telephone }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </section>
            </div>
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Dados de acesso</h3>
                </div>
                    <section class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input required type="email" name="email" class="form-control" id="email" placeholder="Ex: maria.gadu@gmail.com" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Senha</label>
                            <div class="col-sm-10">
                                <input required type="password" name="password" class="form-control" id="password" placeholder="shh" value="{{ $user->password }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </section>
            </div>
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Configurações</h3>
                </div>
                    <section class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Nível</label>
                            <div class="col-sm-10">
                                <select name="level_id" id="level" class="form-control">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}"
                                            {{ $user->level_id == $level->id ? 'selected' : '' }}>
                                                {{ $level->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_id" class="col-sm-2 col-form-label">Unidade</label>
                            <div class="col-sm-10">
                                <select name="unit_id" id="unit_id" class="form-control">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $user->unit_id == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </section>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Atualizar usuário</button>
            <a class="btn btn-default float-right">Cancel</a>
          </div>
    </form>
    </div>
@endsection
