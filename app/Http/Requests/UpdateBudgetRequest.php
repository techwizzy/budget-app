<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'budget_title' => 'required|unique:budgets|max:255',
            'budget_amount' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date'
        ];
    }
}
