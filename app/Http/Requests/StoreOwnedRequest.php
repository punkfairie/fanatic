<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOwnedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Joined::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categories'          => ['required', 'array'],
            'categories.*'        => ['numeric', 'exists:categories,id'],
            'subject'             => ['required', 'string'],
            'status'              => ['required', 'string', Rule::in(['current', 'upcoming'])],
            'slug'                => ['required', 'alpha_dash'],
            'title'               => ['nullable', 'string'],
            'image'               => ['nullable', 'image'],
            'date_opened'         => ['nullable', 'date'],
            'hold_member_updates' => ['nullable', 'boolean'],
        ];
    }
}
