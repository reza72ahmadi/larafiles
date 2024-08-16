@extends('layouts.frontend')

@section('content')
    <div class="col-xs-9 col-md-9">
        <div class="card">
            <div class="card-header">مشاهده جزئیات فایل</div>
            <div class="card-body">
                <p>عنوان : {{ $file_item->file_title }}</p>
                <p>توضیحات فایل : {{ $file_item->file_description }}</p>
                <p>نوع فایل : {{ $file_item->File_Type_Text }}</p>
                <span>تاریخ ایجاد :</span>
                <span>{{ $file_item->created_at }}</span>
            </div>
        </div>
    </div>

    <div class="col-xs-3 col-md-3">
        <div class="card">
            <div class="card-header">خرید فایل</div>
            <div class="card-body">
                @if (App\Utility\User::is_user_subscribed($current_user))
                    <a href="">دانلود فایل</a>
                    {{-- {{ route('download.file', ['file_id' => $file_item->id]) }} --}}
                    {{-- {{ route('purchase.file', ['file_id' => $file_item->id]) }} --}}
                @else
                    <form action="" method="post">
                        @csrf
                        <button class="btn btn-success btn-lg btn-block">خرید این فایل</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
