@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="btn-close float-start" data-bs-dismiss="alert"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
