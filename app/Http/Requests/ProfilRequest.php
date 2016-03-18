<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfilRequest extends Request
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
			'name'	 	=> 'required|min:5',
			'email'	    => 'required|email',
			'password'  => 'required|confirmed|min:6'
		];
    }
	
    public function messages()
    {
        return [
			'name.required'      	  => 'Pseudo obligatoire', 
			'name.min'	   	   		  => 'Pseudo supérieur à 5 caractères',
			'email.required'   		  => 'Email obligatoire',
			'email.email'    		  => 'Doit être une adrese mail valide',
			'password.required'       => 'Mot de passe obligatoire',
			'password.confirmed'      => 'Mot de passe différent',
			'password.min'      	  => 'Mot de passe supérieur à 6'
		];
    }	
}
