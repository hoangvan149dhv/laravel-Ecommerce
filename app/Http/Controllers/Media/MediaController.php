<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\AbstractController;
use Illuminate\Http\Request;

class MediaController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function media(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
