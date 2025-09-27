<?php

use App\Services\PdfExportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

// Json'dan yapay zekaya gönderip size olması gereken bir çıktı verir.
// Route::post('/generate', [AIController::class, 'generate']);

Route::post('/export-pdf', [AIController::class, 'exportPdf']);

// Eğer hazır resume & cover_letter JSON'dan PDF üretmek istersen:
/*
Route::post('/export-ready-pdf', function (Request $request, PdfExportService $pdf) {
    $request->validate([
        'resume' => 'required|string',
        'cover_letter' => 'required|string',
        'template' => 'nullable|string|in:modern,minimalist,classic'
    ]);

    return $pdf->generatePdf(
        $request->resume,
        $request->cover_letter,
        $request->template ?? 'modern'
    );
});
*/
