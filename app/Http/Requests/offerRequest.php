<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:offers,name',
            'price' => 'required|numeric',
            'detail' => 'required|max:255'
        ];
    }

    public function messages(): array {
        return [
          'name.required' => 'offer name is required.',
            'name.unique' => 'offer name already exists.',
            'price.required' => 'price is required.',
            'price.numeric' => 'price must be a number.',
            'details.required' => 'details is required.',
            'details.max' => 'details must be less than 255 characters.',
        ];
    }
}
