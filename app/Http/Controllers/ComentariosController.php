<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Comentario;
use App\User;
use Session;
use DB;
use Auth;

class ComentariosController extends Controller
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

            $comentarios=DB::table('comentarios as c')
            ->join('publicacions as p', 'c.publicacions_id', '=', 'p.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->select('c.id', 'c.fecha', 'c.comentario',  'c.estado', 'u.name', 'p.titulo')
            ->where('c.comentario','LIKE', '%'.$query.'%')
            ->orwhere('c.fecha','LIKE', '%'.$query.'%')
            ->orderBy('c.id', 'desc')
            ->paginate(7);

            return view('comentarios.index', ["comentarios"=>$comentarios, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $comentarios= new Comentario;
        $comentarios->comentario=$request->get('comentario');
        // para capturar el id del usuario que esta logeado
        $comentarios['user_id']=Auth::user()->id;
        $fecha = Carbon::now();
        $fecha = $fecha->format('d-m-Y');
        $comentarios->fecha=$fecha;
        $comentarios->estado='Espera';
        $inputs=Input::all();
        $vista=['publicacions_id'];
        $comentarios->publicacions_id=$inputs['publicacions_id'];
        $comentarios->save();
        

        // revisar esta linea de codigo
    return back()->with('message' , 'Comentario Creado Correctamente, Se revisara y dentro de unos minutos se publicara Gracias');
       
        
       
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
        $comentario= Comentario::findOrFail($id);
        
        $comentario->comentario=$request->get('comentario');
        $comentario->update(); 
        
        return back()->with('message' , 'Comentario Modificado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario=Comentario::findOrFail($id);
        $comentario->estado='Aprobado';
        $comentario->update();
        return Redirect::to('/comentarios');
    }
}
