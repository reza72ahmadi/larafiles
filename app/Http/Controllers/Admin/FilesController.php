<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;

class FilesController extends Controller
{
    public function index()
    {
        //$files = File::paginate(2);
        $files = File::all();
        return view('admin.file.list', compact('files'))->with('panel_title', 'لیست فایلها');
    }

    public function create()
    {
        return view('admin.file.create')->with(['panel_title' => 'ایجاد فایل جدید']);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_title' => 'required',
            'file_item' => 'required',
        ], [
            'file_title.required' => 'وارد کردن نام فایل الزامی میباشد',
            'file_item.required' => 'انتخاب فایل الزامی میباشد',
        ]);

        $file = $request->file('file_item');
        $new_file_data = [
            'file_title' => $request->input('file_title'),
            'file_description' => $request->input('file_description'),
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'file_name' => $file->getFilename(),
        ];

        $new_file_name = $file->storeAs('files', $file->getClientOriginalName());
        $result = $request->file('fileItem')->move(public_path('imges'), $new_file_name);
        if ($result instanceof \Symfony\component\HttpFoundation\File\File) {
            $new_file_date['file_name'] = $new_file_name;
        }
        File::create($new_file_data);
        return redirect()->route('admin.files.list')->with('success', 'فایل جدید با موفقیت ذخیره شد');
    }


    public function edit(string $id)
    {
        $file = File::find($id);
        return view('admin.file.edit', compact('file'))->with(['panel_title' => 'ویرایش فایل ']);
    }
}
