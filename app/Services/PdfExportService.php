<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportService
{
    public function generatePdf(string $resume, string $coverLetter, string $template = 'modern')
    {
        $view = in_array($template, ['modern', 'minimalist', 'classic']) ? $template : 'modern';

        $pdf = Pdf::loadView("pdf.$view", [
            'resume' => $resume,
            'coverLetter' => $coverLetter,
        ])->setPaper('a4');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'resume-coverletter.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
