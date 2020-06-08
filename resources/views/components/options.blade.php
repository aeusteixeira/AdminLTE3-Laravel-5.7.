@if (Auth::user()->level->create == 1)
    <button class="btn btn-info text-light my-1" data-toggle="modal" data-target="#newRegister">
        <i class="fas fa-plus"></i> Adicionar registro
    </button>
@endif

<button class="btn btn-success my-1" data-toggle="modal" data-target="#importRegisters">
    <i class="fas fa-table"></i> Importar dados
</button>

@if (Auth::user()->level->spreadsheet_generate == 1)
<button class="btn btn-success my-1">
    <i class="fas fa-print"></i> Gerar planilha
</button>
@endif

@if (Auth::user()->level->print == 1)
<button class="btn btn-secondary my-1" onclick="window.print();">
    <i class="fas fa-print"></i> Imprimir
</button>
@endif

<a href="{{route('campaign.view', ['url' => $campaign_url ] )}}" target="_blank" class="btn btn-primary my-1">
    <i class="fas fa-link"></i> Visualizar página
</a>

<!-- Adicionar registro -->
<div class="modal fade" id="newRegister" tabindex="-1" role="dialog" aria-labelledby="newRegisterLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRegisterLabel">Adicionar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('registers.store')}}" method="POST">
                @csrf
                <input type="hidden" name="campaign_id" value="{{$campaign_id}}">
            <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="telephone">Telefone</label>
                      <input type="text" name="telephone" id="telephone" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Descrição</label>
                      <textarea class="form-control" name="description" id="description" rows="3" required>
                      </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Importar dados -->
<div class="modal fade" id="importRegisters" tabindex="-1" role="dialog" aria-labelledby="importRegistersLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importRegistersLabel">Importar dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('registers.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="campaign_id" value="{{$campaign_id}}">
                <div class="form-group container my-2">
                    <label for="exampleFormControlFile1">Selecione o arquivo do Excel</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Importar</button>
            </div>
        </form>
        </div>
    </div>
</div>
