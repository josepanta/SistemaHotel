<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoHabitacionRequest;
use App\Http\Requests\UpdateTipoHabitacionRequest;
use App\Models\TipoHabitacione;
use Illuminate\Http\Request;

class TipoHabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_habitaciones = TipoHabitacione::all();

        return view('habitacion.tipo_habitacion.index', compact('tipo_habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habitacion.tipo_habitacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoHabitacionRequest $request)
    {
        TipoHabitacione::create($request->all());
        
        return redirect()->route('tipo_habitaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_habitacion = TipoHabitacione::findOrFail($id);

        return view('habitacion.tipo_habitacion.show', compact('tipo_habitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_habitacion = TipoHabitacione::findOrFail($id);

        return view('habitacion.tipo_habitacion.edit', compact('tipo_habitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoHabitacionRequest $request, $id)
    {
        $tipo_habitacion = TipoHabitacione::findOrFail($id);
        $tipo_habitacion->nombre = $request->nombre;
        $tipo_habitacion->descripcion = $request->descripcion;
        $tipo_habitacion->precio = $request->precio;
        $tipo_habitacion->save();

        return redirect()->route('tipo_habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoHabitacione::destroy($id);

        return redirect()->route('tipo_habitaciones.index');
    }
}
