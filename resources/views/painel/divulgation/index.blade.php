@extends('layouts.AdminLTE')

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-4">

          <div class="card">
            <img src="https://cursomarca.com.br/wp-content/uploads/2020/05/WhatsApp-Image-2020-05-27-at-12.34.02.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bolder">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer...</p>
            </div>
            <div class="card-footer text-center">
                <div class="btn-group">
                    <button class="btn btn-default btn-sm">
                        <i class="fas fa-download"></i> Baixar
                    </button>
                    <button class="btn btn-default btn-sm">
                        <i class="fas fa-copy"></i> Copiar
                    </button>
                    <button class="btn btn-default btn-sm">
                        <i class="fas fa-share-square"></i> Compartilhar
                    </button>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
