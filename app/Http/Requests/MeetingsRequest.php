<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'miniclasses_id' => 'required|exists:Miniclasses,id',
            'topik' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'pertemuan' => 'required|integer',
            'token' => 'required|string|max:10'
        ];
    }
}
