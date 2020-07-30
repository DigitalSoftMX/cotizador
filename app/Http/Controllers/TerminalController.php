<?php

namespace App\Http\Controllers;

use App\Terminal;
use Illuminate\Http\Request;
use App\Http\Requests\TerminalRequest;


class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Terminal $model,Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('terminales.index', ['terminals' => $model::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('terminales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Terminal $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $model->create($request->all());
        return redirect()->route('terminales.index')->withStatus(__('Terminal creada con éxito'));
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
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $terminal=Terminal::findorfail($id);
        return view('terminales.edit',compact('terminal'));
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
        $request->user()->authorizeRoles(['Administrador']);
        $terminal=Terminal::findorfail($id);
        $terminal->update($request->all());
        return redirect()->route('terminales.index')->withStatus(__('Terminal actualizada correctamente.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $terminal=Terminal::findorfail($id);
        $terminal->delete();
        return redirect()->route('terminales.index')->withStatus(__('Terminal eliminada exitosamente.'));
    }
}
