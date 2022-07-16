<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;

        if($this->user_id == auth()->user()->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'evento' => 'required',
            'estado' => 'required|in:1,2'
        ];

        if($this->estado == 2){
            $rules = array_merge($rules, [
                'detalle' => 'required',

            ]);
        }
        return $rules;
    }
}
