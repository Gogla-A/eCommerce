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
            'photo' => 'required|',
            'details' => 'required|max:255'
        ];
    }

    public function messages(): array {
        return [
          'name.required' => __('messages.Offer Name Is Required'),
            'name.unique' => __('messages.Already exists'),
          'photo.required' => __('messages.Offer Photo Is Required'),
            'photo.unique' => __('messages.Already exists'),
            'price.required' =>  __('messages.Offer Price Is Required'),
            'price.numeric' => __('messages.Must be a number'),
            'details.required' =>  __('messages.Offer Details Are Required'),
            'details.max' => __('messages.Must be less than 255 characters'),
        ];
    }
}
