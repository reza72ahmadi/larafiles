<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="{{ !isset($user) ? route('admin.users.store') : route('admin.users.update', $user->id) }}"
            method="post">
            @csrf

            <div class="form-group">
                <label for="full_name">نام کامل:</label>
                <input type="text" class="form-control" name="full_name" id="full_name"
                    value="{{ old('full_name', isset($user->full_name) ? $user->full_name : '') }}">
            </div>
            <div class="form-group">
                <label for="email"> ایمیل:</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', isset($user->email) ? $user->email : '') }}">
            </div>
            @if(!isset($user))
            <div class="form-group">
                <label for="password">کلمه عبور :</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off">
            </div>
            @endif
            <div class="form-group">
                <label for="role">رول :</label>
                <select class="form-control" name="role" id="role">
                    <option value="1" {{ isset($user) && $user->role == 1 ? 'selected' : '' }}>کابرعادی</option>
                    <option value="2" {{ isset($user) && $user->role == 2 ? 'selected' : '' }}>اپراتور</option>
                    <option value="3" {{ isset($user) && $user->role == 3 ? 'selected' : '' }}>مدیر</option>
                </select>
            </div>
            <div class="form-group">
                <label for="wallet"> موجودی کیف پول:</label>
                <input type="text" class="form-control" name="wallet" id="wallet"
                    value="{{ old('wallet', isset($user->wallet) ? $user->wallet : '') }}">
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" value="ذخیره اطلاعات" name="submit_save_user">
            </div>
        </form>
    </div>
</div>
