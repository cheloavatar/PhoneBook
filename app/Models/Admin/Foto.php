<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model
{
    protected $dates =['deleted_at'];
    protected $table = 'fotos';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'url', 'nombre','ext','mgb',
    ];

    use HasFactory;
    public function fotodetenidable(){
        return $this->morphTo();

    }
    public function celulable(){
        return $this->morphTo();
    }
}
