<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {

        $plans = Plan::all();
        return view('admin.plan.list', compact('plans'))->with('panel_title', "لیست طرح ها");
    }

    public function create()
    {
        return view('admin.plan.create')->with('panel_title', "ایجاد طرح جدید");
    }


    public function store(Request $request)
    {
        $request->validate([
            'plan_title' => 'required|string|max:255',
            'plan_limit_download_count' => 'required|integer',
            'plan_price' => 'required|numeric',
            'plan_days_count' => 'required|integer',
        ], [
            'plan_title.required' => 'وارد کردن طرح الزام است',
            'plan_limit_download_count.required' => 'محدودیت دانلود روزانه الزامی است',
            'plan_price.required' => 'قیمت الزامی است',
            'plan_days_count.required' => 'تعداد روز اعتبار الزامی است',
        ]);

        Plan::create($request->only(['plan_title', 'plan_limit_download_count', 'plan_price', 'plan_days_count']));

        return redirect()->route('admin.plans.list')->with('success', 'طرح با موفقیت ذخیره شد');
    }

    public function edit(string $id)
    {
        $planItem = Plan::find($id);
        return view('admin.plan.edit', compact('planItem'));
    }

    public function update(Request $request, string $id)
    {
        $plan_data =  Plan::findOrfail($id);
        $updated_plan = $plan_data->update([
            'plan_title' => $request->plan_title,
            'plan_limit_download_count' => $request->plan_limit_download_count,
            'plan_price' => $request->plan_price,
            'plan_days_count' => $request->plan_days_count,
        ]);
        if ($updated_plan) {
            return redirect()->route('admin.plans.list')->with('success', 'طرح با موفقیت ویرایش شد');
        }
    }

    public function destroy(string $id)
    {
        $planItem = Plan::findOrfail($id);
        if ($planItem) {
            $planItem->delete();
        }
        return redirect()->route('admin.plans.list')->with('success', 'طرح با موفقیت حذف شد');
    }
}
