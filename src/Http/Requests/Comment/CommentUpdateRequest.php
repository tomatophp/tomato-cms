<?php

namespace TomatoPHP\TomatoCms\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
                        'account_id' => 'sometimes|exists:accounts,id',
            'parent_id' => 'nullable|exists:comments,id',
            'model_id' => 'sometimes',
            'model_type' => 'sometimes|max:255|string',
            'comment' => 'sometimes|max:65535',
            'active' => 'sometimes'
        ];
    }
}
