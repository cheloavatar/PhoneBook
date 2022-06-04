<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Admin\Celular\Celular;
use App\Models\Admin\Direccion;
use App\Models\Admin\Celular\Contact;
use App\Models\User as ModelsUser;

class Detenido extends Model
{
    protected $dates =['deleted_at'];
	protected $table = 'detenidos';
	protected $hidden = ['created_at','updated_at'];

    protected $fillable=['nombre', 'slug', 'alias','origen', 'foto', 'elemento_creo', 'elemento_edito', 'fecha_nacimiento'];

    use SoftDeletes;

    use HasFactory;

    //Relacion uno a uno polimorfica
	public function fotodetenido(){
		return $this->morphOne('App\Models\Admin\Foto','fotodetenidable');
	}
    //Relacion muchos a muchos
    public function celulars(){
		return $this->hasMany(Celular::class);
	}
    //Relacion uno a uno
    public function direccions(){
		return $this->hasOne(Direccion::class);
	}
    public function usuario() {
        return $this->belongsTo(ModelsUser::class); // eloquent interpretará que la fk es el nombre de la clase en snakecase seguido de _id, o sea 'ciudad_id'
    }
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
