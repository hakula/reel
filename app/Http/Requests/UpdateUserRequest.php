<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	    // Check that authenticated user and user being edited are the same
	    if($this->route('user')->id == $this->user()->id) {
		    return true;
	    }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attributes.name' => 'required|max:255',
            'attributes.email' => 'required|email'
        ];
    }
}
