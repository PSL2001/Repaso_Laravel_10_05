<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'localidad', 'direccion', 'email'];

    public function trabajadores() {
        return $this->hasMany(Trabajador::class);
    }

    public static function getArrayIdNombre() {
        $tienda=Tienda::orderBy('nombre')->get();
        $miarray = [];

        foreach ($tienda as $item) {
            $miarray[$item->id] = $item->nombre;
        }
        return $miarray;
    }
}
