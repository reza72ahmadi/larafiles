@extends('layouts.admin')
@section('content')
    @include('admin.partials.notification')

    @if ($files && count($files) > 0)
        <form action="" method="post">
            @csrf
            <ul>
                @foreach ($files as $file)
                    <li>
                        <input name="files[]" type="checkbox" value="{{ $file->id }}">
                        {{ $file->file_title }}
                    </li>
                @endforeach
            </ul>
            <div>
                <input type="submit" class="btn btn-success" name="submit_package_files" value="ذخیره اطلاعات">
            </div>
        </form>
    @endif
@endsection
