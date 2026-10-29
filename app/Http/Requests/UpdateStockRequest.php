<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStockRequest extends FormRequest
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
        $kopdesId = $this->user()->admins()->value('kopdes_id');
        
        return [
            'product' => [
                'required',
                'exists:products,id',
                Rule::unique('stocks', 'product_id')
                    ->ignore($this->route('stock'))
                    ->where(fn ($query) => $query->where('kopdes_id', $kopdesId)),
            ],
            'total' => ['required', 'integer', 'min:0'],
        ];
    }
}
