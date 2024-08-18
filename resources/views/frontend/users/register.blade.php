@extends('layouts.frontend')

@section('content')
    <div class="col-xs-6 col-md-6 mt-4 mx-auto">
        <div class="card">
            <div class="card-header">ثبت نام به سایت</div>
            <div class="card-body">
                @if (session('loginError'))
                    <div class="alert alert-danger">
                        <p>{{ session('registerError') }}</p>
                    </div>
                @endif
                <form action="{{ route('post.register') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">نام:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">ایمیل:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">رمز عبور:</label>
                        <input type="password" class="form-control" id="pwd" name="pswd">
                    </div>
                    <button type="submit" class="btn btn-success">وردود</button>
                </form>
            </div>
        </div>
    </div>
@endsection
