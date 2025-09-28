<?php

namespace App\Services;

use Spatie\Browsershot\Browsershot;

class PdfExportService
{
    public function fromHtml(string $html)
    {
        $tempHtml = storage_path('app/temp_resume.html');
        $pdfPath  = storage_path('app/resume-coverletter.pdf');

        file_put_contents($tempHtml, $html);

        Browsershot::html(file_get_contents($tempHtml))
            ->format('A4')
            ->showBackground()
            ->margins(20, 20, 20, 20)
            ->waitUntilNetworkIdle()
            ->save($pdfPath);

        return response()->download($pdfPath, 'resume.pdf', [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="resume.pdf"',
        ])->deleteFileAfterSend(true);
    }
}
