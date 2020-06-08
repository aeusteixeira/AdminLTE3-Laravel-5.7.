@extends('layouts.AdminLTE')

@section('content')
    <div class="card">
    <form action="{{ route('units.store') }}" method="POST">
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
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Administração">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                            <textarea required type="text" name="description" class="form-control" id="description" placeholder="Unidade de que administra as demais unidades da rede."></textarea>
                        </div>
                    </div>
                </div>
                </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Cadastrar unidade</button>
            <a class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
    </div>
@endsection
