<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
/*Declarar estas lbrerias , las uso en el metodo edit*/
use Session;
use DB;
use Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function __construct(){
        // para los midelware
        $this->middleware('auth');
        $this->middleware('admin', ['only'=> ['create', 'edit']]);
    }

    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $usuarios=DB::table('users as u')
            ->select('u.*')
            ->where('u.name','LIKE', '%'.$query.'%')
            ->orwhere('u.email','LIKE', '%'.$query.'%')
            ->orderBy('u.id', 'desc')
            ->paginate(10);

            return view('usuario.index', ["usuarios"=>$usuarios, "searchText"=>$query]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        
        $usuario= new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->tipo=$request->get('tipo');
        $usuario->password=bcrypt($request["password"]);


        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $usuario->foto=$file->getClientOriginalName();

        }
           
        $usuario->save();


        return redirect('/usuarios')->with('message','Usuario Creado Correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuario.show',['usuario'=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('usuario.edit', ['usuario'=>User::findOrFail($id)]);
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
        $usuario= User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->tipo=$request->get('tipo');
        $usuario->password=bcrypt($request["password"]);


        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/usuarios/', $file->getClientOriginalName());
            $usuario->foto=$file->getClientOriginalName();

        }
           
        $usuario->save();


        return redirect('/usuarios')->with('message','Usuario Actualizado Correctamente');

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
