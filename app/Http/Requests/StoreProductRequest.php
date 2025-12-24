<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|string',
            'category_id' => 'required|numeric',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'count' => 'required|numeric',
            'guaranty' => 'required|string',
            'brand_id' => 'required|numeric',
            'colors' => 'required|array',
            'is_economy' => "in:yes,no",
        ];
    }
}
