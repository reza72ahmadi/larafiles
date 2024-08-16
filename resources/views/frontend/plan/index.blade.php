@extends('layouts.frontend')

@section('content')
    <div class="col-xs-12 col-md-12">
        <div class="card">
            <div class="card-header">طرح های اشتراکی</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form_group">

                    </div>
                </form>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>قیمت</th>
                            <th>تعداد روز</th>
                            <th>محدودیت دانلود</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($plans && count($plans) > 0)
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->plan_title }}</td>
                                    <td>{{ $plan->plan_limit_download_count }}</td>
                                    <td>{{ $plan->plan_price }}</td>
                                    <td>{{ $plan->plan_days_count }}</td>
                                    <td>
                                        <a href="{{ route('frontend.subscribe.index', [$plan->plan_id]) }}"
                                            class="btn btn-success">خرید </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
