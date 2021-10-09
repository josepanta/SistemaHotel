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
        $this->authorize('viewAny', Reserva::class);

        return view('reservar.index');
    }

    public function ajaxIndex()
    {
        $this->authorize('viewAny', Reserva::class);

        $reservas = Reserva::with('user', 'tipo_reserva')->get();

        return datatables($reservas)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Reserva::class);

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
        $this->authorize('create', Reserva::class);

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

        $this->authorize('view', [Reserva::class, $reserva]);

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

        $this->authorize('update', [Reserva::class, $reserva]);

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
        $reserva = Reserva::findOrFail($id);

        $this->authorize('update', [Reserva::class, $reserva]);

        $array = json_decode($request->tabla_array);
        
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

        $this->authorize('delete', [Reserva::class, $reserva]);

        $reserva->estado = "Inactiva";
        $reserva->save();
    }

    public function habitacionesLibres($fecha_inicio, $fecha_fin)
    {
        $this->authorize('viewAny', Reserva::class);

        $habitaciones = Habitacione::all();
        $habitacionesLibres = collect([]); 

        foreach($habitaciones as $habitacion){
            $reservas = ReservaHabitacione::where('habitacion_id', $habitacion->id)->get();

            $cont = 0;
            foreach($reservas as $reserva){
                if($reserva->fecha_fin < $fecha_inicio || $reserva->fecha_inicio > $fecha_fin){
                    $cont++;
                }
            }
            if($cont != 0){
                $habitacionesLibres->push($habitacion);
            } 
        }

        return response()->json($habitacionesLibres);
    }
    
    public function getCalendario()
    {
        $this->authorize('viewAny', Reserva::class);

        return view('reservar.calendario');
    }

    public function getDataCalendario()
    {
        $this->authorize('viewAny', Reserva::class);
        
        $reservas_habitaciones = ReservaHabitacione::all();
        $data = collect([]);

        //['Reservada', 'Pagada', 'Cancelada', 'Inactiva']
        foreach($reservas_habitaciones as $reserva_habitacion){
            switch($reserva_habitacion->reserva->estado){
                case 'Reservada':
                    $color = "#AF7AC5";
                    break;
                case 'Pagada':
                    $color = "#3498DB";
                    break;
                case 'Cancelada':
                    $color = "#E74C3C";
                    break;
                case 'Inactiva':
                    $color = "#E67E22";
                    break;
            }

            $data->push([
                "title" => "Habitacion: ". $reserva_habitacion->habitacion->letra_numero ." - Reserva: ". $reserva_habitacion->reserva->user->name,
                "backgroundColor" => $color,
                "borderColor" => $color,
                "start" => $reserva_habitacion->fecha_inicio,
                "end" => $reserva_habitacion->fecha_fin
            ]);
        }

        return response()->json($data);
    }
}
