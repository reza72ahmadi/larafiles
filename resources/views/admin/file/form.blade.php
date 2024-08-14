<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="{{ !isset($file) ? route('admin.files.store') : route('admin.files.update', $file->id) }}"
            method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="file_title">عنوان فایل:</label>
                <input type="text" class="form-control" name="file_title" id="file_title"
                    value="{{ old('file_title', isset($file->file_title) ? $file->file_title : '') }}">
            </div>
            <div class="form-group">
                <label for="file_description"> توضیحات فایل:</label>
                <textarea name="file_description" class="form-control" id="file_description" cols="30" rows="10">
                {{ old('file_description', isset($file->file_description) ? $file->file_description : '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="file_title">فایل:</label>
               <input type="file" name="file_item">
            </div>
            {{-- <div class="form-group">
                <label for="file_size">اندازه فایل:</label>
                <input type="file_size" class="form-control" name="file_size" id="file_size"
                    value="{{ old('file_size', isset($file->file_size) ? $file->file_size : '') }}">
            </div> --}}

            {{-- @if (isset('file'))
                <div class="form-group">
                    <label for="file_type"> نوع فایل:</label>
                    <input type="file_type" class="form-control" name="file_type" id="file_type"
                        value="{{ old('file_type', isset($file->file_type) ? $file->file_type : '') }}">
                </div>
               
                <div class="form-group">
                    <label for="file_name"> نام فایل:</label>
                    <input type="file_name" class="form-control" name="file_name" id="file_name"
                        value="{{ old('file_name', isset($file->file_name) ? $file->file_name : '') }}">
                </div>
            @endif --}}
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" value="ذخیره اطلاعات" name="submit_save_user">
            </div>
        </form>
    </div>
</div>
