@extends('layouts.AdminLTE')

@section('content')
<div class="card">
<form action="{{ route('levels.update', ['id' => $level->id]) }}" method="POST">
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
                        <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: vendedor"
                    value="{{ $level->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea required type="text" name="description" class="form-control" id="description" placeholder="Usuários com esse nível... vendem">{{ $level->description }}</textarea>
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
                <!--Usuário-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de usuários</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_user == 1 ? 'checked' : '' }} {{ $level->create_user == 1 ? 'checked' : '' }} value="1" name="create_user" class="custom-control-input" id="create_user"
                            >
                            <label class="custom-control-label" for="create_user">Criar usuário</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_user == 1 ? 'checked' : '' }} value="1" name="update_user" class="custom-control-input" id="update_user">
                            <label class="custom-control-label" for="update_user">Editar usuário</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_user == 1 ? 'checked' : '' }} value="1" name="delete_user" class="custom-control-input" id="delete_user">
                            <label class="custom-control-label" for="delete_user">Excluir usuário</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Registros-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de registros</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_register == 1 ? 'checked' : '' }} value="1" name="create_register" class="custom-control-input" id="create_register">
                            <label class="custom-control-label" for="create_register">Criar registro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_register == 1 ? 'checked' : '' }} value="1" name="update_register" class="custom-control-input" id="update_register">
                            <label class="custom-control-label" for="update_register">Editar registro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_register == 1 ? 'checked' : '' }} value="1" name="delete_register" class="custom-control-input" id="delete_register">
                            <label class="custom-control-label" for="delete_register">Excluir registro</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Nivel-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de níveis</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_level == 1 ? 'checked' : '' }} value="1" name="create_level" class="custom-control-input" id="create_level">
                            <label class="custom-control-label" for="create_level">Criar nível</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_level == 1 ? 'checked' : '' }} value="1" name="update_level" class="custom-control-input" id="update_level">
                            <label class="custom-control-label" for="update_level">Editar nível</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_level == 1 ? 'checked' : '' }} value="1" name="delete_level" class="custom-control-input" id="delete_level">
                            <label class="custom-control-label" for="delete_level">Excluir nível</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Unidade-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de unidades</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_unit == 1 ? 'checked' : '' }} value="1" name="create_unit" class="custom-control-input" id="create_unit">
                            <label class="custom-control-label" for="create_unit">Criar unidade</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_unit == 1 ? 'checked' : '' }} value="1" name="update_unit" class="custom-control-input" id="update_unit">
                            <label class="custom-control-label" for="update_unit">Editar unidade</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_unit == 1 ? 'checked' : '' }} value="1" name="delete_unit" class="custom-control-input" id="delete_unit">
                            <label class="custom-control-label" for="delete_unit">Excluir unidade</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Layout-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de layouts</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_layout == 1 ? 'checked' : '' }} value="1" name="create_layout" class="custom-control-input" id="create_layout">
                            <label class="custom-control-label" for="create_layout">Criar layout</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_layout == 1 ? 'checked' : '' }} value="1" name="update_layout" class="custom-control-input" id="update_layout">
                            <label class="custom-control-label" for="update_layout">Editar layout</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_layout == 1 ? 'checked' : '' }} value="1" name="delete_layout" class="custom-control-input" id="delete_layout">
                            <label class="custom-control-label" for="delete_layout">Excluir layout</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Campanha-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de campanhas</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_campaign == 1 ? 'checked' : '' }} value="1" name="create_campaign" class="custom-control-input" id="create_campaign">
                            <label class="custom-control-label" for="create_campaign">Criar campanha</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_campaign == 1 ? 'checked' : '' }} value="1" name="update_campaign" class="custom-control-input" id="update_campaign">
                            <label class="custom-control-label" for="update_campaign">Editar campanha</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_campaign == 1 ? 'checked' : '' }} value="1" name="delete_campaign" class="custom-control-input" id="delete_campaign">
                            <label class="custom-control-label" for="delete_campaign">Excluir campanha</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--E-mail marketing-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Envio de e-mail marketing</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_email == 1 ? 'checked' : '' }} value="1" name="create_email" class="custom-control-input" id="create_email">
                            <label class="custom-control-label" for="create_email">Criar e enviar e-mail</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_email == 1 ? 'checked' : '' }} value="1" name="delete_email" class="custom-control-input" id="delete_email">
                            <label class="custom-control-label" for="delete_email">Excluir histórico de e-mail</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Postagens-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de postagens</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_post == 1 ? 'checked' : '' }} value="1" name="create_post" class="custom-control-input" id="create_post">
                            <label class="custom-control-label" for="create_post">Criar postagens</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_post == 1 ? 'checked' : '' }} value="1" name="update_post" class="custom-control-input" id="update_post">
                            <label class="custom-control-label" for="update_post">Editar postagens</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_post == 1 ? 'checked' : '' }} value="1" name="delete_post" class="custom-control-input" id="delete_post">
                            <label class="custom-control-label" for="delete_post">Excluir postagens</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Mensagens-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Manipulação de mensagens</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->create_message == 1 ? 'checked' : '' }} value="1" name="create_message" class="custom-control-input" id="create_message">
                            <label class="custom-control-label" for="create_message">Criar mensagens</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->update_message == 1 ? 'checked' : '' }} value="1" name="update_message" class="custom-control-input" id="update_message">
                            <label class="custom-control-label" for="update_message">Editar mensagens</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->delete_message == 1 ? 'checked' : '' }} value="1" name="delete_message" class="custom-control-input" id="delete_message">
                            <label class="custom-control-label" for="customSwitch2">Excluir mensagens</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Planilhas-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Envio de planilhas</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->spreadsheet_import == 1 ? 'checked' : '' }} value="1" name="spreadsheet_import" class="custom-control-input" id="spreadsheet_import">
                            <label class="custom-control-label" for="spreadsheet_import">Importar planilha de para o sistema</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->spreadsheet_generate == 1 ? 'checked' : '' }} value="1" name="spreadsheet_generate" class="custom-control-input" id="spreadsheet_generate">
                            <label class="custom-control-label" for="spreadsheet_generate">Exportar planilha do sistema</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Prints e impressões-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">PrintScreen e Impressões</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->print_screen == 1 ? 'checked' : '' }} value="1" name="print_screen" class="custom-control-input" id="print_screen">
                            <label class="custom-control-label" for="print_screen">Usuário conseguirá tirar PrintScreen de páginas do sistema</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->printer == 1 ? 'checked' : '' }} value="1" name="printer" class="custom-control-input" id="printer">
                            <label class="custom-control-label" for="printer">Usuário conseguirá imprimir páginas do sistema</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Prints e impressões-->
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Admnistrador</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" {{ $level->administrator == 1 ? 'checked' : '' }} value="1" name="administrator" class="custom-control-input" id="administrator">
                            <label class="custom-control-label" for="administrator">Usuário será definido como administrador do sistema</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-success">Atualizar nível</button>
    <a class="btn btn-default float-right">Cancel</a>
    </div>
</form>
</div>
@endsection
