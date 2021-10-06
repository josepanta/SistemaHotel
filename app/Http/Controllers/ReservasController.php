<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Models\Habitacione;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\ReservaHabitacione;
use App\Models\TipoReserva;
use App\Models\User;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();  

        return view('reservar.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $habitaciones = Habitacione::all();
        $tipos_reservas = TipoReserva::all();
        $estados = ['Reservada', 'Pagada', 'Cancelada', 'Inactiva']; 

        return view('reservar.create', compact('users', 'habitaciones', 'estados', 'tipos_reservas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservaRequest $request)
    {
        $array = json_decode($request->tabla_array);

        $reserva = Reserva::create($request->all());     

        foreach($array as $row){
            ReservaHabitacione::create([
                "fecha_inicio" => $row->fecha_inicio,
                "fecha_fin" => $row->fecha_fin,
                "habitacion_id" => $row->habitacion,
                "reserva_id" => $reserva->id
            ]); 
        }

        return redirect()->route('reservas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva_habitaciones = ReservaHabitacione::where("reserva_id", $id)->get();

        $users = User::all();
        $habitaciones = Habitacione::all();
        $tipos_reservas = TipoReserva::all();
        $estados = ['Reservada', 'Pagada', 'Cancelada', 'Inactiva']; 

        return view('reservar.show', compact('reserva', "reserva_habitaciones", 'users', 'habitaciones', 'estados', 'tipos_reservas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva_habitaciones = ReservaHabitacione::where("reserva_id", $id)->get();

        $users = User::all();
        $habitaciones = Habitacione::all();
        $tipos_reservas = TipoReserva::all();
        $estados = ['Reservada', 'Pagada', 'Cancelada', 'Inactiva']; 

        return view('reservar.edit', compact('reserva', "reserva_habitaciones", 'users', 'habitaciones', 'estados', 'tipos_reservas'));
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
        $array = json_decode($request->tabla_array);

        $reserva = Reserva::findOrFail($id);
        $reserva->fill($request->all());
        $reserva->save();

        ReservaHabitacione::where("reserva_id", $id)->delete();

        foreach($array as $row){
            ReservaHabitacione::create([
                "fecha_inicio" => $row->fecha_inicio,
                "fecha_fin" => $row->fecha_fin,
                "habitacion_id" => $row->habitacion,
                "reserva_id" => $reserva->id
            ]); 
        }
        
        return redirect()->route('reservas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = "Inactiva";
        $reserva->save();
    }

    public function habitacionesLibres($fecha_inicio, $fecha_fin)
    {
        $habitaciones = Habitacione::all();
        $habitacionesLibres = collect([]); 

        foreach($habitaciones as $habitacion){
            $reservas = ReservaHabitacione::where('habitacion_id', $habitacion->id)->get();
            foreach($reservas as $reserva){
                $cont = 0;
                if($reserva->fecha_fin > $fecha_inicio || $reserva->fecha_inicio < $fecha_fin){
                    $cont++;
                }
            }
            if($cont != 0){
                $habitacionesLibres->push($habitacion);
            } 
        }

        return response()->json($habitacionesLibres);
    }
}
