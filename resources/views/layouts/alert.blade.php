@if ($message = Session::get('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Consistency Score: </strong>{{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif