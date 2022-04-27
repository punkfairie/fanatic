<?php

namespace App\Http\Requests;

use App\Models\Joined;
use Illuminate\Foundation\Http\FormRequest;

class StoreJoinedRequest extends FormRequest
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
            'categories'   => ['required', 'array'],
            'categories.*' => ['numeric', 'exists:categories,id'],
            'url'          => ['required', 'url'],
            'subject'      => ['required', 'string'],
            'image'        => ['nullable', 'image'],
            'approved'     => ['nullable', 'boolean'],
        ];
    }
}
