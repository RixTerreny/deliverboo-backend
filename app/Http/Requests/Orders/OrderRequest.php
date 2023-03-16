<?php

namespace App\Http\Requests\Orders;

use App\Models\Dish;
use App\Rules\ValidDish;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required',

            // 'dish' => [
            //     'required',
            //     new ValidDish()
            // ]
            'dishes' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    foreach ($value as $dishId) {
                        if (!ctype_digit($dishId) || !Dish::find($dishId)) {
                            $fail("The selected $attribute is invalid.");
                            break;
                        }
                    }
                }
            ]
            
        ]; 
    }
}
