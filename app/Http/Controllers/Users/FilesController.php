<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Archivo;
use App\User;
use ArchivoSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
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
        //$archivos = Archivo::where('user_id', Auth::user('id'))->to_list();
        $user_aux = auth()->user()->id;
        $archivos = Archivo::where('user_id', $user_aux)->get();
        // dd($archivos);
        return view('users.files.index')->with('archivos', $archivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $archivo = Archivo::class;
        $users = User::all();

        return view('users.files.create')->with([
            'archivo' => $archivo,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Archivo $archivo)
    {
        //dd($request);

        $user = auth()->user();
        $archivo->user_id = $user->id;

        if ($request->hasFile('file')) {
            $ruta_destino = 'public/archivos/'.$user->name;
            $file = $request->file('file');
            $nombre_archivo = $file->getClientOriginalName();
            $ruta = $request->file('file')->storeAs($ruta_destino, $nombre_archivo);
            $archivo->nombre = $nombre_archivo;
            $archivo->ruta_acceso = str_replace('public', 'storage', $ruta);
        }

        if($archivo->save()){
            $request->session()->flash('success', 'El archivo ha sido cargado exitosamente.');
        }else{
            $request->session()->flash('error', 'Ha ocurrido un error al subir el archivo.');
        }

        return redirect()->route('users.files.index');
    }

}
