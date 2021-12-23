<?php

namespace App\Http\Controllers\Admin;

use App\Rol;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        // dd($users);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('editar-users')){
            return redirect(route('admin.users.index'));
        }
        $bd_roles = Rol::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $bd_roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;

        // Mensaje de operacion exitosa/erronea
        if($user->save()){
            $request->session()->flash('success', 'El usuario ' . $user->name . ' ha sido actualizado');
        }else{
            $request->session()->flash('error', 'Ha ocurrido un error al actualizar.');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('eliminar-users')){
            return redirect(route('admin.users.index'));
        }
        //dd($request);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
