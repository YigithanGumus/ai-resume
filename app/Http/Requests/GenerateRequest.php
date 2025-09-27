<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cv' => 'required|array',
            'language' => 'nullable|string|in:en,tr',
            'template' => 'nullable|string|in:modern,minimalist,classic',
        ];
    }

    public function messages()
    {
        return [
            'cv.required' => 'CV bilgisi zorunludur.',
            'cv.array' => 'CV bilgisi JSON formatında olmalıdır.',
            'language.in' => 'Dil yalnızca EN veya TR olabilir.',
            'template.in' => 'Geçersiz şablon seçtiniz.',
        ];
    }
}
