<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('manage-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'details' => ['required', 'array', 'min:1'],
            'details.*.product_id' => [
                'required',
                Rule::exists('stocks', 'product_id')
                    ->where('kopdes_id', $this->user()->admins()->value('kopdes_id')),
            ],
            'details.*.total' => ['required', 'integer', 'min:1'],
        ];
    }
}
