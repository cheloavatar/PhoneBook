<?php

namespace App\Models\Admin\Celular;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Celular\Contact;

use App\Models\Admin\Detenido;

class Celular extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates =['deleted_at'];
	protected $table = 'celulars';
	protected $hidden = ['created_at','updated_at'];

    protected $fillable=['slug','marca','modelo','telefono','color','imei','foto', 'elemento_creo', 'elemento_edito','deleted_at','detenido_id'];

    //Relacion muchos a muchos
    public function detenidos(){
		return $this->belongsToOne(Detenido::class);
	}

    //Relacion uno a uno polimorfica
	public function fotodetenido(){
		return $this->morphOne('App\Models\Admin\Foto','fotodetenidable');
	}
    //Relacion muchos a muchos
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
