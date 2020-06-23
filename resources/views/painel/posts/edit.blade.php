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
    <form action="{{ route('admin.posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Informações de identificação</h3>
            </div>
                <section class="form-horizontal">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                        <div class="col-sm-10">
                        <input required type="text" name="title" class="form-control" id="title" placeholder="Ex: O que fazer quando o cliente dizer não?" value="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Conteudo</label>
                        <div class="col-sm-10">
                            <textarea rows="20" type="text" name="description" class="form-control" id="nota-body">{{ $post->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                              <select class="form-control" name="type" id="type">
                                <option value="0" {{ $post->title == 0 ? 'selected' : ''}}>Treinamento</option>
                                <option value="1" {{ $post->title == 1 ? 'selected' : ''}}>Informações</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
    </div>
@endsection
