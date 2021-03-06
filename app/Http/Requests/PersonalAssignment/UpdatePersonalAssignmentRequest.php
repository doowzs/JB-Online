<?php

namespace App\Http\Requests\PersonalAssignment;

use App\Rules\Sanitize;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalAssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $personalAssignment = $this->route('personalAssignment');

        return $this->user()->can('update', $personalAssignment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => [
                'sometimes',
                'required',
                new Sanitize(),
                'max:100',
            ],
            'content'  => [
                'sometimes',
                'required',
                new Sanitize(),
                'max:2000',
            ],
            'due_time' => [
                'sometimes',
                'required',
                'date_format:Y-m-d H:i:s',
            ],
        ];
    }
}
