@extends('layouts.AdminLTE')

@section('content')
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
    A configuração dos templates deve ser feita somente pelo administrador do sistema.
  </div>
    <div class="card">
    <form action="{{ route('admin.templates.store') }}" method="POST">
        @csrf
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Informações de identificação</h3>
            </div>
                <section class="form-horizontal">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Página simples">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-10">
                            <input required type="text" name="address" class="form-control" id="address" placeholder="Ex: painel.templates.public.NAME">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                            <textarea required type="text" name="description" class="form-control" id="description" placeholder="Esta página possui apenas um formulário de cadastro e nada mais."></textarea>
                        </div>
                    </div>
                </div>
                </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Cadastrar template</button>
            <a class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
    </div>
@endsection
