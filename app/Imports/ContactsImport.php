<?php

namespace App\Imports;

use App\Models\Admin\Celular\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'nombre'        => $row['0'],
            'telefono'      => $row['1'],
            'celular_id'    => request('celular_id'),
            'detenido_id'   => request('detenido_id'),
        ]);
    }
}
