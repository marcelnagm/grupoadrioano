<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatementRequest extends FormRequest
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
			'user_id' => 'required',
			'account_id' => 'required',
			'agency_id' => 'required',
			'value' => 'required',
			'deposit_account_id' => 'required',
			'deposit_agency_id' => 'required',
			'date' => 'required',
			'type_operation_id' => 'required',
        ];
    }
}
