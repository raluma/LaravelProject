<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesas extends Model
{
    use HasFactory;
    protected $table="mesas";
    protected $primaryKey="id";
    protected $fillable = [
        'numero','estado','capacidad','usuario'
    ];
    public $timestamps = false;
}
