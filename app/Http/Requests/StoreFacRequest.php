<?php

namespace App\Http\Requests;

use App\Models\Fac;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFacRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $fac = $this->fac ?? new Fac();
        return [
            "name" => ["required", "string", Rule::unique("facs")->ignore($fac->id)],
            "sigle" => ["required", "string", Rule::unique("facs")->ignore($fac->id)],
        ];
    }
}
