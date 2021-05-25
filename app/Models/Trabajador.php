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
        if ($v == '%') { //Si no hacemos esto la tabla sale vacia
            return $query->where('tienda_id', 'like', $v);
        }
        return $query->where('tienda_id', $v);
        //$query->where('tienda_id', '='. $v);
    }
    public function scopeApellidos($query, $v)
    {
        if (!isset($v)) {
            return $query->where('apellidos', 'like', '%');
        }
        switch ($v) {
            case '%':
                return $query->where('apellidos', 'like', '%');
                break;
            case '1':
                return $query->where('apellidos', 'like', 'a%')
                ->orWhere('apellidos', 'like', 'b%')
                ->orWhere('apellidos', 'like', 'c%')
                ->orWhere('apellidos', 'like', 'd%')
                ->orWhere('apellidos', 'like', 'e%')
                ->orWhere('apellidos', 'like', 'f%');
                break;
            case '2':
                return $query->where('apellidos', 'like', 'g%')
                ->orWhere('apellidos', 'like', 'h%')
                ->orWhere('apellidos', 'like', 'i%')
                ->orWhere('apellidos', 'like', 'j%')
                ->orWhere('apellidos', 'like', 'k%')
                ->orWhere('apellidos', 'like', 'l%')
                ->orWhere('apellidos', 'like', 'm%');
                break;
            case '3':
                return $query->where('apellidos', 'like', 'n%')
                ->orWhere('apellidos', 'like', 'ñ%')
                ->orWhere('apellidos', 'like', 'o%')
                ->orWhere('apellidos', 'like', 'p%')
                ->orWhere('apellidos', 'like', 'q%')
                ->orWhere('apellidos', 'like', 'r%')
                ->orWhere('apellidos', 'like', 's%')
                ->orWhere('apellidos', 'like', 't%');
                break;
            case '4':
                return $query->where('apellidos', 'like', 'u%')
                ->orWhere('apellidos', 'like', 'v%')
                ->orWhere('apellidos', 'like', 'w%')
                ->orWhere('apellidos', 'like', 'x%')
                ->orWhere('apellidos', 'like', 'y%')
                ->orWhere('apellidos', 'like', 'z%');
                break;
        }
    }
}
