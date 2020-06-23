@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        <img src="https://cursomarca.com.br/wp-content/uploads/2019/06/marca.png" width="150px">
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} - <a href="www.cursomarca.com.br">Curso Marca</a>. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
