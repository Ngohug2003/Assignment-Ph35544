<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'categories.*.name' => 'required|string|max:255',
            'categories.*.slug' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'categories.*.name.required' => 'Tên loại tin là bắt buộc.',
            'categories.*.slug.required' => 'Slug là bắt buộc.',
        ];
    }
}
