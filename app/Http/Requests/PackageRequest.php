<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'short_title'       => 'required|string|max:100',
            'price'             => 'required|numeric',
            'discount_percent'  => 'nullable',
            'feature.*'         => 'required',
            'batch_id'         => 'required',
        ];
    }
}
