<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function downloadExistingPdf()
    {
        $filePath = 'autodabarcadoinferno.pdf';

        if (!Storage::exists($filePath)) {
            abort(404, 'The requested PDF file was not found.');
        }

        $absolutePath = Storage::path($filePath);

        $fileName = 'Auto da Barca do Inferno - Gil Vicente.pdf';

        return response()->download($absolutePath, $fileName);
    }
}