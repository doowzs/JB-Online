<?php

namespace App\Http\Requests\Frontend\Forum\Personal;

use App\Models\Forum\Assignment;
use App\Rules\Sanitize;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateAssignmentRequest.
 */
class UpdateAssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $assignment = $this->route('assignment');
        return !(is_null($assignment)) && $this->user()->id == $assignment->issuer;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', new Sanitize(), 'max:200'],
            'content' => ['required', new Sanitize(), 'max:10000'],
            'due_time' => ['required', 'date', 'max:200', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
