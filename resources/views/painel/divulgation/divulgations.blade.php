@extends('layouts.AdminLTE')

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-4">
        @foreach ($divulgations as $divulgation)

          <div class="card">
            <img src="{{ Storage::url($divulgation->banner) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bolder">{{ $divulgation->name }}</h5>
              <p class="card-text" id="description">{{ $divulgation->description }}</p>
            </div>
            <div class="card-footer text-center">
                <div class="btn-group">
                <a href="{{ route('dashboard.divulgation.download', ['id' => $divulgation->id]) }}" class="btn btn-default btn-sm">
                        <i class="fas fa-download"></i> Baixar
                    </a>
                    <button class="btn btn-default btn-sm" id="copy">
                        <i class="fas fa-copy"></i> Copiar
                    </button>
                    <button class="btn btn-default btn-sm d-none">
                        <i class="fas fa-share-square"></i> Compartilhar
                    </button>
                </div>
            </div>
          </div>

          @endforeach

    </div>
</div>
@endsection

@section('script')
<script>
$(function(){
        // Executa o evento click no button
        $('#copy').click(function(){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#description').text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Copiado');
        // Cancela a execução do formulário
        return false;
    });
});
</script>
@endsection
