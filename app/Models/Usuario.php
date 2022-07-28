<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $primaryKey = 'usuario';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
