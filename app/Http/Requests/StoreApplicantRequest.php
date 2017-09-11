<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
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
			'attributes.email' => 'required|email',
			'attributes.website' => 'url',
			'attributes.cover_letter' => 'required',
			'attributes.skills' => 'required',
        ];
        
        // If uri does not include job then required job_id
        if ( ! $this->route('job')) {
            $rules['attributes.job_id'] = 'required|integer|exists:jobs,id';
        }
        
        return $rules;
    }
}
