<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'apellidos', 'email', 'tienda_id'];

    public function tienda() {
        return $this->belongsTo(Tienda::class);
    }

    //Scope-------------------------------
    public function scopeTienda($query, $v)
    {
        if ($v == '%') {
            return $query->where('tienda_id', 'like', $v);
        }
        return $query->where('tienda_id', $v);
        //$query->where('tienda_id', '='. $v);
    }
}
