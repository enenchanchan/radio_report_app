<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadioRequest extends FormRequest
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
            'radio_title' => ['required', 'string', 'max:255', 'unique:radios'],
            'radio_date' => ['required'],
            'start_time' => ['required',],
            'end_time' => ['nullable', 'after:start_time'],
            'broadcaster' => ['required', 'string', 'max:255'],
            'radio_about' => ['required',],
        ];
    }
}
