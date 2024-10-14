<?php

namespace App\Models;

use App\Models\Ventas;
use App\Observers\DevolucionesObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Barryvdh\DomPDF\Facade\Pdf;

#[ObservedBy(DevolucionesObserver::class)]
class Devoluciones extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'devoluciones';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'venta_id' => 'integer',
        'fecha_emision' => 'datetime',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function venta(): BelongsTo
    {
        return $this->belongsTo(Ventas::class);
    }

    public function detalle()
    {
        return $this->hasMany(DevolucionesDetalle::class, 'devolucion_id', 'id');
    }

    //CREAR ITEM DETALLE VENTA
    public static function createItems(Devoluciones $devolucion, $devolucionItems)
    {
        foreach ($devolucionItems as $devolucionItem) {
            $devolucionItem['devolucion_id'] = $devolucion->id;

            $item = $devolucion->detalle()->create($devolucionItem);

            // if ($decrease_stock && $devolucionItem['tipo'] == 'producto') {
            //     $producto = $item->producto;

            //     if (!$producto->decrementStockByLote($devolucionItem['cantidad'])) {
            //         throw new \Exception('No hay suficiente stock para el producto: ' . $producto->nombre);
            //     }
            // }

            //$item->producto->increment('ventas', $devolucionItem['cantidad']);
        }

        return $devolucion->detalle;
    }

    public function getPdf($formato)
    {
        $empresa = Empresa::first();
        view()->share(
            [
                'venta' => $this,
                'empresa',
                $empresa,
            ]
        );

        if ($formato == 'pdf') {
            $pdf = Pdf::loadView('templates.comprobantes.devolucion', ['devolucion' => $this, 'empresa' => $empresa])->setPaper('Legal');
        }

        if ($formato == 'ticket') {

            $customPaper = array(0, 0, 219, 850.39);

            $pdf = Pdf::loadView('templates.comprobantes.ticket.devolucion', ['devolucion' => $this, 'empresa' => $empresa])->setPaper($customPaper);
        }


        return $pdf->stream('COMPROBANTE-' . $this->serie_correlativo . '.pdf');
    }
}
