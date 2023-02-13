<?php

namespace TomatoPHP\TomatoCms\Http\Requests\Block;

use Illuminate\Foundation\Http\FormRequest;

class BlockUpdateRequest extends FormRequest
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
                        'title' => 'nullable|max:255|string',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'description' => 'nullable|max:255|string',
            'body' => 'nullable|max:255|string',
            'button' => 'nullable|max:255|string',
            'url' => 'nullable|max:255|string',
            'key' => 'sometimes|max:255|string',
            'html' => 'nullable'
        ];
    }
}
