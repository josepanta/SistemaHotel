<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoReservaRequest;
use App\Http\Requests\UpdateTipoReservaRequest;
use App\Models\TipoReserva;
use Illuminate\Http\Request;

class TipoReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', TipoReserva::class);

        $tipo_reservas = TipoReserva::all();
        return view('reservar.tipo_reservar.index', compact('tipo_reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', TipoReserva::class);

        return view('reservar.tipo_reservar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoReservaRequest $request)
    {
        $this->authorize('create', TipoReserva::class);

        TipoReserva::create($request->all());

        return redirect()->route('tipo_reservas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_reserva = TipoReserva::findOrFail($id);

        $this->authorize('view', [TipoReserva::class, $tipo_reserva]);

        return view('reservar.tipo_reservar.show', compact('tipo_reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_reserva = TipoReserva::findOrFail($id);

        $this->authorize('update', [TipoReserva::class, $tipo_reserva]);

        return view('reservar.tipo_reservar.edit', compact('tipo_reserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoReservaRequest $request, $id)
    {
        $tipo_reserva = TipoReserva::findOrFail($id);

        $this->authorize('update', [TipoReserva::class, $tipo_reserva]);

        $tipo_reserva->nombre = $request->nombre;
        $tipo_reserva->descripcion =$request->descripcion;
        $tipo_reserva->save();

        return redirect()->route('tipo_reservas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_reserva = TipoReserva::destroy($id);

        $this->authorize('update', [TipoReserva::class, $tipo_reserva]);

        return redirect()->route('tipo_reservas.index');
    }
}
