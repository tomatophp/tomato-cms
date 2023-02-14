<?php

namespace TomatoPHP\TomatoCms\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentStoreRequest extends FormRequest
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
            'image' => 'sometimes|file|image|max:2048',
            'title' => 'required|max:255|string',
            'slug' => 'required|max:255|string|unique:contents,slug',
            'body' => 'required',
            'short_description' => 'nullable|max:65535',
            'published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'featured' => 'nullable|boolean'
        ];
    }
}
