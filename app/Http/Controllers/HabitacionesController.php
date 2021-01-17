<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use App\Models\TipoHabitacione;
use Illuminate\Http\Request;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitaciones = Habitacione::all();
        
        return view('habitacion.index', compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_habitaciones = TipoHabitacione::all();
        $estados = ['ocupada', 'libre', 'mantenimiento'];
        
        return view('habitacion.create', compact('tipo_habitaciones','estados'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Habitacione::create($request->all());
        
        return redirect()->route('habitaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitacion = Habitacione::findOrFail($id);

        return view('habitacion.show', compact('habitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitacion = Habitacione::findOrFail($id);
        $tipo_habitaciones = TipoHabitacione::all();
        $estados = ['ocupada', 'libre', 'mantenimiento'];
        
        return view('habitacion.edit', compact('habitacion', 'tipo_habitaciones','estados'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $habitacion = Habitacione::findOrFail($id);
        $habitacion->letra_numero = $request->letra_numero;
        $habitacion->estado = $request->estado;
        $habitacion->tipo_habitacion_id = $request->tipo_habitacion_id;
        $habitacion->save();

        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Habitacione::destroy($id);

        return redirect()->route('habitaciones.index');
    }
}
