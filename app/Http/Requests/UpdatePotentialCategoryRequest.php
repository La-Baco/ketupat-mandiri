<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePotentialCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('potential_category')->id ?? null;
        
        return [
            'name' => ['required', 'string', 'max:255', 'unique:potential_categories,name,' . $id],
            'description' => ['nullable', 'string'],
        ];
    }
}
