<?php

namespace App\Livewire\Admin\Ajustes\Sunat\Series;

use App\Models\Series;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\TipoComprobantes;

class Index extends Component
{

    use WithPagination;
    public $tipo_comprobante_id, $serie, $correlativo = 0;


    public function render()
    {
        $series = Series::orderby('id', 'desc')->paginate(10);

        return view('livewire.admin.ajustes.sunat.series.index', compact('series'));
    }

    public function rules()
    {
        $rules = [
            'tipo_comprobante_id' => 'required|exists:tipo_comprobantes,codigo',
            'serie' => [

                'required',
                Rule::unique('series', 'serie')->where(fn($query) => $query->where('local_id', session('local_id'))),
            ],
            'correlativo' => 'numeric|min:0|required',
        ];


        if ($this->tipo_comprobante_id == '01') {
            $rules['serie'] = [
                'required',
                Rule::unique('series', 'serie')->where(fn($query) => $query->where('local_id', session('local_id'))),
                'regex:/^F[A-Z0-9]{3}$/',
            ];
        }
        if ($this->tipo_comprobante_id == '03') {
            $rules['serie'] = [
                'required',
                Rule::unique('series', 'serie')->where(fn($query) => $query->where('local_id', session('local_id'))),
                'regex:/^B[A-Z0-9]{3}$/',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'tipo_comprobante_id.required' => 'El tipo de comprobante es obligatorio',
            'tipo_comprobante_id.exists' => 'El tipo de comprobante no existe',
            'serie.unique' => 'La serie ya existe',
            'correlativo.numeric' => 'El correlativo debe ser un número',
            'correlativo.min' => 'el valor minimo aceptado es: 0',
            'correlativo.required' => 'el valor minimo es obligatorio',
        ];

        if ($this->tipo_comprobante_id == '01') {
            $messages['serie.regex'] = '`F` seguido de tres caracteres alfanuméricos (AZ, 0-9)';
        }
        if ($this->tipo_comprobante_id == '03') {
            $messages['serie.regex'] = '`B` seguido de tres caracteres alfanuméricos (AZ, 0-9)';
        }

        return $messages;
    }

    public function addSerie()
    {

        $datos = $this->validate();

        $comprobante = TipoComprobantes::find($this->tipo_comprobante_id);

        $comprobante->series()->create([
            'serie' => Str::upper($datos['serie']),
            'correlativo' => $datos['correlativo'],
            'local_id' => session('local_id'),
        ]);

        $this->afterSave($datos['serie'], $comprobante->descripcion);

        $this->reset('serie', 'correlativo', 'tipo_comprobante_id');
    }

    public function afterSave($serie, $comprobante)
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'SERIE CREADA',
            mensaje: 'La serie: ' . $serie . ' de ' . $comprobante . ' fue creada',
        );
    }

    #[On('update-table')]
    public function updateTable()
    {
        $this->render();
    }

    public function deleteSerie(Series $serie)
    {;
        $this->dispatch('delete-serie', serie: $serie);
    }
}
