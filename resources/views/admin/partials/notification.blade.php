@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="btn-close float-start" data-bs-dismiss="alert"></button>
        <p>{{ session('success') }}</p>
    </div>
@endif
