<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PortadaRequest;
use App\Portada;
use Carbon\Carbon;
use App\User;
use Session;
use DB;
use Auth;
use Image;

class PortadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       // $this->middleware('auth');

        $this->middleware('auth', ['only' => ['create', 'destroy', 'edit']]);
    } 
    
    public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $portadas=DB::table('portadas as p')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.resumen','p.tipo','u.name', 'c.categoria')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(7);

            return view('portadas.index', ["portadas"=>$portadas, "searchText"=>$query]);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=DB::table('categoris as c')
        
        ->select('c.*')
        ->get();
        return view ('portadas.create', ['categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortadaRequest $request)
    {

        $portada= new Portada;
        $portada->titulo=$request->get('titulo');
        $portada->descripcion=$request->get('descripcion');
        $portada->resumen=$request->get('resumen');
        $portada->tipo=$request->get('tipo');
        // para capturar el id del usuario que esta logeado
        $portada['user_id']=Auth::user()->id;
        $portada->categoria_id=$request->get('categoria');
        
        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(960,450)->save(public_path('/imagenes/portada/'.$filename));
            $portada->foto=$filename;
        }   

        $portada->save();
        // $portada->save();    

        return redirect('/portadas')->with('message' , 'Portada Creada Correctamente');
        // para saber que usuario esta logeado
        // return $request-> user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {


        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $portada = DB::table('portadas as p')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            // la calse db raw es para que multiplique por cada detalle de ingreso la cantidad por el precio de compra y lo guadara en ul total para mostralo despues
            ->select('p.id','p.titulo', 'p.descripcion', 'p.foto', 'p.resumen')
            ->where('p.id', '=',$id)
            // para solo obtener el primer ingreso que quiero ver
            ->first();

            $users=DB::table('users as u')
            ->join('portadas as p', 'p.user_id', '=', 'u.id')
            ->select('u.id', 'u.name')
            ->where('p.id', '=',$id)
            ->get();


            return view ('portadas.show', ['portada'=>$portada, 'users'=>$users,"searchText"=>$query]);


        }
    }
    

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view ('portadas.edit', ['portada'=>Portada::findOrFail($id)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortadaRequest $request, $id)
    {
        $portada= Portada::findOrFail($id);
        $portada->titulo=$request->get('titulo');
        $portada->descripcion=$request->get('descripcion');
        $portada->resumen=$request->get('resumen');
        $portada->tipo=$request->get('tipo');
        // para capturar el id del usuario que esta logeado
        $portada['user_id']=Auth::user()->id;
        
        
        if($request->hasFile('foto'))
        {
            $foto= $request->file('foto');
            $filename= time(). '.'. $foto->getClientOriginalExtension();
            Image::make($foto)->resize(960,450)->save(public_path('/imagenes/portada/'.$filename));
            $portada->foto=$filename;
        }   

        $portada->update();
        // $portada->save();    

        return redirect('/portadas')->with('message' , 'Portada Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $portada=DB::table('portadas')->where('id', '=', $id)->delete();
      Session::flash ('message', 'Eliminado Correctamente');
      return redirect::to('/portadas');
  }
}
