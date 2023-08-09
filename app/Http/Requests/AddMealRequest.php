<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddMealRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role->type=='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'meal_name' => ['required', 'string'],
            'meal_description' => ['required', 'string'],
            'meal_image' => ['required', 'file', 'mimes:jpg,bmp,png'],
            'meal_category' => ['required', 'string'],
            'price' => ['required']
        ];
    }

    /**
     * @return array
     */
    public function messages():array
    {
        return [
            'meal_name.required' => 'Veuillez entrer le nom du plat',
            'meal_description.required' => 'Veuillez entrer la description du plat',
            'meal_image.required' => 'Veuillez inserer un fichier image',
            'meal_category.required' => 'Veuillez entrer le type plat',
            'meal_name.string' => 'veuillez entrer un nom plat valide',
            'meal_description.string' => 'veuillez entrer une description valide',
            'meal_category.string' => 'veuillez entrer un type de plat valide'
        ];
    }
}
