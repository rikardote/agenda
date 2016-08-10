<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PacientesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rfc' => 'min:10|max:13|required',
            'nombres' => 'min:2|max:40|required',
            'apellido_pat' => 'min:2|max:30|required',
            'apellido_mat' => 'min:2|max:30|required',
        ];
    }
}
