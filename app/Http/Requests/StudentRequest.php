<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $rules = [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
            'carnet_identidad' => 'required',
            'n_celular' => 'required',
            'estado' => 'required|in:estudiante,profesional'
        ];

        if($this->estado == 'estudiante'){
            $rules = array_merge($rules, [
                'carnet_universitario' => 'required'
            ]);
            if($this->costo_e > 0){
                if($this->hasFile('img_deposito'))
                    {
                        $student['img_deposito'] = $this->file('img_deposito')->store('depositos');
                    }
                $rules = array_merge($rules, [
                    'n_deposito' => 'required',
                    'img_deposito' => 'required'
                ]);   
            }
        }else{
            if($this->costo_e > 0){
                if($this->hasFile('img_deposito'))
                    {
                        $student['img_deposito'] = $this->file('img_deposito')->store('depositos');
                    }
                $rules = array_merge($rules, [
                    'n_deposito' => 'required',
                    'img_deposito' => 'required'
                ]); 
            }
        }
        return $rules;
    }
}
