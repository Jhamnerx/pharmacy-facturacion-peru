<?php

namespace App\Livewire\Admin\Compras;

use App\Models\Compras;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Productos;
use Illuminate\Support\Collection;

class Create extends Component
{
    public $proveedor_id, $serie, $correlativo,  $fecha_emision, $divisa = 'PEN', $comentario = '';

    public $product_selected_id;
    public Collection $selected;
    public Collection $items;

    public $sub_total = 0.00, $igv = 0.00, $total = 0.00;

    public Empresa $empresa;

    //PROPIEDAD PARA VERIFICAR EMPRESA
    public $local_id;

    public function mount()
    {
        $this->selected = collect([
            'producto_id' => "",
            'codigo' => "MD-0000",
            'descripcion' => "",
            'cantidad' => 1,
            'precio' => 0.00,
            'importe_total' => 0.00,
        ]);
        $this->items = collect([]);
        $this->fecha_emision = now()->format('Y-m-d');
        $this->empresa = Empresa::first();
        $this->local_id = session('local_id');
    }

    public function render()
    {
        return view('livewire.admin.compras.create');
    }

    public function updatedProductSelectedId($value)
    {
        if ($value != "") {
            $producto = Productos::findOrFail($value);
            $this->selected = collect([
                'producto_id' => $producto->id,
                'codigo' => $producto->codigo,
                'descripcion' => $producto->nombre,
                'cantidad' => 1,
                'precio' => 0.00,
                'importe_total' => 0.00,
            ]);
        }
    }

    public function agregarItem()
    {
        $this->validate([
            'selected.producto_id' => 'required',
            'selected.cantidad' => 'required|numeric|min:1',
            'selected.precio' => 'required|numeric|min:0.01',
        ], [
            'selected.producto_id.required' => 'Seleccione un producto',
            'selected.cantidad.required' => 'Ingrese la cantidad',
            'selected.cantidad.numeric' => 'La cantidad debe ser un número',
            'selected.cantidad.min' => 'La cantidad debe ser mayor a 0',
            'selected.precio.required' => 'Ingrese el precio',
            'selected.precio.numeric' => 'El precio debe ser un número',
            'selected.precio.min' => 'El precio debe ser mayor a 0',
        ]);
        try {

            $this->items->push($this->selected);
            $this->selected = collect([
                'producto_id' => "",
                'codigo' => "MD-0000",
                'descripcion' => "",
                'cantidad' => 1,
                'precio' => 0.00,
                'importe_total' => 0.00,
            ]);
            $this->reCalTotal();
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }

    public function updatedSelected($value)
    {
        $this->selected['importe_total'] = $this->selected['cantidad'] * $this->selected['precio'];
    }

    public function updatedItems($value)
    {
        $this->calcularMontosLinea();
        $this->reCalTotal();
    }
    public function calcularMontosLinea()
    {

        $this->items = $this->items->map(function ($item, $key) {

            $item['importe_total'] = $item['cantidad'] * $item['precio'];
            return $item;
        });
    }

    //METODO GLOBAL PARA HACER CALCULOS
    public function reCalTotal()
    {
        $this->total =  $this->calcularTotal();
        $this->sub_total =   $this->calcularSubTotal();
        $this->igv =  $this->calcularIgv();
    }




    //CALCULAR IGV DESDE EL SUB TOTAL - FALTA POR TRAER EL PROCENTAJE DEL IUMPUESTO DE LA DB
    public function calcularIgv()
    {

        $igv = $this->total - $this->sub_total;
        return round($igv, 2);
    }


    //CALCUJLAR TOTAL DE ACUERDO AL TIPO DE DESCUENTO Y SI HAY
    public function calcularTotal()
    {
        $total = $this->items->map(function ($item, $key) {

            $total = 0;
            $total =  $total + $item["importe_total"];
            return round($total, 2);
        });

        return $total->sum();
    }

    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        return round($this->total / (1 + $this->empresa->igv), 2);
    }

    public function eliminarItem($index)
    {
        $this->items->forget($index);
        $this->reCalTotal();
    }

    public function save()
    {

        if ($this->local_id != session('local_id')) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: 'No puedes registrar una venta de otro local',
            );
            return;
        }

        $rules = [
            'proveedor_id' => 'required',
            'serie' => 'required',
            'correlativo' => 'required',
            'fecha_emision' => 'required',
            'divisa' => 'required',
            'comentario' => 'nullable',
            'items' => 'required',
            'sub_total' => 'required',
            'igv' => 'required',
            'total' => 'required',
        ];

        $datos = $this->validate($rules);

        try {
            $compra = Compras::create($datos);

            $items = Compras::createItems($datos['items'], $compra);
            session()->flash('compra-registrada', 'Se registro la compra ' . $this->cotizacion->serie_correlativo);
            $this->redirectRoute('admin.compras.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
