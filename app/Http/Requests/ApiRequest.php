<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\FormRequest;

class ApiRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'provider' => 'required|in:itunes,tvmaze,crcind',
            'term' => 'required_if:provider,itunes|string',
            'media' => 'required_if:provider,itunes|in:music,movie,ebook',
            'q' => 'required_if:provider,tvmaze|string'
        ];
    }
}
