<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentalEstimate extends FormRequest
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
            'property_id'               => ['required', 'integer'],
            'name'                      => ['required', 'string'],
            'description'               => ['nullable', 'string'],
            'arv'                       => ['nullable', 'numeric'],
            'purchase_price'            => ['required', 'numeric'],
            'repairs'                   => ['nullable', 'numeric'],
            'financed'                  => ['nullable', 'boolean'],
            'total_loan_amount'         => ['nullable', 'numeric'],
            'interest_rate'             => ['nullable', 'numeric'],
            'term'                      => ['nullable', 'integer'],
            'rental_arv'                => ['required', 'numeric'],
            'other_income'              => ['nullable', 'numeric'],
            'annual_taxes'              => ['nullable', 'numeric'],
            'insurance'                 => ['nullable', 'numeric'],
            'hoa_term'                  => ['nullable', Rule::in(['annual', 'monthly'])],
            'hoa'                       => ['nullable', 'numeric'],
            'use_property_management'   => ['nullable', 'boolean'],
            'property_management_fee'   => ['nullable', 'numeric'],
            'capital_expenditures'      => ['nullable', 'numeric'],
            'vacancy'                   => ['nullable', 'numeric'],
            'monthly_repairs'           => ['nullable', 'numeric'],
        ];
    }
}
