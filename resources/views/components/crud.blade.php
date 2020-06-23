<div class="row">
    @if (isset($view))
        <div class="col-4 text-center">
        <a href="{{ route('viewCrud', ['url' => $url, 'id' => $id] )}}" class="btn btn-info btn-sm text-light">
                <i class="fas fa-eye"></i>
            </a>
        </div>
    @endif

    @if (isset($edit))
        <div class="col-4 text-center">
            <a href="{{ route('editCrud', ['url' => $url, 'id' => $id] )}}" class="btn btn-sm btn-primary btn-sm">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    @endif

    @if (isset($delete))
        <div class="col-4 text-center">
            <form action="{{ route('viewCrud', ['url' => $url, 'id' => $id] )}}" method="POST" onSubmit="if(!confirm('Você quer realmente deletar este registro?')){return false;}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    @endif

    @if (isset($wpp))
        <div class="col-4 text-center">
        <a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$number}}&text={{$msg}}" target="_blank" class="btn btn-success btn-sm">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    @endif

    @if (isset($viewPage))
        <div class="col-4 text-center">
        <a href="/painel/campaign/view/{{$url}}" target="_blank" class="btn btn-success btn-sm">
                <i class="fas fa-link"></i>
            </a>
        </div>
    @endif
</div>
