<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Imagene;
use App\User;
use Session;
use DB;
use Auth;



class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $imagenes=DB::table('imagenes as i')
            ->join('users as u', 'i.user_id', '=', 'u.id')
            ->select('i.id', 'i.titulo', 'i.descripcion', 'i.foto','u.name')
            ->where('i.titulo','LIKE', '%'.$query.'%')
            ->orwhere('i.descripcion','LIKE', '%'.$query.'%')
            ->orderBy('i.id', 'desc')
            ->paginate(7);

            return view('imagenes.index', ["imagenes"=>$imagenes, "searchText"=>$query]);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view ('imagenes/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen= new Imagene;
        $imagen->titulo=$request->get('titulo');
        $imagen->descripcion=$request->get('descripcion');
        // para capturar el id del usuario que esta logeado
        $imagen['user_id']=Auth::user()->id;
        
        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/imagenes/', $file->getClientOriginalName());
            $imagen->foto=$file->getClientOriginalName();

        }
           
        $imagen->save();
           

        return redirect('/fotos')->with('message' , 'Creada Correctamente');
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
            $imagen = DB::table('imagenes as i')
            ->join('users as u', 'i.user_id', '=', 'u.id')
            // la calse db raw es para que multiplique por cada detalle de ingreso la cantidad por el precio de compra y lo guadara en ul total para mostralo despues
            ->select('i.*')
            ->where('i.id', '=',$id)
            // para solo obtener el primer ingreso que quiero ver
            ->first();

            $users=DB::table('users as u')
            ->join('imagenes as i', 'i.user_id', '=', 'u.id')
            ->select('u.id', 'u.name')
            ->where('i.id', '=',$id)
            ->get();
        }


            return view ('imagenes.show', ['imagen'=>$imagen, 'users'=>$users, 'searchText'=>$query]);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        
        return view ('imagenes.edit', ['imagen'=>Imagene::findOrFail($id)]);
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
        $imagen= Imagene::findOrFail($id);
        $imagen->titulo=$request->get('titulo');
        $imagen->descripcion=$request->get('descripcion');
        // para capturar el id del usuario que esta logeado
        $imagen['user_id']=Auth::user()->id;
        
        if (Input::hasFile('foto')) 
        {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/imagenes/', $file->getClientOriginalName());
            $imagen->foto=$file->getClientOriginalName();

        }
           
        $imagen->update();
           

        return redirect('/fotos')->with('message' , 'Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $imagen=DB::table('imagenes')->where('id', '=', $id)->delete();
      Session::flash ('message', 'Eliminado Correctamente');
      return redirect::to('/fotos');
    }
}
