<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreCollectiveRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title'    => ['required', 'string', 'max:255'],
			'name'     => ['required', 'string', 'max:255'],
			'email'    => ['required', 'email',  'max:100'],
			'password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()],
        ];
    }
}
