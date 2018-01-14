<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PublicacionesRequest;
use App\Publicacion;
use App\Comentario;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;

class PublicacionesController extends Controller
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

        $publicaciones=DB::table('publicacions as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select('p.id', 'p.titulo',  'p.descripcion', 'p.foto','p.importante', 'p.resumen', 'p.tipo', 'p.fecha','c.categoria', 'u.name')
        ->where('p.titulo','LIKE', '%'.$query.'%')
        ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('p.id', 'desc')
        ->paginate(7);

        return view('publicaciones.index', ["publicaciones"=>$publicaciones, "searchText"=>$query]);
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


      $categorias=DB::table('categorias as c')

      ->select('c.*')
      ->get();

      return view ('publicaciones/create', ['categorias'=> $categorias]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionesRequest $request)
    {

      $publicacion= new Publicacion;
      $publicacion->titulo=$request->get('titulo');
        // slug
      $slug = str_slug($publicacion->titulo, "-");
      $publicacion->slug=$slug;
      $publicacion->descripcion=$request->get('descripcion');
      $publicacion->resumen=$request->get('resumen');
      $publicacion->importante=$request->get('importante');
      $publicacion->tipo=$request->get('tipo');
      $publicacion->total_visitas='0';
        // para capturar el id del usuario que esta logeado
      $publicacion['user_id']=Auth::user()->id;
      $publicacion->categoria_id=$request->get('categoria');
      $fecha = Carbon::now();
      $fecha = $fecha->format('d-m-Y');
      $publicacion->fecha=$fecha;
      $hora = Carbon::now();
      $hora->toTimeString();  
      $publicacion->hora=$hora;

      if($request->hasFile('foto'))
      {
        $foto= $request->file('foto');
        $filename= time(). '.'. $foto->getClientOriginalExtension();
        Image::make($foto)->resize(970,580)->save(public_path('/imagenes/publicaciones/'.$filename));
        $publicacion->foto=$filename;
      }   
        // return $publicacion;
      $publicacion->save();


      return redirect('/publicaciones')->with('message' , 'Publicacion Creada Correctamente');
        // para saber que usuario esta logeado
        // return $request-> user();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request, $categoria, $slug)
    {
      if ($request) 
      {   

        $query=trim($request->get('searchText'));
        $publicacion = DB::table('publicacions as p')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->select('p.id','p.titulo', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'p.resumen', 'p.fecha', 'p.created_at', 'p.categoria_id', 'p.slug', 'c.categoria')
        ->where('c.categoria', '=', $categoria)
        ->where('p.slug', '=',$slug)

            // para solo obtener el primer ingreso que quiero ver
        ->first();

        $categorias=DB::table('categorias as c')
        ->join('publicacions as p', 'p.categoria_id', '=', 'c.id')
        ->select('p.id','p.titulo', 'p.slug', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'c.categoria')
        ->where('p.id', '=',$publicacion->id)
        ->get();

        $users=DB::table('users as u')
        ->join('publicacions as p', 'p.user_id', '=', 'u.id')
        ->select('u.id', 'u.name')
        ->where('p.id', '=',$publicacion->id)
        ->get();

        $sugerencias=DB::table('publicacions as p')

        ->select('p.id','p.titulo', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'p.resumen', 'p.fecha', 'p.created_at', 'p..categoria_id', 'p.slug')
        ->where('p.tipo', '=', $publicacion->tipo)
        ->where('p.categoria_id', '=', $publicacion->categoria_id)
        ->where('p.id', '!=', $publicacion->id)
        ->paginate(4);

        

        $comentario=Comentario::select('comentarios.id', 'comentarios.comentario', 'comentarios.created_at', 'comentarios.estado', 'publicacions.titulo', 'users.name', 'users.foto', 'users.id', 'comentarios.publicacions_id')
        ->join('publicacions', 'publicacions.id', '=' ,'comentarios.publicacions_id')
        ->join('users', 'users.id', '=' ,'comentarios.user_id')
        ->where('publicacions.id', '=',$publicacion->id)
        ->orderBy('comentarios.id', 'desc')
        ->paginate(10);

        $latest=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.resumen', 'publicacions.foto', 'publicacions.created_at', 'categorias.categoria', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->where('publicacions.id', '!=', $publicacion->id)
        ->orderBy('publicacions.id', 'desc')
        ->paginate(6);;;
        $variable = Publicacion::find($publicacion->id);

        if(Cache::has($publicacion->id)==false){
                // Cache::add($id,'contador',0.30);
          Cache::add($publicacion->id,'contador',0.01);
          $variable->total_visitas++;
          $variable->save();
        }

      }
      return view ('publicaciones.show', ['publicacion'=>$publicacion, 'variable'=>$variable, 'sugerencias'=>$sugerencias, 'comentario'=>$comentario, 'users'=>$users, 'categorias'=>$categorias, 'latest'=>$latest, "searchText"=>$query]);


    }
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

      return view ('publicaciones.edit', ['publicacion'=>Publicacion::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionesRequest $request, $id)
    {
      $publicacion= Publicacion::findOrFail($id);
        // $fotos =public_path('imagenes/publicaciones').'/'.$publicacion->foto;
        // unlink($fotos);

      $publicacion->titulo=$request->get('titulo');
      $slug = str_slug($publicacion->titulo, "-");
      $publicacion->slug=$slug;
      $publicacion->descripcion=$request->get('descripcion');
      $publicacion->resumen=$request->get('resumen');
      $publicacion->importante=$request->get('importante');
      $publicacion->tipo=$request->get('tipo');
      $publicacion['user_id']=Auth::user()->id;

      if($request->hasFile('foto'))
      {
        $foto= $request->file('foto');
        $filename= time(). '.'. $foto->getClientOriginalExtension();
        Image::make($foto)->resize(970,580)->save(public_path('/imagenes/publicaciones/'.$filename));
        $publicacion->foto=$filename;
      }   
      $publicacion->update(); 

      Session::flash('message','Publicacion Actualizada Correctamente');
      return Redirect::to('/publicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $publicacion=DB::table('publicacions')->where('id', '=', $id)->delete();
      Session::flash ('message', 'Eliminado Correctamente');
      return redirect::to('/publicaciones');
    }
  }
