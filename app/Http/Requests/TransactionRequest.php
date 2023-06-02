<?php

namespace App\Http\Requests;

use App\Enums\TransactionStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\TransactionCategory;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer',
                Rule::exists((new TransactionCategory)->getTable(), 'id')
                    ->where('type', $this->get('type')),
            ],
            'type' => [
                'required',
                'string',
                Rule::in(['income', 'expense'])
            ],
            'amount' => ['required', 'gt:0'],
        ];
    }
}
