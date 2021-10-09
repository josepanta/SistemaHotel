<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

use Spatie\Permission\Models\Role;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return view('users.roles.index');
    }

    /**
     * Devuelve la data de roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxIndex()
    {
        $this->authorize('viewAny', Role::class);
        $roles = Role::all();

        return datatables($roles)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        $estados = ['ACTIVO', 'INACTIVO'];

        return view('users.roles.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create', Role::class);

        $request->merge([
            "estado" => "ACTIVO"
        ]);
        
        Role::create($request->all());

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol= Role::findOrFail($id);

        $this->authorize('view', [Role::class, $rol]);

        return view('users.roles.show',compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);

        $this->authorize('update', [Role::class, $rol]);

        $estados=['ACTIVO','INACTIVO'];

        return view('users.roles.edit',compact('estados','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $rol = Role::findOrFail($id);

        $this->authorize('update', [Role::class, $rol]);

        $rol->fill($request->all());
        $rol->save();

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol=Role::findOrFail($id);

        $this->authorize('view', [Role::class, $rol]);

        $rol->estado="INACTIVO";
        $rol->save();

        return redirect()>route('roles.index');
    }
}