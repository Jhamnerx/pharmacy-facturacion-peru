<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            // 'codigo' => 'required',
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:400',
            'forma_farmaceutica' => 'nullable',
            'presentacion' => 'nullable',
            'numero_registro_sanitario' => 'nullable',
            'laboratorio' => 'nullable',
            'stock_minimo' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'afecto_icbper' => 'required|boolean',
            'divisa' => 'required|in:USD,PEN',
            'tipo' => 'required|in:producto,servicio',
            'tipo_afectacion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'unit_code' => 'required',
            'precio_unitario' => 'required|numeric|min:0',
            'precio_minimo' => 'nullable|numeric|min:0',
            'precio_blister' => 'nullable|numeric|min:0',
            'cantidad_blister' => 'nullable|numeric|min:0',
            'precio_caja' => 'nullable|numeric|min:0',
            'cantidad_caja' => 'nullable|numeric|min:0',
            'costo_unitario' => 'nullable|numeric|min:0',
            'lote' => 'nullable|required_if:fecha_vencimiento,!=,""|max:255',
            'fecha_vencimiento' => 'nullable|required_if:lote,!=,""',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El campo código es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'stock_minimo.required' => 'El campo stock minimo es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
            'afecto_icbper.required' => 'El campo afecto icbper es obligatorio',
            'divisa.required' => 'El campo divisa es obligatorio',
            'tipo.required' => 'El campo tipo es obligatorio',
            'tipo_afectacion.required' => 'El campo tipo afectacion es obligatorio',
            'categoria_id.required' => 'El campo categoria es obligatorio',
            'unit_code.required' => 'El campo unit code es obligatorio',
            'precio_unitario.required' => 'El campo precio unitario es obligatorio',
            'unit_code.required' => 'El campo unidad es obligatorio',
        ];
    }
}
