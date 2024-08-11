<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrixUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('trix-images', 'public');
            return response()->json(['url' => Storage::url($path)]);
        }

        return response()->json(['error' => 'File not found.'], 404);
    }
}

