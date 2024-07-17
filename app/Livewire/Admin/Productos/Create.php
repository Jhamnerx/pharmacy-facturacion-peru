<?php

namespace App\Livewire\Admin\Productos;

use Livewire\Component;
use App\Models\Productos;
use Livewire\Attributes\On;
use App\Models\CatalogoDigemid;
use Intervention\Image\ImageManager;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\PngEncoder;

class Create extends Component
{
    //use WithFileUploads;
    public $showModal = false;

    public $codigo, $nombre, $descripcion, $forma_farmaceutica, $presentacion, $numero_registro_sanitario, $laboratorio, $stock_minimo = 1, $stock = 1, $afecto_icbper = false;
    public $divisa = 'PEN', $tipo = 'producto', $tipo_afectacion = 10, $categoria_id, $unit_code = 'NIU';
    public $precio_unitario = 0.00, $precio_minimo = 0.00, $precio_blister = 0.00, $cantidad_blister = 0, $precio_caja = 0.00, $cantidad_caja = 0, $costo_unitario = 0.00;
    public $fecha_vencimiento, $lote;

    public $file;

    public function mount()
    {
        $this->tipo_afectacion = 10;
    }

    public function render()
    {
        return view('livewire.admin.productos.create');
    }

    #[On('open-modal-create')]
    public function openModal()
    {
        $this->showModal = true;
        $this->resetErrorBag();
        $this->dispatch('reset-search-medicamento');
        //  $this->codigo = $this->generateCodeProduct();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetProps();
    }

    public function save()
    {

        //GUARDAR PRODUCTO
        $request = new ProductosRequest();

        $datos = $this->validate($request->rules(), $request->messages());

        if ($this->getErrorBag()->isNotEmpty()) {
            $this->dispatch('formValidated', $this->getErrorBag()->toArray());
        }

        try {

            $producto = Productos::create($datos);
            //$this->afterSave();

            //save imagen
            if ($this->file) {
                $this->saveImage($producto);
            }
            $this->afterSave();
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

        return true;
    }

    public function updated($atributo, $value)
    {

        $request = new ProductosRequest();
        $this->validateOnly($atributo, $request->rules(), $request->messages());
    }

    public function afterSave()
    {
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'MEDICAMENTO REGISTRADO',
            mensaje: 'se guardo correctamente el producto o servicio',
        );
        $this->closeModal();
        $this->dispatch('update-table');
        $this->dispatch('reset-file-imagen');
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
        $this->codigo = null;
        $this->nombre = null;
        $this->descripcion = null;
        $this->forma_farmaceutica = null;
        $this->presentacion = null;
        $this->numero_registro_sanitario = null;
        $this->laboratorio = null;
        $this->stock_minimo = 1;
        $this->stock = 1;
        $this->afecto_icbper = false;
        $this->divisa = 'PEN';
        $this->tipo = 'producto';
        $this->tipo_afectacion = 10;
        $this->categoria_id = null;
        $this->unit_code = 'NIU';
        $this->precio_unitario = 0.00;
        $this->precio_minimo = 0.00;
        $this->precio_blister = 0.00;
        $this->cantidad_blister = 0;
        $this->precio_caja = 0.00;
        $this->cantidad_caja = 0;
        $this->costo_unitario = 0.00;
        $this->fecha_vencimiento = null;
        $this->lote = null;

        $this->$this->dispatch('reset-search-medicamento');
    }

    #[On('send-data-digemid')]
    public function setDataDigemid(CatalogoDigemid $producto)
    {

        $this->nombre = $producto->Nom_Prod . " " . $producto->Concent;
        $this->forma_farmaceutica = $producto->Nom_Form_Farm;
        $this->presentacion = $producto->Presentac;
        $this->numero_registro_sanitario = $producto->Num_RegSan;
        $this->laboratorio = $producto->Nom_Titular;

        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'PRODUCTO ENCONTRADO',
            mensaje: 'Se encontro el producto en la base de datos de la DIGEMID'
        );
    }
}
