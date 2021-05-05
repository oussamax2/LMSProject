<?php

namespace App\Http\Requests\API;

use App\Models\course_tag;
use InfyOm\Generator\Request\APIRequest;

class Updatecourse_tagAPIRequest extends APIRequest
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
        $rules = course_tag::$rules;
        
        return $rules;
    }
}
