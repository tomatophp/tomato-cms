<?php

namespace TomatoPHP\TomatoCms\Http\Requests\Seo;

use Illuminate\Foundation\Http\FormRequest;

class SeoUpdateRequest extends FormRequest
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
                        'model_id' => 'nullable',
            'model_type' => 'nullable|max:255|string',
            'title' => 'sometimes|max:255|string',
            'description' => 'nullable|max:65535',
            'keywords' => 'nullable|max:65535',
            'share' => 'nullable',
            'likes' => 'nullable',
            'views' => 'nullable'
        ];
    }
}
