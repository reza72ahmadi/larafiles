@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>پکیج</th>
                <th>مبلغ پرداخت شده</th>
                <th>تاریخ پرداخت شده</th>
            </tr>
        </thead>
        <tbody>
            @if ($user_packages && count($user_packages) > 0)
                @foreach ($user_packages as $package)
                    <tr>
                        <td>{{ $package->package_title }}</td>
                        <td>{{ $package->pivot->amount }}</td>
                        <td>{{ $package->created_at->format('Y-m-d H:i') }}</td> <!-- Formatting the date -->
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">هیچ پکیجی یافت نشد.</td> <!-- Message for no packages -->
                </tr>
            @endif
        </tbody>
    </table>

    {{-- <table class="table">
        <thead>
            <tr>
                <th>پکیج</th>
                <th>مبلغ پرداخت شده</th>
                <th>تاریخ پرداخت شده</th>
            </tr>
        </thead>

        <tbody>
            @if ($user_packages && count($user_packages) > 0)
                @foreach ($user_packages as $package)
                    <tr>
                        <td>{{ $package->package->id }}</td>
                        <td>{{ $package->package->amount }}</td>
                        <td>{{ $package->package->created_at }}</td>
                    </tr>
        </tbody>
        @endforeach
        @endif
    </table> --}}
@endsection
