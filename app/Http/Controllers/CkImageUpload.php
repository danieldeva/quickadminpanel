<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkImageUpload extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('ck-editor', 'public');
            $url = asset('storage/'.$fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
