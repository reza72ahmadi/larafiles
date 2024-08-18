@extends('layouts.frontend')

@section('content')
    <div class="col-xs-6 col-md-6 mt-4 mx-auto">
        <div class="card">
            <div class="card-header">ورود به سایت</div>
            <div class="card-body">
                @if (session('loginError'))
                    <div class="alert alert-danger">
                        <p>{{ session('loginError') }}</p>
                    </div>
                @endif
                <form action="{{ route('post.login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">ایمیل:</label>
                        <input type="email" class="form-control" id="email"  name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">رمز عبور:</label>
                        <input type="password" class="form-control" id="pwd"  name="password">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> مرا به خاطر پسبار
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
