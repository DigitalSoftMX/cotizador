<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Estacion;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('users.index', ['users' => $model->all()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request, Role $roles)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        $ultimo_refistro = User::get()->last();
        $user = User::find($ultimo_refistro->id);
        $user->roles()->attach($request->rol);

        return redirect()->route('user.index')->withStatus(__('Usuario creada con éxito'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Request $request, Estacion $estacion, Role $roles)
    {
        $request->user()->authorizeRoles(['Administrador']);
        //$estacion = Estacion::all();
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $request->user()->authorizeRoles(['Administrador']);

        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        $user->roles()->updateExistingPivot($request->rol_actual,['role_id'=>$request->rol]);

        return redirect()->route('user.index')->withStatus(__('Usuario actualizado con éxito.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('Usuario eliminada exitosamente.'));
    }
}
