<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
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
        $messages = $this->messages();
        return [
        'fullName' => 'required|string|max:150',
        'userName' => 'required|string|max:30|unique:users,userName',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'mobile' => 'required|string', 
        'father' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
        'userRole' => ['required', new Enum(UserRole::class)],
        // 'userRole' => 'required|in:superadmin,admin,moderator,user',
        // 'userRole' => 'required',
        'servant' => 'sometimes',
        $messages,
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'من فضلك ادخل الايميل الخاص بك',
            'fullName.max' =>'عدد الحروف لا يجب أن يتعدي 150 حرف .',
            'fullName.required'=>'من فضلك ادخل الاسم',
            'userName.unique'=>'هذا الاسم موجود قبل ذلك',
            'userName.max' =>'عدد الحروف لا يجب أن يتعدي 30 حرف.',
            'userName.required'=>'من فضلك ادخل الاسم',
            'password.required' => 'من فضلك ادخل كلمة سر ',
            'password.min' => 'علي الأقل 8 حروف لكلمة السر ',
            'mobile.required' => 'من فضلك ادخل رقم الموبايل', 
            'father.required' => 'من فضلك ادخل اسم اب الاعتراف ',
            'address.required' => 'من فضلك ادخل العنوان بالتفصيل',
            'dob.required' => 'من فضلك ادخل تاريخ الميلاد',
            'userRole.required' => 'من فضلك ادخل دور المستخدم',
        ];
    }
}
