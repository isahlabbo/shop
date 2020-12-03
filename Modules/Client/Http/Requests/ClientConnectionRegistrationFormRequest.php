<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientConnectionRegistrationFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => ['required', 'string', 'max:255'],
            "last_name" => ['required', 'string', 'max:255'],
            "gender" => ['required'],
            "phone" => ['required', 'string', 'max:11', 'unique:clients'],
            "country" => ['required'],
            "state" => ['required'],
            "lga" => ['required'],
            "town" => ['required', 'string'],
            "area" => ['required', 'string'],
            "address" => ['required', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
