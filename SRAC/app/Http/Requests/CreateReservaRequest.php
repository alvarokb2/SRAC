<?php

namespace SRAC\Http\Requests;

use SRAC\Http\Requests\Request;

class CreateReservaRequest extends Request
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
            'fecha_inicio'      => 'required',
            'fecha_fin'         => 'required',
        ];
    }
}
