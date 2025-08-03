<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $workerId = $this->route('worker')->id;
        return [
            'name' => 'required|string|max:52',
            'surname' => 'required|string|max:50',
            'age' => 'required|integer',
            'email' => 'required|email|max:50|unique:workers,email,' . $workerId,
            'description' => 'nullable|string',
            'is_married' => 'nullable|string',
        ];
    }
}
