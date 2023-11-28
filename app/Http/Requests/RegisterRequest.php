<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function  rules()
    {
        return [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'required|string|max:255|email|unique:users',
            'phone_number' => 'required|int|unique:users',
            'image' => 'required|image|image|max:2048|mimes:jpeg,png',
            'fullname' => 'required|string'
        ];
    }
}
