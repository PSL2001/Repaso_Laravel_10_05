<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Exception;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiendas = Tienda::orderBy('nombre')->orderBy('localidad')->paginate(5);
        return view('tiendas.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validamos
        // dd("metodo store");
        $request->validate([
            //Algo falla aqui, revisar
            //Nota: Ahora si funciona, npi de lo que fallaba
            'nombre'=>['required', 'string', 'min:3', 'max:50', 'unique:tiendas,nombre'],
            'localidad'=>['required', 'string', 'min:3', 'max:90'],
            'direccion'=>['required', 'string', 'min:3', 'max:120'],
            'email'=>['required', 'string', 'min:3', 'max:50', 'unique:tiendas,email']
            // 'nombre'=>['required', 'string', 'min:3'],
            // 'localidad'=>['required'],
            // 'direccion'=>['required'],
            // 'email'=>['required']
          ]);
        //2. Procesamos
        try {
            Tienda::create($request->all());
        } catch (Exception $ex) {
            return redirect()->route('tiendas.index')->with('mensaje', "Error al crear la tienda, ".$ex->getMessage());
        }
        return redirect()->route('tiendas.index')->with('mensaje', "Tienda creada");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(Tienda $tienda)
    {
        return view('tiendas.mostrar', compact('tienda'));
        //compact('tienda') ===> ['tienda'=>$tienda]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tienda $tienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tienda $tienda)
    {
        try {
            $tienda->delete();
        } catch (Exception $ex) {
            return redirect()->route('tiendas.index')->with('mensaje', "Error al borrar la tienda, ".$ex->getMessage());
        }
        return redirect()->route('tiendas.index')->with('mensaje', "Tienda borrada");
    }
}
