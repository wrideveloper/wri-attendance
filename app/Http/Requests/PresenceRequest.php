<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PresenceRequest extends FormRequest
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
    public function rules(){
        switch($this->method()){
            case 'POST': {
                return [
                    'user_id' => 'required|exists:users,id',
                    'presence_date' => 'required|date',
                    'status' => 'required|in:hadir,izin,sakit,alfa',
                    'ket' => 'nullable|string|max:255',
                    'feedback' => 'nullable|string|max:1000',
                ];
            } break;
            case 'PUT' : {
                return [
                    'user_id' => 'required|exists:users,id',
                    'presence_date' => 'sometimes|date',
                    'status' => 'sometimes|in:hadir,izin,sakit,alfa',
                    'ket' => 'sometimes|string|max:255',
                    'feedback' => 'sometimes|string|max:1000',
                ];
            } break;
        }
    }

    protected function failedValidation(ValidationValidator $validator) {
        throw new HttpResponseException(
            response()->json(
                [
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                    'data' => $validator->errors()
                ],
                422
            )
        );
    }
}
