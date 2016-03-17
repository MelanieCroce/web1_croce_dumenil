<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validateComRequest extends Request
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
			'content' => 'required|min:10'
		];
    }
	
    public function messages()
    {
        return [
			'content.required' => 'Commentaire obligatoire', 
			'content.min' => 'Commentaire supérieur à 10 caractères'
		];
    }	
}
