<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        {{-- {{ !isset($plan_title) ? route('admin.plans.store') : route('admin.plans.update', $plan->plan_id) }} --}}
        <form action=""method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="package_title">عنوان :</label>
                <input type="text" class="form-control" name="package_title" id="package_title"
                    value="{{ old('package_title', isset($packageItem->package_title) ? $packageItem->package_title : '') }}">
            </div>
            <div class="form-group">
                <label for="package_price">قیمت:</label>
                <input type="number" class="form-control" name="package_price" id="package_price"
                    value="{{ old('package_price', isset($packageItem) ? $packageItem->package_price : '') }}">
            </div>
            <div class="form-group">
                <label for="package_price">دسته بندی ها:</label>
                <select class="form-control selected" name="categories[]" id="categories" multiple>

                    @if ($categories && count($categories) > 0)
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" @if (isset($packageItem) && in_array($cat->id, $package_categories)) selected @endif>
                                {{ $cat->category_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" value="ذخیره اطلاعات" name="submit_save_user">
            </div>
        </form>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $('select.selected').select2();
        });
    </script>
@endsection
