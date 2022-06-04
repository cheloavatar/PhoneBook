<?php

namespace App\Models\Admin\Celular;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Celular\Celular;
use App\Models\Admin\Detenido;


class Contact extends Model
{
    use HasFactory;
    protected $fillable=['nombre','telefono','celular_id','detenido_id'];

    //Relacion muchos a muchos
    public function celulars(){
		return $this->belongsTo(Celular::class,'celular_id');
	}
    //Relacion muchos a muchos
    public function detenidos(){
		return $this->belongsTo(Detenido::class,'detenido_id');
	}
    //Relacion uno a uno polimorfica
	public function fotodetenido(){
		return $this->morphOne('App\Models\Admin\Foto','fotodetenidable');
	}
}
