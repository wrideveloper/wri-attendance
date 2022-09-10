<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresenceRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        switch($this->method()){
            case 'POST': {
                return [
                    'nim' => 'nullable|exists:users,nim',
                    'meetings_id' => 'nullable|exists:meetings,id',
                    'presence_date' => 'nullable|date',
                    'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
                    'ket' => 'nullable|string',
                    'feedback' => 'nullable|string',
                    'token' => 'nullable|string|max:10'
                ];
            } break;
            case 'PUT' : {
                return [
                    'status' => 'required',
                ];
            } break;
        }
    }
}
