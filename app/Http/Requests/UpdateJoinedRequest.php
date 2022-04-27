<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJoinedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool
    {
        return $this->user()->can('update', $this->route('joined'));
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules() : array
    {
        return [
            'categories'   => ['required', 'array'],
            'categories.*' => ['numeric', 'exists:categories,id'],
            'url'          => ['required', 'url'],
            'subject'      => ['required', 'string'],
            'image'        => ['nullable', 'image'],
            'approved'     => ['nullable', 'boolean'],
        ];
    }
}
