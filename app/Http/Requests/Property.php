<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Property extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // todo: Add logic for authorizing user to create.
        //       This may be moot b/c it will have middleware.
        //       At the same time, I can use this to make sure
        //       someone cannot edit another person's property.
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
            'street_address'        => ['required', 'string'],
            'city'                  => ['required', 'string'],
            'state_id'              => ['required', 'integer'],
            'zip'                   => ['required', 'string'],
            'bedrooms'              => ['integer', 'nullable'],
            'bathrooms'             => ['numeric', 'nullable'],
            'garages'               => ['integer', 'nullable'],
            'year_built'            => ['integer', 'nullable'],
            'living_square_footage' => ['integer', 'nullable'],
            'lot_square_footage'    => ['integer', 'nullable'],
            'neighborhood'          => ['string', 'nullable'],
        ];
    }
}
