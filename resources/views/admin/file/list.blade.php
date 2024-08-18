@extends('layouts.admin')
@section('content')
<input class="form-control" id="myInput" type="text" placeholder="جستجو..">
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>نوع فایل</th>
                <th>اندازه فایل</th>
                <th>نام فایل</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($files as $key => $file)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $file->file_title }}</td>
                    <td>{{ $file->file_type }}</td>
                    <td>{{ $file->file_size }}</td>
                    <td>{{ $file->file_name }}</td>
                    <td>
                        <a href="{{ route('admin.filse.destroy', $file->file_id) }}"><i class="fa fa-trash"></i></a>
                        &NonBreakingSpace;
                        <a href="{{ route('admin.files.edit', $file->file_id) }}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection