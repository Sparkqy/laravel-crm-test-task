<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:clients,email,' . request()->input('client_id')],
            'phone_number' => ['required', 'string', 'min:12', 'max:21'],
            'address' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
}
