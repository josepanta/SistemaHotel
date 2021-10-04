<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use Illuminate\Http\Request;
use App\Models\Reserva;
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

        return view('reservar.create', compact('users', 'habitaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = json_decode($request->tabla_array);

        foreach($array as $row){
            $user = User::findOrFail($row->user);
            $habitacion = Habitacione::findOrFail($row->habitacion);

            $user->newBooking($habitacion, '2017-07-05 12:44:12', '2017-07-10 18:30:11');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
