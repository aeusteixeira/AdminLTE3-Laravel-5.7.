@extends('layouts.AdminLTE')

@section('link')
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=lo08zr0yshbackc989ktg3hhp2chtjt0q0xp6ooz0rc6mf06"></script>
@endsection

@section('script')
    <script>
        tinymce.init({ selector:'textarea' });
    </script>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('admin.support.store') }}" method="POST">
            @csrf
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Informações de identificação</h3>
                </div>
                <section class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="version" class="col-sm-2 col-form-label">Versão</label>
                            <div class="col-sm-10">
                                <input required type="text" name="version" class="form-control" id="version" placeholder="Ex: 1.0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Conteudo</label>
                            <div class="col-sm-10">
                                <textarea rows="20" type="text" name="content" class="form-control" id="nota-body"></textarea>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Publicar</button>
                <a class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
@endsection
