<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{


    public function index(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        return view('frontend.subscribe.index', compact('plan'));
    }

    public function register(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        if (!$plan) {
            return redirect()->back()->with('planError', 'طرح مورد نظر شمار معتبر نمیباشد');
        }

        $plans_days_count = $plan->plan_days_count;
        $expired_at = Carbon::now()->addDays($plans_days_count);

        $subscribeDate = [
            'subscrib_user_id' => 1,
            'subscrib_plan_id' => $plan_id,
            'subscrib_download_limit' => $plan->plan_limit_download_count,
            'subscrib_created_at' => Carbon::now(),
            'subscrib_expire_at' => $expired_at
        ];
            Subscribe::create($subscribeDate);
            // return redirect()->route('some.route.name')->with('success', 'Subscription created successfully!');
     
    }




}
