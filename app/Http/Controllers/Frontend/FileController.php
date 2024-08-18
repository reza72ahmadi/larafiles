<?php

namespace App\Http\Controllers\Frontend;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function details(Request $request, $file_id)
    {
        $file_item = File::where('file_id', $file_id)->first();
        $current_user = 1;
        return view('frontend.files.single', compact('file_item', 'current_user'));
    }

    // public function download($file_id)
    // {
    //     $user = 1;
    //     if (!\App\Utility\File::user_can_download($user)) {
    //         return redirect()->route('frontend.files.access');
    //     }

    //     $fileItem = File::find($file_id);
    //     if (!$fileItem) {
    //         return redirect()->back()->with('fileError', 'فایل در خواستی معتبر نمیباشد');
    //     }
    //     $basePath = public_path('images\\');
    //     $filePath = $basePath . $fileItem->file_name;
    //     return response()->download($filePath);
    // }
//
public function download($file_id)
{
    $user = 1;
    if (!\App\Utility\File::user_can_download($user)) {
        return redirect()->route('frontend.files.access');
    }

    $fileItem = File::find($file_id);
    if (!$fileItem) {
        return redirect()->back()->with('fileError', 'فایل درخواستی معتبر نمی‌باشد');
    }

    // Use DIRECTORY_SEPARATOR for cross-platform compatibility
    $basePath = public_path('images' . DIRECTORY_SEPARATOR);
    $filePath = $basePath . $fileItem->file_name;

    // Ensure file exists before attempting download
    if (!file_exists($filePath)) {
        return redirect()->back()->with('fileError', 'فایل یافت نشد.');
    }

    return response()->download($filePath);
}

//

    public function access()
    {
        return view('frontend.files.access');
    }
}
