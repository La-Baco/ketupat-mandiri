<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePotentialTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('potential_tag')->id ?? null;
        
        return [
            'name' => ['required', 'string', 'max:255', 'unique:potential_tags,name,' . $id],
        ];
    }
}
