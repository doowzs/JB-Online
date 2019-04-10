<?php

namespace App\Http\Requests\Problem;

use App\Models\Problem;
use App\Rules\Sanitize;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProblemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $problem = $this->route('problem');

        return $this->user()->can('update', $problem);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content'    => ['required', new Sanitize(), 'max:200'],
        ];
    }
}
