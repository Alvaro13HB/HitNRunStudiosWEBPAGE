<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function downloadGame()
    {
        $filePath = 'Guerrena.exe';
        $disk = "public";

        if (!Storage::disk($disk)->exists($filePath)) {
            abort(404, 'The requested file was not found.');
        }

        $absolutePath = Storage::disk($disk)->path($filePath);

        $fileName = 'Guerrena.exe';

        return response()->download($absolutePath, $fileName);
    }
}
