<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\BaseFormRequest;

class DestroyCategory extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Use route parameters for validation
     * @return array
     */
    public function validationData(): array
    {
        return app('request')->route()[2];
    }
}
