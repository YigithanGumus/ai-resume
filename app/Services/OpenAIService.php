<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function generateResumeAndCover(array $cv, string $language = 'en'): array
    {
        $prompt = $this->buildPrompt($cv, $language);

        $response = $this->client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => "You are a professional CV and cover letter writer."],
                ['role' => 'user', 'content' => $prompt],
            ],
            'temperature' => 0.7
        ]);

        $result = $response->choices[0]->message->content ?? '';

        // JSON çıktıyı yakalamak için
        $json = json_decode($result, true);

        if (json_last_error() === JSON_ERROR_NONE && isset($json['resume']) && isset($json['cover_letter'])) {
            return $json;
        }

        // fallback: regex parsing
        preg_match('/\[RESUME\](.*?)\[COVER LETTER\](.*)/s', $result, $matches);

        return [
            'resume' => trim($matches[1] ?? ''),
            'cover_letter' => trim($matches[2] ?? ''),
        ];
    }

    private function buildPrompt(array $cv, string $language): string
    {
        $cvJson = json_encode($cv, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return <<<EOT
You are given CV data in JSON:

$cvJson

Generate a professional Resume and Cover Letter in $language.
Return output strictly as JSON in this format:

{
  "resume": "...",
  "cover_letter": "..."
}
EOT;
    }
}
