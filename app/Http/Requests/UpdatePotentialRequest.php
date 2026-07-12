<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePotentialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if ($this->has('title')) {
            $this->merge(['slug' => Str::slug($this->title)]);
        }
    }

    public function rules(): array
    {
        $id = $this->route('potential')->id ?? null;
        
        return [
            'potential_category_id' => ['required', 'exists:potential_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'unique:potentials,slug,' . $id],
            'excerpt' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'address' => ['nullable', 'string', 'max:255'],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'google_maps_url' => ['nullable', 'url'],
            'is_featured' => ['boolean'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:potential_tags,id'],
        ];
    }
}
