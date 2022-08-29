<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingsRequest extends FormRequest {

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
                    'miniclass_id' => 'required|exists:miniclasses,id',
                    'topik' => 'required|string|max:255',
                    'slug' => 'nullable|string|max:255',
                    'tanggal' => 'required|date',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'pertemuan' => 'required|integer|min:1',
                    'token' => 'required|string|max:10|unique:meetings,token'
                ];
            } break;
            case 'PUT' : {
                return [
                    'miniclass_id' => 'required|exists:miniclasses,id',
                    'topik' => 'required|string|max:255',
                    'slug' => 'nullable|string|max:255',
                    'tanggal' => 'required|date',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'token' => 'required|string|max:10|'
                ];
            } break;
        }
    }
}
