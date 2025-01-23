<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'is_active' => [
                'bail',
                'sometimes',
                'boolean',
            ],
            'parent_id' => [
                'bail',
                'sometimes',
            ],
            'name' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'slug' => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:categories,slug,',
            ],
            'description' => [
                'bail',
                'sometimes',
            ],
            'featured_image' => [
                'bail',
                'sometimes',
                'required',
                'image',
                'extensions:jpg,jpeg,png,webp',
                'mimetypes:image/jpg,image/jpeg,image/png,image/webp',
                'max:2048',
            ],
        ];
    }
}
