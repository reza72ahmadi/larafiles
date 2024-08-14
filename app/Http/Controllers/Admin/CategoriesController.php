<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'))->with(['panel_title' => 'لیست دسته بندی ها']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create')->with(['panel_title' => 'ایجاد دسته بندی ']);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        $new_category = Category::create([
            'category_name' => $request->category_name,
        ]);
        if ($new_category) {
            return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت انجام شد');
        }
        return redirect()->back()->with('error', 'دسته بندی ایجاد نشد');
    }

    public function edit(Request $request, $category_id)
    {
        $catItem = Category::find($category_id);
        return view('admin.category.edit', compact('catItem'))->with('panel_title', 'ویرایش دسته بندی');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category_id)
    {
        $catItem = Category::find($category_id);
        $updagted =  $catItem->update([
            'category_name' => $request->category_name,
        ]);
        if ($updagted) {
            return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت ویرایش شد');
        }
        return redirect()->back()->with('error', 'دسته بندی ویرایش نشد');
    }

    public function destroy(string $category_id)
    {
        // $catItem = Category::find($category_id);
        // $catItem->delete();
        
        $remove_result = Category::destroy($category_id);
        if ($remove_result) {
            return redirect()->route('admin.categories.list')->with('success', 'دسته بندی با موفقیت حذف شد');
        }
    }
}
