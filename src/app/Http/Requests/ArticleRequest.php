<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'radio_id' => ['required'],
            'radio_date' => ['required', 'date'],
            'body' => ['required', 'max:1000'],
            'link' => ['url', 'nullable'],
        ];
    }
}
