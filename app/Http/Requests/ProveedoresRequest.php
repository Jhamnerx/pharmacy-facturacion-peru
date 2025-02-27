<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProveedoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($cliente = null)
    {
        $rules =
            [
                'tipo_documento_id' => 'required',
                'razon_social' => 'required',
                'direccion' => 'nullable',
                'web_site' => 'nullable',
                'telefono' => 'nullable|digits_between:6,9|numeric',
                'email' => 'email|nullable',
                'numero_documento' => [
                    'required',
                    'min:6',
                    'alpha_num',

                    Rule::unique('proveedores', 'numero_documento')->where(
                        fn ($query) =>
                        $query->where('local_id', session('local_id'))
                            ->where('estado', 1)
                            ->whereNull('deleted_at')
                    )
                ],
            ];


        if ($cliente) {

            $rules
                = [
                    'tipo_documento_id' => 'required',
                    'razon_social' => 'required',
                    'direccion' => 'nullable',
                    'web_site' => 'nullable',
                    'telefono' => 'nullable|digits_between:6,9|numeric',
                    'email' => 'email|nullable',
                    'numero_documento' => [
                        'required',
                        'min:6',

                        Rule::unique('proveedores', 'numero_documento')->where(
                            fn ($query) =>
                            $query->where('local_id', session('local_id'))
                                ->where('estado', 1)
                                ->whereNull('deleted_at')
                        )->ignore($cliente->id)
                    ],
                ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'razon_social.required' => 'No dejes vacio este campo',
            'numero_documento.required' => 'Ingresa un documento',
            'numero_documento.digits_between' => 'Ingresa como minimo 8 caracteres',
            'numero_documento.numeric' => 'El numero documento debe ser un numero',
            'numero_documento.unique' => 'El cliente ya esta registrado',
            'telefono.digits_between' => 'Ingresa como maximo 9 caracteres numericos',
            'telefono.numeric' => 'El numero de telefono debe ser un numero',
            'email.email' => 'Debe tener formato de correo electronico',
            'numero_documento.alpha_num' => 'Solo se permiten caracteres alfanumericos',
        ];
    }
}
