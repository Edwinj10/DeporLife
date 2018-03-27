<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComentariosRequest;
use App\Http\Requests\ComentariosUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Comentario;
use App\Publicacion;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;

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
            ->join('publicacios as p', 'c.publicacions_id', '=', 'p.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->select('c.id', 'c.fecha', 'c.comentario',  'c.estado', 'u.name', 'p.titulo')
            ->where('c.comentario','LIKE', '%'.$query.'%')
            ->orwhere('c.fecha','LIKE', '%'.$query.'%')
            ->orderBy('c.id', 'desc')
            ->paginate(7);

            return view('comentarios.index', ["comentarios"=>$comentarios, "searchText"=>$query]);
        }
    }
    public function listall(Request $request, $categoria, $slug)
    {

     if ($request) 
     {   

        $query=trim($request->get('searchText'));
        $publicacion = DB::table('publicacios as p')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->select('p.id','p.titulo', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'p.resumen', 'p.created_at', 'p.categoria_id', 'p.slug', 'c.categoria')
        ->where('c.categoria', '=', $categoria)
        ->where('p.slug', '=',$slug)

            // para solo obtener el primer ingreso que quiero ver
        ->first();    

        $comentario=Comentario::select('comentarios.id as Id','comentarios.user_id as user_id', 'comentarios.comentario', 'comentarios.created_at', 'comentarios.estado', 'publicacios.titulo', 'users.name', 'users.foto', 'comentarios.publicacions_id')
        ->join('publicacios', 'publicacios.id', '=' ,'comentarios.publicacions_id')
        ->join('users', 'users.id', '=' ,'comentarios.user_id')
        ->where('comentarios.publicacions_id', '=',$publicacion->id)
        ->orderBy('comentarios.id', 'desc')
        ->paginate(2);
        

    }
    return view ('publicaciones.list', ['publicacion'=>$publicacion, 'comentario'=>$comentario]);
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
    public function store(ComentariosRequest $request)
    {
        // ajax
        if ($request->ajax()) 
        {
            $result = Comentario::create($request->all());
            
            if ($result) {
                Session::flash('save', 'Se ha creado Correctamente');
                return response()->json(['success' => 'true']);
            }
            else
            {
                return response()->json(['success' => 'false']);
            }
        } 

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
        $comentario = Comentario::find($id);
        return response()->json($comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComentariosUpdateRequest $request, $id)
    {
        if ($request->ajax())
        {
          $comentario = Comentario::findOrFail($id);
          $input =  $request->all();
          $result = $comentario->fill($input)->save();

          if ($result) 
          {
              return response()->json(['success' => 'true']);
          }
          else 
          {
            return response()->json(['success' => 'false']);
          }
        }
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
        $result = $comentario->delete();
        if ($result) 
        {
            return response()->json(['success' => 'true']);
        }
        else
        {
            return response()->json(['success'=>'false']);
        }
    }
}
