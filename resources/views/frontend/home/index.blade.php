@extends('layouts.frontend')

@section('content')
    <div class="col-xs-9">
        <div class="card">
            <div class="card-header">آخرین فایل های سیستم</div>
            <div class="card-body">
                @if ($files && count($files) > 0)
                    <ul>
                        @foreach ($files as $file)
                            <li> <a href="{{ route('frontend.files.details', $file->file_id) }}">{{ $file->file_title }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xs-9">
        <div class="card">
            <div class="card-header"> پکیج های سیستم</div>
            <div class="card-body">
                @if ($packages && count($packages) > 0)
                    <ul>
                        @foreach ($packages as $package)
                            <li> <a href="">{{ $package->package_title }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>
@endsection
