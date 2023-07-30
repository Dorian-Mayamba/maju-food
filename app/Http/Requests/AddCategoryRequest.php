<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddCategoryRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role->type=="admin";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_name' => ['required', 'string']
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages():array
    {
        return [
            'category_name.required' => 'veuillez entrer un type de plat a ajouter'
        ];
    }
}
