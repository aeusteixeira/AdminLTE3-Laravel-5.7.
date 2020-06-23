@extends('layouts.AdminLTE')

@section('content')
    <div class="card">
        {{-- (strpos(Request::route()->getName(), 'mkt.campaigns') === 0) ? 'true' : 'false' --}}
    <form action="{{ route('mkt.campaigns.store') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="card-body">
            <div class="callout callout-warning">
                <h5>Informações de identificação</h5>
            <p>Essas informações que ficarão visveis na página de <a href="{{ route('mkt.campaigns.index') }}">Visualizar de Campanhas</a>. Elas são utilizadas para a identificação desta campanha para os utilizadores desse sistema.</p>
              </div>
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Informações de identificação</h3>
                </div>

                <section class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name_private" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input required type="text" name="name_private" class="form-control" id="name_private" placeholder="Ex: Programa de Bolsas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description_private" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea required name="description_private" class="form-control" id="description_private" placeholder="Pessoas inscritas nessa campanha são pessoas interessadas em bolsas de estudo, portanto usar o script feito para o Programa de Bolsas ao fazer contato..."></textarea>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Configurações</h3>
                </div>
                <div class="card-body">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                          <h3 class="card-title">Template e o layout da campanha</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="template_id">Template</label>
                                            <select class="form-control" name="template_id" id="template_id">
                                                @foreach ($templates as $template)
                                                    <option data-img="https://i.picsum.photos/id/970/900/900.jpg" value="{{ $template->id }}">{{ $template->name }}</option>
                                                @endforeach
                                              </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="layout_id">Layout</label>
                                            <select class="form-control" name="layout_id" id="layout_id">
                                                @foreach ($layouts as $layout)
                                                    <option value="{{ $layout->id }}">{{ $layout->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-8">
                                    <img src="https://i.picsum.photos/id/969/900/250.jpg" id="for_img_template" class="img-fluid">
                                </div>
                                </div>
                            </div>
                        </div>

                    <div class="card card-outline card-success">
                        <div class="card-header">
                          <h3 class="card-title">Privacidade e acesso</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="unit_id">Quem pode visualizar aos resultados desta campanha?</label>
                                <select class="form-control" id="unit_id" name="unit_id">
                                      <option value="0">Todas as unidades</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                  </select>
                                <small id="unit_id" class="form-text text-muted">Usuários associados a essa unidade poderão ter acesso aos cadastros dessa campanha, porém com a limitação estabelecida em seu <a href="{{ route('admin.levels.index') }}">nível</a>.</small>

                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success">
                        <div class="card-header">
                          <h3 class="card-title">Redirecionamento</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" value="1" name="redirect" class="custom-control-input" id="redirect">
                                    <label class="custom-control-label" for="redirect" >Redirecionar usuário ao enviar dados?</label>
                                </div>
                            </div>
                            <div class="form-group row d-none" id="for_redirect">
                                <label for="redirectTo" class="col-sm-2 col-form-label">Redirecionar para</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="redirectTo" name="redirectTo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-outline card-success">
                        <div class="card-header">
                          <h3 class="card-title">Modelos de mensagens</h3>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5>Modelos de mensagens</h5>
                                <p>As mensagem padrão do WhatsApp podém ser inscrita normalmente na caixa de texto abaixo, já a do e-mail é aconselhável usar um editor de markdown online <a href="https://dillinger.io/" target="_blank">Dillinger</a> e copiar o código fonte gerado e colar na caixa abaixo para melhor visualização do usuário final.</p>
                            </div>
                            <div class="form-group row">
                                <label for="default_whatsapp_message" class="col-sm-2 col-form-label">WhatsApp</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" sentences required name="default_whatsapp_message" class="form-control" id="default_whatsapp_message" placeholder="Parabéns! Você se recentemente cadastrou no em nosso Programa de Bolsas. Estou te encaminhando essa mensagem informando que você foi comtemplado com uma bolsa de 60% em qualquer um de nossos cursos."></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="default_email_message" class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" required name="default_email_message" class="form-control" id="default_email_message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Campanha</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="name_public">Nome</label>
                                <input required type="text" name="name_public" class="form-control" id="name_public" placeholder="Ex: Bolsas de até 60%!">
                            </div>
                            <div class="form-group">
                                <label for="information_public">Descrição</label>
                                <textarea required rows="10" name="information_public" class="form-control" id="information_public" placeholder="Inscreva-se agora e adquira bolsas de até 60% de desconto em diversos cursos"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-8">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <input type="text" value="www.domain.com/campaing" class="form-control form-control-sm" disabled>
                                </div>
                                <div class="card-body bg-primary">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-1">

                                        </div>
                                        <div class="col-sm-12 col-lg-10">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="text-dark text-center" id="for_name_public">Programa de bolsas</h3>
                                                    <p class="text-dark text-center"  id="for_information_public">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius!</p>
                                                    <div class="form-group" id="for_name_input">
                                                        <label for="name" class="text-secondary">Nome</label>
                                                        <input type="text" id="name" class="form-control form-control-sm" placeholder="Vanessa da Mata">
                                                    </div>
                                                    <div class="form-group" id="for_email_input">
                                                        <label for="email" class="text-secondary">E-mail</label>
                                                        <input type="text" id="email" class="form-control form-control-sm" placeholder="vanessa.da.mata@gmail.com">
                                                    </div>
                                                        <p class="text-secondary text-center">...</p>
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
            <button type="submit" class="btn btn-success">Cadastrar campanha</button>
            <a class="btn btn-default float-right">Cancel</a>
          </div>
    </form>
    </div>
@endsection

@section('script')
<script>

$('#redirect').change(function() {
    if ($(this).is(':checked')) {
            $('#for_redirect').fadeOut(1000, function(){
                $('#for_redirect').removeClass("d-none")
            });
        }
    if (!$(this).is(':checked')) {
            $('#for_redirect').addClass('d-none');
        }
});

$('#name_public').keyup(function() {
    $('#for_name_public').html(this.value);
});

$('#information_public').keyup(function() {
    $('#for_information_public').html(this.value);
});

$('#template_id').change(function() {
    var valor = this.value;
    var img = $(this).find(':selected').attr('data-img');
    console.log(img);

    $("#for_img_template").attr({
        'src': img
    });

});

//$("#for_img_template").attr('scr', 'https://i.picsum.photos/id/970/400/200.jpg');

</script>
@endsection
