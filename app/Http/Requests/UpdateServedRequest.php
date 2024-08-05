<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServedRequest extends FormRequest
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
            'meeting_id' => 'required|min:1',
            'email' => 'required|email',
            'mobile' => 'required|string', 
            'father' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
            $messages,
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'من فضلك ادخل الايميل الخاص بك',
            'fullName.max' =>'عدد الحروف لا يجب أن يتعدي 150 حرف .',
            'fullName.required'=>'من فضلك ادخل الاسم',
            'mobile.required' => 'من فضلك ادخل رقم الموبايل', 
            'father.required' => 'من فضلك ادخل اسم اب الاعتراف ',
            'address.required' => 'من فضلك ادخل العنوان بالتفصيل',
            'dob.required' => 'من فضلك ادخل تاريخ الميلاد',
        ];
    }
}
