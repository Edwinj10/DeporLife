<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PublicacionesRequest;
use Illuminate\Support\Facades\Storage;
use App\Publicacio;
use App\Comentario;
use App\Etiqueta;
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

        $publicaciones=DB::table('publicacios as p')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select('p.id', 'p.titulo',  'p.descripcion', 'p.foto','p.importante', 'p.resumen', 'p.tipo', 'c.categoria', 'u.name')
        ->where('p.titulo','LIKE', '%'.$query.'%')
        ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('p.id', 'desc')
        ->paginate(7);

        $categorias=DB::table('categoris as c')

        ->select('c.*')
        ->get();

        
        $tags = Etiqueta::orderBy('id', 'DESC')->paginate(50);

        return view('publicaciones.index', ["publicaciones"=>$publicaciones, 'categorias'=>$categorias, "searchText"=>$query, 'tags'=>$tags]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {




      // return view ('publicaciones/create', ['categorias'=> $categorias]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionesRequest $request)
    {
      if($request->hasFile('foto'))
      {
        $publicacion= new Publicacio;
        $foto= $request->file('foto');
        $filename= time(). '.'. $foto->getClientOriginalExtension();
        Image::make($foto)->resize(970,580)->save(public_path('/imagenes/publicaciones/'.$filename));
        
        $publicacion->titulo=$request->get('titulo');
        // slug
        $slug = str_slug($publicacion->titulo, "-");
        $publicacion->slug=$slug;
        $publicacion->descripcion=$request->get('descripcion');
        $publicacion->resumen=$request->get('resumen');
        $publicacion->importante=$request->get('importante');
        $publicacion->tipo=$request->get('tipo');
        $publicacion->total_visitas='0';
        $publicacion->foto=$filename;
        // para capturar el id del usuario que esta logeado
        $publicacion['user_id']=Auth::user()->id;
        $publicacion->categoria_id=$request->get('categoria');
      // $fecha = Carbon::now();
      // $fecha = $fecha->format('d-m-Y');
      // $publicacion->fecha=$fecha;
      // $hora = Carbon::now();
      // $hora->toTimeString();  
      // $publicacion->hora=$hora;

        $publicacion->save();

        $publicacion->etiquetas()->attach($request->get('tags'));
        // return $publicacion;
        

        return redirect('/publicaciones')->with('message' , 'Publicacion Creada Correctamente');
      }
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
        $publicacion=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto','publicacios.slug' )
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        ->where('categoris.categoria', '=', $categoria)
        ->where('publicacios.slug', '=', $slug)
        ->first();

        $categorias=DB::table('categoris as c')
        ->join('publicacios as p', 'p.categoria_id', '=', 'c.id')
        ->select('p.id','p.titulo', 'p.slug', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'c.categoria')
        ->where('p.id', '=',$publicacion->id)
        ->get();

        $users=DB::table('users as u')
        ->join('publicacios as p', 'p.user_id', '=', 'u.id')
        ->select('u.id', 'u.name')
        ->where('p.id', '=',$publicacion->id)
        ->get();

        $sugerencias=DB::table('publicacios as p')

        ->select('p.id','p.titulo', 'p.descripcion', 'p.foto', 'p.importante' , 'p.tipo', 'p.resumen', 'p.created_at', 'p..categoria_id', 'p.slug')
        ->where('p.tipo', '=', $publicacion->tipo)
        ->where('p.categoria_id', '=', $publicacion->categoria_id)
        ->where('p.id', '!=', $publicacion->id)
        ->paginate(4);

        $latest=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.foto', 'publicacios.created_at', 'categoris.categoria', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->where('publicacios.id', '!=', $publicacion->id)
        ->orderBy('publicacios.id', 'desc')
        ->paginate(6);;;
        $variable = Publicacio::find($publicacion->id);

        if(Cache::has($publicacion->id)==false){
                // Cache::add($id,'contador',0.30);
          Cache::add($publicacion->id,'contador',0.01);
          $variable->total_visitas++;
          $variable->save();
        }

      }
      return view ('publicaciones.show', ['publicacion'=>$publicacion, 'variable'=>$variable, 'sugerencias'=>$sugerencias, 'users'=>$users, 'categorias'=>$categorias, 'latest'=>$latest, "searchText"=>$query]);


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

      return view ('publicaciones.edit', ['publicacion'=>Publicacio::findOrFail($id)]);
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
      $publicacion= Publicacio::findOrFail($id);
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
      $publicacion=DB::table('publicacios')->where('id', '=', $id)->delete();
      Session::flash ('message', 'Eliminado Correctamente');
      return redirect::to('/publicaciones');
    }
  }
