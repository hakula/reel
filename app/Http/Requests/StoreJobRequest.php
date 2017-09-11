<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
        $rules = [
			'attributes.name' => 'required|max:255',
        ];
        
        // If uri does not include user then required user_id
        if ( ! $this->route('user')) {
            $rules['attributes.user_id'] = 'required|integer|exists:users,id';
        }        
        
        return $rules;
    }
}
