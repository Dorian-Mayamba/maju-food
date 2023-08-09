<?php

namespace App\Http\Requests;
class UpdateMealRequest extends AddMealRequest
{
    public function rules():array{
        $rules = parent::rules();
        unset($rules['meal_image']);
        return $rules;
    }
}
