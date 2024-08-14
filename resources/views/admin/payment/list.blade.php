@extends('layouts.admin')
@section('content')
    @include('admin.user.notification')
    <table class="table">
        <thead>
            <tr>
                <th>کاربر</th>
                <th>مبلغ</th>
                <th>نوع</th>
                <th>بانک</th>
                <th>شماره روز</th>
                <th>شماره ارجاع</th>
                <th>تاریخ پرداخت</th>
                <th>وضعیت</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @if ($payments && count($payments) > 0)
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->user->full_name }}</td>
                        <td>{{ number_format($payment->payment_amount) }}</td>
                        <td>{{ $payment->payment_method_format() }}</td>
                        <td>{{ $payment->payment_gateway_name }}</td>
                        <td>{{ $payment->payment_res_num }}</td>
                        <td>{{ $payment->payment_ref_id }}</td>
                        <td>{{ $payment->payment_created_at }}</td>
                        {{-- <td>{{ $payment->payment_updated_at  }}</td> --}}

                        <td>{{ $payment->payment_status() }}</td>
                        {{-- <td>
                            <a href="{{ route('admin.payments.destroy', $payment->payment_id) }}"><i class="fa fa-trash"></i></a>
                            &NonBreakingSpace;
                            <a href="{{ route('admin.payments.edit', $payment->payment_id) }}"><i class="fa fa-edit"></i></a>

                        </td> --}}
                    </tr>
                @endforeach
            @else
                @include('admin.partials.nothing')
            @endif
        </tbody>
    </table>
@endsection
