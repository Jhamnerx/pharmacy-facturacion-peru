<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriasRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules($categoria = null): array
    {

        $rules = [
            'nombre' => [
                'required',
                Rule::unique('clientes', 'numero_documento')->where(
                    fn ($query) =>
                    $query->where('local_id', session('local_id'))
                        ->whereNull('deleted_at')
                )
            ],
            'descripcion' => 'nullable',
        ];


        if ($categoria) {

            $rules = [
                'nombre' => [
                    'required',
                    Rule::unique('clientes', 'numero_documento')->where(
                        fn ($query) =>
                        $query->where('local_id', session('local_id'))
                            ->whereNull('deleted_at')
                    )->ignore($categoria->id)
                ],
                'descripcion' => 'nullable',
            ];
        }


        return $rules;
    }
}
