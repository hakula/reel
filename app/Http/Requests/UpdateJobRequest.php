<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {    
	    // If job belongs to user then return true
	    if($this->route('job')->user_id == $this->user()->id) {		    
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
        $rules = [
			'attributes.name' => 'required|max:255',
        ];        
        
        return $rules;
    }
}
