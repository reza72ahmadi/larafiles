@extends('layouts.admin')
@section('content')
    <input class="form-control" id="myInput" type="text" placeholder="جستجو..">
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>قیمت</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if ($packages && count($packages) > 0)
                @foreach ($packages as $key => $package)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $package->package_title }}</td>
                        <td>{{ $package->package_price }}</td>
                        <td>
                            <a href="{{ route('admin.packages.destroy', $package->package_id) }}"><i
                                    class="fa fa-trash"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.packages.edit', $package->package_id) }}"><i class="fa fa-edit"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.packages.sync_files', $package->package_id) }}"><i></i>فایل</a>
                        </td>
                    </tr>
                @endforeach
            @else
                @include('admin.partials.nothing')
            @endif
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
