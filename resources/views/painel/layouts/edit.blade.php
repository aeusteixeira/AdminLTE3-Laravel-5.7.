@extends('layouts.AdminLTE')

@section('content')
<div class="card">
<form action="{{ route('admin.layouts.update', ['id' => $layout->id]) }}" method="POST">
@csrf
@method('PUT')
<div class="card-body">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Informações de identificação</h3>
        </div>
            <section class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: NOME | E-MAIL | TELEFONE" value="{{ $layout->name }}">
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
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="name_input" class="custom-control-input" id="name_input"
                                {{ $layout->name_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="name_input">Nome</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="email_input" class="custom-control-input" id="email_input"
                                {{ $layout->email_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="email_input" >E-mail</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="telephone_input" class="custom-control-input" id="telephone_input"
                                {{ $layout->telephone_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="telephone_input" >Telefone</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="unit_input" class="custom-control-input" id="unit_input"
                                {{ $layout->unit_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="unit_input" >Unidade</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="city_input" class="custom-control-input" id="city_input"
                                {{ $layout->city_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="city_input" >Cidade</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" value="1" name="district_input" class="custom-control-input" id="district_input"
                                {{ $layout->district_input == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="district_input" >Bairro</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-8">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <input type="text" value="www.domain.com/campaing" class="form-control form-control-sm" disabled>
                                </div>
                                <div class="card-body bg-primary">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4">

                                        </div>
                                        <div class="col-sm-12 col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group d-none" id="for_name_input">
                                                        <label for="name" class="text-secondary">Nome</label>
                                                        <input type="text" id="name" class="form-control form-control-sm" placeholder="Vanessa da Mata">
                                                    </div>
                                                    <div class="form-group d-none" id="for_email_input">
                                                        <label for="email" class="text-secondary">E-mail</label>
                                                        <input type="text" id="email" class="form-control form-control-sm" placeholder="vanessa.da.mata@gmail.com">
                                                    </div>
                                                    <div class="form-group d-none" id="for_telephone_input">
                                                        <label for="telephone_input" class="text-secondary">Telefone</label>
                                                        <input type="text" id="telephone_input" class="form-control form-control-sm" placeholder="(21) 994282445">
                                                    </div>
                                                    <div class="form-group d-none" id="for_unit_input">
                                                        <label for="unit_input" class="text-secondary">Unidade</label>
                                                        <select id="unit_input" class="form-control form-control-sm">
                                                            <option value="">Unidade de Nova Iguaçu</option>
                                                            <option value="">Unidade de Santa Cruz</option>
                                                            <option value="">Unidade de Vitória</option>
                                                            <option value="">...</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group d-none" id="for_city_input">
                                                        <label for="city_input" class="text-secondary">Cidade</label>
                                                        <input type="text" name="city_input" id="city_input" class="form-control form-control-sm" placeholder="Rio de Janeiro">
                                                    </div>
                                                    <div class="form-group d-none" id="district_input">
                                                        <label for="district_input" class="text-secondary">Bairro</label>
                                                        <input type="text" name="district_input" id="district_input" class="form-control form-control-sm" placeholder="Lapa">
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-success btn-sm">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-success">Atualizar layout</button>
    <a class="btn btn-default float-right">Cancel</a>
    </div>
</form>
</div>
@endsection

@section('script')
<script>

$('#name_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_name_input').fadeOut(1000, function(){
                $('#for_name_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_name_input').addClass('d-none');
        }
});

$('#email_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_email_input').fadeOut(1000, function(){
                $('#for_email_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_email_input').addClass('d-none');
        }
});

$('#telephone_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_telephone_input').fadeOut(1000, function(){
                $('#for_telephone_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_telephone_input').addClass('d-none');
        }
});

$('#unit_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_unit_input').fadeOut(1000, function(){
                $('#for_unit_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_unit_input').addClass('d-none');
        }
});

$('#city_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_city_input').fadeOut(1000, function(){
                $('#for_city_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_city_input').addClass('d-none');
        }
});

$('#district_input').change(function() {
    if ($(this).is(':checked')) {
            $('#for_district_input').fadeOut(1000, function(){
                $('#for_district_input').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_district_input').addClass('d-none');
        }
});
</script>
@endsection
