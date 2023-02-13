<?php

namespace TomatoPHP\TomatoCms\Http\Requests\ContentsMeta;

use Illuminate\Foundation\Http\FormRequest;

class ContentsMetaUpdateRequest extends FormRequest
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
                        'content_id' => 'sometimes|exists:contents,id',
            'model_id' => 'nullable',
            'model_type' => 'nullable|max:255|string',
            'key' => 'sometimes|max:255|string',
            'value' => 'nullable'
        ];
    }
}
