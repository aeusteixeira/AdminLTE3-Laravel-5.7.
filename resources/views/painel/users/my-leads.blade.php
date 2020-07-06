@extends('layouts.AdminLTE')

@section('content')
<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach (Auth::user()->registers as $register)
              <tr>
                  <td>{{ $register->id }}</td>
                  <td>{{ $register->name }}</td>
                  <td>{{ $register->telephone }}</td>
                  <td>
                      @component('components.crud')
                      @slot('view')
                          @slot('url')
                              marketing/registers
                          @endslot
                          @slot('id')
                              {{ $register->id }}
                          @endslot
                      @endslot
                      @slot('wpp')
                          @slot('number')
                            {{ $register->telephone }}
                          @endslot
                          @slot('msg')
                            Olá, {{ $register->name }}. Tudo bem?
                          @endslot
                      @endslot
                      @endcomponent
                  </td>
                  <td>
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

