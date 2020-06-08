@if (isset($add))
<div class="form-group">
    <a href="{{ route('createCrud', ['url' => $url] )}}" class="btn btn-success">
        <i class="fas fa-plus"></i> {{ $action }}
    </a>
</div>
@endif
