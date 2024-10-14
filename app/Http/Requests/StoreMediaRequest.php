<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
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
            'name' => 'required|max:15',
            'category' => 'required|exists:categories,id',
            'slugs.*' => 'required|exists:slugs,id',
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,wav,mkv|max:512000',
        ];
    }
}
