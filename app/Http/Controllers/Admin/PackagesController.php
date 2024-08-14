<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.list', compact('packages'))->with('panel_title', 'لیست دسته بندیها');
    }

    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.package.create', compact('categories'));
    }


    // store
    public function store(Request $request)
    {
        $new_package = Package::create([
            'package_title' => $request->package_title,
            'package_price' => $request->package_price,
        ]);
        if ($new_package) {
            if ($request->has('categories')) {
                $new_package->categories()->sync($request->input('categories'));
            }
            return redirect()->route('admin.packages.list')->with('success', 'پکیج موفقانه ثبت شد');
        }
    }

    // edit
    public function edit(Request $request, $package_id)
    {
        $packageItem = Package::findOrFail($package_id);

        $categories = Category::all();

        $package_categories = $packageItem->categories()->pluck('id')->toArray();


        return view('admin.package.edit', compact('package_categories', 'packageItem', 'categories'));
    }

    // update
    public function update(Request $request, $package_id)
    {
        $package_item = Package::find($package_id);
        if ($package_item) {
            $package_item->update([
                'package_title' => $request->package_title,
                'package_price' => $request->package_price,
            ]);
            if ($request->has('categories')) {
                $package_item->categories()->sync($request->input('categories'));
            }
            return redirect()->route('admin.packages.list')->with('success', 'دسته بندی با موفقیت ویرایش شد');
        }
    }

    // destroy
    public function destroy($package_id)
    {
        $package_item = Package::find($package_id);
        $package_item->delete();
        return redirect()->route('admin.packages.list')->with('success', 'دسته بندی با موفقیت حذف شد');
    }


    public function syncFiles()
    {
        $files = File::all();
        return view('admin.package.files', compact('files'))->with(['panel_title' => 'انتخاب فایهای پکیج']);
    }

    public function updateSyncFiles(Request $request, $package_id)
    {
        $package_item = Package::where('package_id', '=', $package_id)->first();

        $files = $request->input('files');

        if ($package_item && is_array($files) && count($files) > 0) {
            $package_item->files()->attach($files);
        }



        //     $files = File::all();
        //     return view('admin.package.files', compact('files'))->with(['panel_title' => 'انتخاب فایهای پکیج']);
    }
}
