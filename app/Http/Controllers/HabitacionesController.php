<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitacionRequest;
use App\Http\Requests\UpdateHabitacionRequest;
use App\Models\Habitacione;
use App\Models\TipoHabitacione;
use Illuminate\Support\Facades\Auth;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Habitacione::class);

        return view('habitacion.index');
    }

    public function ajaxIndex()
    {
        $this->authorize('viewAny', Habitacione::class);

        $habitaciones = Habitacione::with('tipo_habitacion')->get();

        return datatables($habitaciones)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Habitacione::class);

        $tipo_habitaciones = TipoHabitacione::all();
        $estados = ['Activa', 'Inactiva'];
        
        return view('habitacion.create', compact('tipo_habitaciones','estados'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHabitacionRequest $request)
    {
        $this->authorize('create', Habitacione::class);

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

        $this->authorize('view', [Habitacione::class, $habitacion]);

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

        $this->authorize('update', [Habitacione::class, $habitacion]);

        $tipo_habitaciones = TipoHabitacione::all();
        $estados = ['Activa', 'Inactiva'];
        
        return view('habitacion.edit', compact('habitacion', 'tipo_habitaciones','estados'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHabitacionRequest $request, $id)
    {
        $habitacion = Habitacione::findOrFail($id);

        $this->authorize('update', [Habitacione::class, $habitacion]);

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
        $habitacion = Habitacione::destroy($id);

        $this->authorize('delete', [Habitacione::class, $habitacion]);

        return redirect()->route('habitaciones.index');
    }
}
