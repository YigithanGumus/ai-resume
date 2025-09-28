<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(config('services.openai.key'));
    }

    public function generateHtmlTemplate(array $cv, string $style = 'modern', string $design = ''): string
    {
        $cvJson = json_encode($cv, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $prompt = <<<EOT
You are a professional HTML/CSS designer for resumes.
Generate ONLY a professional Resume (no cover letter).
Language: {$style}
User design request: "{$design}"

Input CV data (JSON):
{$cvJson}

Rules:
- Create an outstanding, visually impressive CV layout based on the user's request.
- Must look like a real designer-made CV, not plain HTML.
- Left column (if exists): contact info, skills, summary. Use icons (☎ ✉ 🌍).
- Right column: professional summary, experience, education, projects, languages.
- Use background colors, highlights (#2563eb or requested colors), subtle shadows, spacing.
- Skills should be shown with progress bars or styled badges.
- Add placeholder for a profile photo (circle at top-left).
- Use inline CSS only (Browsershot compatible), UTF-8 safe.
- Do not include Markdown or code fences.
- Return full valid HTML (<html>...</html>).
EOT;

        $response = $this->client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => "You generate professional PDF-ready HTML resumes."],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $html = $response->choices[0]->message->content ?? '';

        // Kod bloklarını temizle
        $html = preg_replace('/^```html/i', '', $html);
        $html = preg_replace('/```$/i', '', $html);
        $html = trim($html);

        return $html;
    }
}
