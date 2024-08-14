@extends('layouts.admin')
@section('content')
<input class="form-control" id="myInput" type="text" placeholder="جستجو..">
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>محدودیت دانلود</th>
                <th>قیمت</th>
                <th>تعداد روز اعتبار</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if ($plans && count($plans) > 0)
                @foreach ($plans as $key => $plan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $plan->plan_title }}</td>
                        <td>{{ $plan->plan_limit_download_count }}</td>
                        <td>{{ $plan->plan_price }}</td>
                        <td>{{ $plan->plan_days_count }}</td>
                        <td>
                            <a href="{{ route('admin.plans.destroy', $plan->plan_id) }}"><i class="fa fa-trash"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.plans.edit', $plan->plan_id) }}"><i class="fa fa-edit"></i></a>

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