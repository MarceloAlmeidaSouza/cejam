<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorModel extends Model
{
  use HasFactory;
  protected $table='autor';
  protected $fillable = ['name','created_at','updated_at'];
}
