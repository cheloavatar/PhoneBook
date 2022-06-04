<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\otros\lugares\municipio\Municipio;
use App\Models\Admin\Detenido;
class Direccion extends Model
{
    protected $fillable=['calle', 'numero','colonia', 'cp', 'estado', 'municipio_id', 'detenido_id'];

    use HasFactory;
	public function municipio(){
		return $this->belongsTo(Municipio::class);
	}
    public function detenido(){
		return $this->belongsTo(Detenido::class);
	}
}
