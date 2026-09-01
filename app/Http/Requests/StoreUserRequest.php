<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前は必須です。',
            'name.max' => '名前は50文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.unique' => 'このメールアドレスは既に使用されています。',
            'password.required' => 'パスワードは必須です。',
            'password.confirmed' => 'パスワード（確認）が一致しません。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
        ];
    }
}
