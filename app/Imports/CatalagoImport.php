<?php

namespace App\Imports;

use Illuminate\Bus\Queueable;
use App\Models\CatalogoDigemid;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class CatalagoImport implements ToModel, WithChunkReading, SkipsOnFailure, WithEvents, ShouldQueue, WithGroupedHeadingRow, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    use Queueable, RegistersEventListeners, Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function headingRow(): int
    {
        return 7;
    }

    public function model(array $row)
    {

        return new CatalogoDigemid([
            'Cod_Prod' => $row['cod_prod'],
            'Nom_Prod' => $row['nom_prod'],
            'Concent' => $row['concent'],
            'Nom_Form_Farm' => $row['nom_form_farm'],
            'Nom_Form_Farm_Simplif' => $row['nom_form_farm_simplif'],
            'Presentac' => $row['presentac'],
            'Fracciones' => $row['fracciones'],
            'Fec_Vcto_Reg_Sanitario' => $row['fec_vcto_reg_sanitario'],
            'Num_RegSan' => $row['num_regsan'],
            'Nom_Titular' => $row['nom_titular'],
            'Situacion' => $row['situacion'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        $rules = [];

        return $rules;
    }

    public function onFailure(Failure ...$failures)
    {
        $errores = [];

        foreach ($failures as $failure) {
            $errores = [
                'row' => $failure->row(),
                'attribute' => $failure->attribute(),
                'value' => $failure->values()[$failure->attribute()],
                'error' => $failure->errors()[0],
            ];
        }

        //  $this->importedBy->notify(new ImportHasFailedNotification($errores));
    }
}
