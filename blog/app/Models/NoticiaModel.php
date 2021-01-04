<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiaModel extends Model
{
    use HasFactory;
    protected $table = 'noticia';
    protected $fillable = ['title','description','autor_id','categoria_id','created_at','updated_at'];
    public function autor()
    {
        return $this->hasOne('App\Models\AutorModel','id','autor_id');
    }
    public function categoria()
    {
        return $this->hasOne(CategoriaModel::class,'id','categoria_id');
    }
}
