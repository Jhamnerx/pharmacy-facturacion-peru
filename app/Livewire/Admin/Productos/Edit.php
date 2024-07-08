<?php

namespace App\Livewire\Admin\Productos;

use App\Http\Requests\ProductosRequest;
use App\Models\Productos;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\PngEncoder;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{

    public $showModal = false;
    public $producto;

    public $codigo, $nombre, $descripcion, $forma_farmaceutica, $presentacion, $numero_registro_sanitario, $laboratorio, $stock_minimo = 1, $stock = 1, $afecto_icbper = false;
    public $divisa = 'PEN', $tipo = 'producto', $tipo_afectacion = 10, $categoria_id, $unit_code = 'NIU';
    public $precio_unitario, $precio_minimo = 0.00, $precio_blister = 0.00, $cantidad_blister = 0, $precio_caja, $cantidad_caja, $costo_unitario;
    public $fecha_vencimiento, $lote;

    public $file;

    public $file_name;

    public function render()
    {
        return view('livewire.admin.productos.edit');
    }

    #[On('open-modal-edit')]
    public function openModal(Productos $producto)
    {
        $this->showModal = true;
        $this->categoria_id = $producto->categoria_id;
        $this->producto = $producto;
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->forma_farmaceutica = $producto->forma_farmaceutica;
        $this->presentacion = $producto->presentacion;
        $this->numero_registro_sanitario = $producto->numero_registro_sanitario;
        $this->laboratorio = $producto->laboratorio;
        $this->stock_minimo = $producto->stock_minimo;
        $this->stock = $producto->stock;
        $this->afecto_icbper = $producto->afecto_icbper;
        $this->divisa = $producto->divisa;
        $this->tipo = $producto->tipo;
        $this->tipo_afectacion = $producto->tipo_afectacion;
        $this->unit_code = $producto->unit_code;
        $this->precio_unitario = $producto->precio_unitario;
        $this->precio_minimo = $producto->precio_minimo;
        $this->precio_blister = $producto->precio_blister;
        $this->cantidad_blister = $producto->cantidad_blister;
        $this->precio_caja = $producto->precio_caja;
        $this->cantidad_caja = $producto->cantidad_caja;
        $this->costo_unitario = $producto->costo_unitario;
        $this->fecha_vencimiento = $producto->fecha_vencimiento;
        $this->lote = $producto->lote;
        $this->dispatch('reset-search-medicamento');
        if ($producto->image) {
            $this->dispatch('set-imagen-file', imagen: Storage::url($producto->image->url));
        }
    }

    public function save()
    {
        //GUARDAR PRODUCTO
        $request = new ProductosRequest();

        $datos = $this->validate($request->rules($this->producto), $request->messages());

        try {

            $this->producto->update($datos);

            //save imagen
            if ($this->file) {

                $this->saveImage($this->producto);
            } else {

                $this->removeImage($this->producto);
            }

            $this->afterUpdate();
        } catch (\Exception $e) {

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $e->getMessage(),
            );
        }
    }


    public function saveImage(Productos $producto): bool
    {
        if ($this->file_name != "default.png") {
            // create new manager instance with desired driver
            $manager = new ImageManager(Driver::class);

            // reading jpeg image
            $image = $manager->read($this->file);
            $image->resize(500, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $encoded = $image->encode(new PngEncoder());
            $url = 'productos/' . $producto->id . '.png';
            Storage::put($url, $encoded, 'public');

            $producto->image()->create([
                'url' => $url
            ]);
        }

        return true;
    }

    public function removeImage(Productos $producto)
    {
        if ($producto->image) {
            Storage::delete($producto->image->url);
            $producto->image()->delete();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetProps();
    }


    public function updated($atributo)
    {

        $request = new ProductosRequest();
        $this->validateOnly($atributo, $request->rules($this->producto), $request->messages());
    }

    public function afterUpdate()
    {
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'MEDICAMENTO ACTUALIZADO',
            mensaje: 'se guardo correctamente el producto o servicio',
        );
        $this->closeModal();

        $this->dispatch('update-table');
    }

    public function searchMedicamento()
    {
        $this->validate([
            'numero_registro_sanitario' => 'required'
        ]);

        $this->dispatch('search-medicamento', $this->numero_registro_sanitario);
    }

    public function resetProps()
    {
        $this->codigo = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->forma_farmaceutica = '';
        $this->presentacion = '';
        $this->numero_registro_sanitario = '';
        $this->laboratorio = '';
        $this->stock_minimo = 1;
        $this->stock = 1;
        $this->afecto_icbper = false;
        $this->divisa = 'PEN';
        $this->tipo = 'producto';
        $this->tipo_afectacion = 10;
        $this->categoria_id = '';
        $this->unit_code = 'NIU';
        $this->precio_unitario = '';
        $this->precio_minimo = '';
        $this->precio_blister = '';
        $this->cantidad_blister = 0;
        $this->precio_caja = '';
        $this->cantidad_caja = '';
        $this->costo_unitario = '';
        $this->file = '';
    }
}
