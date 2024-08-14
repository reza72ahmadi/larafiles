@extends('layouts.admin')
@section('content')
    <input class="form-control" id="myInput" type="text" placeholder="جستجو..">
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if ($categories && count($categories) > 0)
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.destroy', $category->id) }}"><i class="fa fa-trash"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>

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
