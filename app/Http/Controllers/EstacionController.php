<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Estacion;
use DB;
use Mail;

class EstacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,User $model)
    {
        $request->user()->authorizeRoles(['Administrador','Logistica']);

        $estaciones = DB::table('estacions')->paginate(15);

        return view('estaciones.index', ['estaciones' => $estaciones, 'users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $model)
    {
        $request->user()->authorizeRoles(['Administrador','Logistica']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Estacion $estacion, User $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('estaciones.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,User $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,User $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
    }
}
