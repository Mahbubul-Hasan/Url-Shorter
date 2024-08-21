<?php

namespace App\Http\Requests\ShortUrl;

use Illuminate\Foundation\Http\FormRequest;

class StoreShortUrlRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'original_url' => ['required', 'url:http,https'],
            'url_code'     => ['nullable', "min:6", "max:10", 'regex:/^\S*$/u', "unique:short_urls,url_code"],
            'expire'       => ['nullable', "numeric"],
        ];
    }

    public function saveRequest($about) {
        try {
            $about->update([
                'short_description' => $this->short_description,
                'description'       => $this->description,
            ]);

            return $this->responseMessage('success', "About page updated");
        } catch (\Throwable $th) {
            return $this->responseMessage('error', $th->getMessage());
        }
    }
}
