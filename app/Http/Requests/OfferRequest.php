<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            //
            'name' => 'required|max:50|',
            'price' => 'required|numeric',
            'details' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return $messages =
            [
                'name.required' => __('messages.offer name required'),
                'name.max' => __('messages.name max'),
                'price.required' => __('messages.price required'),
                'price.numeric' => __('messages.price numeric'),
                'price.max' => __('messages.price max'),
                'details.required' => __('messages.details required')
            ];
    }
}
