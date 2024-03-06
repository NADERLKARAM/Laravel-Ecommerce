<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string',
        ];
    }



      // Customize validation messages
      public function messages()
      {
          return [
              'name.required' => 'The name field is required.',
              'address.required' => 'Please provide your address.',
              'email.required' => 'The email field is required.',
              'email.email' => 'Please enter a valid email address.',
              'phone.required' => 'The phone field is required.',
              'phone.max' => 'Phone number should not exceed :max characters.',
              // Add more custom messages as needed
          ];
      }
}