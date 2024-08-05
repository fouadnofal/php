<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateUserRequest extends FormRequest
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
            'userName' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'mobile' => 'required|string', 
            'father' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'userRole' => ['required', new Enum(UserRole::class)],
            // 'userRole' => 'required|in:superadmin,admin,moderator,user',
            // 'userRole' => 'required',
            'servant' => 'sometimes',
        ];
    }
}
