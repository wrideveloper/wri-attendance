<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nim' => 'required|string|exists:users,nim|min:10|max:10',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'nim.required' => 'NIM tidak boleh kosong',
            'nim.exists' => 'Silahkan masukan NIM atau Password dengan benar',
            'password.required' => 'Password tidak boleh kosong',
            'nim.min' => 'Ada kesalahan pada NIM Anda',
            'nim.max' => 'Ada kesalahan pada NIM Anda',
        ];
    }
}
