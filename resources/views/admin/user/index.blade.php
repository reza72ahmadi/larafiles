@extends('layouts.admin')
@section('content')
<input class="form-control" id="myInput" type="text" placeholder="جستجو..">
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>موجودی</th>
                <th>تعداد پکیج های خریداری شده</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if ($users && count($users) > 0)
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->wallet }}</td>
                        <td>{{ $user->packages()->count() }}</td>
                        <td>
                            <a href="{{ route('admin.users.destroy', $user->id) }}"><i class="fa fa-trash"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                            &NonBreakingSpace;
                            <a title="نمایش لیست خریداری شده" href="{{ route('admin.users.packages', $user->id) }}"><i
                                    class="fa fa-list"></i></a>
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
