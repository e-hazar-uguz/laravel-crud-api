<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'type' => ['required', Rule::in(['P', 'B', 'p', 'b'])], //Personal , Bussiness
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postal_code'  => ['required'],
        ];
    }


    //kullanıcıdan gelen postalCode burada veritabanı için geçerli olan postal_code a dönüştürülür.
    // protected function prepareForValidation() {
    //     $this->merge([
    //         'postal_code' => $this->postalCode
    //     ]);
    // }
}
