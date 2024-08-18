<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function details(Request $request, $file_id)
    {
        $file_item = File::find($file_id);
        $current_user = 1;
        return view('frontend.files.single', compact('file_item', 'current_user'));
    }

    public function download(Request $request, $file_id)
    {
        // dd('working');
        }

 
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
