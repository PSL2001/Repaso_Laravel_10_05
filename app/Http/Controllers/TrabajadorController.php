<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use App\Models\Trabajador;
use Exception;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajador::orderBy('apellidos')->paginate(5);
        return view('trabajadores.index', compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misTiendas = Tienda::getArrayIdNombre();
        return view('trabajadores.create', compact('misTiendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validamos los datos
        $request->validate([
            'nombre'=>['required', 'string', 'min:4', 'max:35'],
            'apellidos'=>['required', 'string', 'min:8', 'max:80'],
            'email'=>['required', 'string', 'unique:trabajadors,email'],
            'tienda_id'=>['required']
        ]);
        //2. - Procesamos los datos para hacer el insert
        try {
            Trabajador::create($request->all());
            return redirect()->route('trabajadores.index')->with('mensaje', 'Trabajador creado');
        } catch (Exception $ex) {
            return redirect()->route('trabajadores.index')->with('mensaje', 'Error al crear trabajador');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajadore)
    {
        return view('trabajadores.mostrar', compact('trabajadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajadore)
    {
        $misTiendas = Tienda::getArrayIdNombre();
        return view('trabajadores.edit', compact('trabajadore', 'misTiendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajadore)
    {
        //1. Validamos los datos
        $request->validate([
            'nombre'=>['required', 'string', 'min:4', 'max:35'],
            'apellidos'=>['required', 'string', 'min:8', 'max:80'],
            'email'=>['required', 'string', 'unique:trabajadors,email,'.$trabajadore->id],
            'tienda_id'=>['required']
        ]);
        //2. - Procesamos los datos para hacer el insert
        try {
            $trabajadore->update($request->all());
            return redirect()->route('trabajadores.index')->with('mensaje', 'Trabajador actualizado');
        } catch (Exception $ex) {
            return redirect()->route('trabajadores.index')->with('mensaje', 'Error al actualizar trabajador');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajadore)
    {
        try {
            $trabajadore->delete();
        } catch (Exception $ex) {
            return redirect()->route('trabajadores.index')->with('mensaje', "Error al borrar el trabajador, " . $ex->getMessage());
        }
        return redirect()->route('trabajadores.index')->with('mensaje', "Trabajador borrado");
    }
}
