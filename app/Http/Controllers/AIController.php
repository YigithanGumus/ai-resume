<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use App\Services\PdfExportService;

class AIController extends Controller
{
    protected $openAI;
    protected $pdf;

    public function __construct(OpenAIService $openAI, PdfExportService $pdf)
    {
        $this->openAI = $openAI;
        $this->pdf = $pdf;
    }

    public function exportPdf(Request $request)
    {
        $request->validate([
            'language' => 'required|string|in:en,tr',
            'template' => 'nullable|string|in:modern,minimalist,classic',
            'design'   => 'nullable|string',
            'cv'       => 'required|array',
        ]);

        $cv     = $request->cv;
        $style  = $request->template ?? 'modern';
        $design = $request->design ?? 'Profesyonel ve modern bir CV istiyorum.';

        // GPT'den HTML template üret
        $html = $this->openAI->generateHtmlTemplate($cv, $style, $design);

        // PDF üret
        return $this->pdf->fromHtml($html);
    }
}
