<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|string|max:255',
            'content' => 'required',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'short_description.required' => 'Vui lòng nhập mô tả ngắn.',
            'short_description.string' => 'Mô tả ngắn phải là một chuỗi ký tự.',
            'short_description.max' => 'Mô tả ngắn không được vượt quá 255 ký tự.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'img_url.image' => 'Tệp tải lên phải là một hình ảnh.',
            'img_url.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'img_url.max' => 'Hình ảnh không được vượt quá 2048 KB.',
        ];
    }
}
