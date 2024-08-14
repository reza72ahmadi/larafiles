<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        {{-- {{ !isset($plan_title) ? route('admin.plans.store') : route('admin.plans.update', $plan->plan_id) }} --}}
        <form action=""method="post">
            @csrf
            <div class="form-group">
                <label for="category_name">عنوان :</label>
                <input type="text" class="form-control" name="category_name" id="category_name"
                    value="{{ old('category_name', isset($catItem->category_name) ? $catItem->category_name : '') }}">
            </div>

            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" value="ذخیره اطلاعات" name="submit_save_user">
            </div>
        </form>
    </div>
</div>
