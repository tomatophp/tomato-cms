<?php

namespace TomatoPHP\TomatoCms\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'categories' => 'required|array|min:1',
            'title' => 'sometimes|max:255|string',
            'image' => 'sometimes|file|image|max:2048',
            'slug' => 'sometimes|max:255|string|unique:contents,slug,' . $this->route()->parameter('model')->id,
            'body' => 'sometimes',
            'short_description' => 'nullable|max:65535',
            'published' => 'nullable',
            'published_at' => 'nullable|date',
            'featured' => 'nullable'
        ];
    }
}
