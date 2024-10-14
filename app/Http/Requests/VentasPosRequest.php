<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasPosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules($detraccion = false): array
    {
        $rules = [
            'tipo_comprobante_id' => 'required|exists:tipo_comprobantes,codigo',
            'serie' => 'required|exists:series,serie',
            'correlativo' => 'required',
            'tipo_operacion' => 'required',
            'serie_correlativo' => [
                'required',
            ],
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'divisa' => 'required',
            'tipo_cambio' => 'required_if:divisa,USD',
            'metodo_pago_id' => 'required',
            'comentario' => 'nullable',
            'op_gravadas' => 'required',
            'op_exoneradas' => 'required',
            'op_inafectas' => 'required',
            'op_gratuitas' => 'required',
            'descuento' => 'required',
            'tipo_descuento' => 'required',
            'descuento_factor' => 'nullable',
            'icbper' => 'nullable',
            'igv' => 'required',
            'sub_total' => 'required',
            'total' => 'required',
            'forma_pago' => 'required',
            'pago' => 'required',
            'vuelto' => 'required',
            'pago_estado' => 'required',

            'cart' => 'array|between:1,1000',
            'cart.*.producto_id' => 'nullable',
            'cart.*.codigo' => 'nullable',
            'cart.*.cantidad' => 'required|gte:1',
            'cart.*.unit' => 'required',
            'cart.*.unit_name' => 'required',
            'cart.*.descripcion' => 'required',
            'cart.*.valor_unitario' => 'required',
            'cart.*.precio_unitario' => 'required',
            'cart.*.porcentaje_igv' => 'required',
            'cart.*.igv' => 'required',
            'cart.*.icbper' => 'required',
            'cart.*.total_icbper' => 'required',
            'cart.*.sub_total' => 'required',
            'cart.*.total' => 'required',
            'cart.*.codigo_afectacion' => 'required',
            'cart.*.afecto_icbper' => 'required',
            'cart.*.tipo' => 'required',

        ];

        return $rules;
    }

    public function messages()
    {

        $messages = [
            'cliente_id.required' => 'Debes Seleccionar un cliente',
        ];
        return $messages;
    }
}
