<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GenerateRequest;
use App\Services\OpenAIService;
use App\Services\PdfExportService;

class AIController extends Controller
{
    protected $openAI;
    protected $pdfExport;

    public function __construct(OpenAIService $openAI, PdfExportService $pdfExport)
    {
        $this->openAI = $openAI;
        $this->pdfExport = $pdfExport;
    }

    public function generate(GenerateRequest $request)
    {
        $data = $this->openAI->generateResumeAndCover(
            $request->cv,
            $request->language ?? 'en'
        );

        return response()->json($data);
    }

    public function exportPdf(GenerateRequest $request)
    {
        $data = $this->openAI->generateResumeAndCover(
            $request->cv,
            $request->language ?? 'en'
        );

        return $this->pdfExport->generatePdf(
            $data['resume'],
            $data['cover_letter'],
            $request->template ?? 'modern'
        );
    }
}
