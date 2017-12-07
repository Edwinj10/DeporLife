<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Comentario;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Cache;

class AjustesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
       // $this->middleware('auth');

        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit']]);
        Carbon::setLocale('es');
    } 
    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $id = Auth::id();
            $ajustes=User::orderBy('id', 'desc')->where('id', '=',$id)->paginate(3);;;

            
            return view('seguridad.ajustes', ["ajustes"=>$ajustes, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->tipo=$request->get('tipo');
         $usuario->foto=$request->get('foto');
         $usuario->tipo=$request->get('tipo');
        $usuario->password=bcrypt($request["password"]);


        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $usuario->foto=$file->getClientOriginalName();

        }
           
        $usuario->save();

         

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::find($id);
        $contador=count($usuario);
        if($contador>0){          
            return view("formularios.form_editar_usuario")->with("usuario",$usuario);   
        }
        else
        {            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
        }
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
        $ajustes= User::findOrFail($id);
        $ajustes->name=$request->get('name');
        $ajustes->email=$request->get('email');
        $ajustes->tipo=$request->get('tipo');
        // $ajustes->password=bcrypt($request["password"]);


        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $ajustes->foto=$file->getClientOriginalName();

        }
           
        $ajustes->save();

        return back()->with('message' , 'Cambios Realizados Correctamente');
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
