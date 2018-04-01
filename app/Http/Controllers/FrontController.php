<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portada;
use App\Publicacio;
use App\Imagene;
use Carbon\Carbon;
use Session;
use Redirect;
use DB;
use Auth;


class FrontController extends Controller
{
    public function __construct()
    {
        // admin es el metodo donde se aplicara el middleware
        $this->middleware('auth', ['only' => 'admin']);
        // para los midelware
        $this->middleware('admin', ['only' => 'admin']);
        Carbon::setLocale('es');  

    }
    public function index(Request $request)
    {

        $latest=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.foto', 'publicacios.created_at', 'categoris.categoria', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(3);;;
        
        $top=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen',
            'publicacios.foto', 'publicacios.created_at', 'categoris.categoria', 'publicacios.total_visitas', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->orderBy('publicacios.total_visitas', 'desc')
        // ->orderBy('publicacios.total_visitas', 'desc')
        ->paginate(3);;;;
        
        $futbolinter=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto','publicacios.slug' )
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        ->where('publicacios.tipo', '=', 'Internacional')
        ->where('categoris.categoria', '=', 'Futbol')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(6);

        $nacional=Publicacio::select('publicacios.id', 'publicacios.slug','publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        ->where('publicacios.tipo', '=', 'Nacional')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(4);  

        $boxeo=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        // ->where('publicacios.tipo', '=', 'Internacional')
        ->where('categoris.categoria', '=', 'Boxeo')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(1); 

        $maxbox=DB::table('publicacios as p')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->select('c.categoria', 'p.tipo')
        ->where('c.categoria', '=', 'Boxeo')
        ->max('p.id');

        $boxeo2=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        // ->where('publicacios.tipo', '=', 'Internacional')
        ->where('categoris.categoria', '=', 'Boxeo')
        ->where('publicacios.id', '!=', $maxbox)
        ->orderBy('publicacios.id', 'desc')
        ->paginate(4); 
        
        $beisbolinter=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        // ->where('publicacios.tipo', '=', 'Internacional')
        ->where('categoris.categoria', '=', 'Beisbol')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(2); 

        $max=DB::table('publicacios as p')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->select('c.categoria', 'p.tipo')
        ->where('c.categoria', '=', 'Beisbol')
        ->where('p.tipo', '=', 'Internacional')
        ->max('p.id');
        
        $m=$max-1;

        // $maximo=DB::table('boletins as b')
        //     ->select('b.*')
        //     ->where('b.id','=', $m)
        //     ->paginate(1);
        // procedimiento de la tabla de index

        $beisbolinter2=Publicacio::select('publicacios.id', 'publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.importante','publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
        ->join('categoris', 'publicacios.categoria_id', '=', 'categoris.id')
        ->join('users', 'publicacios.user_id', '=', 'users.id')
        ->where('publicacios.id', '!=', $max)
        ->where('publicacios.id', '!=', $m)
        ->where('publicacios.importante', '=', 'No')
        ->where('categoris.categoria', '=', 'Beisbol')
        ->where('publicacios.tipo', '=', 'Internacional')
        ->orderBy('publicacios.id', 'desc')
        ->paginate(6);  

        $imagenes = Imagene::paginate(4);

        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $portadas = Publicacio::select('publicacios.id', 'publicacios.slug','publicacios.titulo', 'publicacios.resumen', 'publicacios.descripcion', 'publicacios.created_at', 'publicacios.tipo', 'categoris.categoria', 'publicacios.foto', 'publicacios.slug')
            ->join('categoris','categoris.id','=','publicacios.categoria_id')
            ->join('users','users.id','=','publicacios.user_id')
            ->where('publicacios.importante', '=', 'Si')
            ->where('publicacios.titulo','LIKE', '%'.$query.'%')
            ->orwhere('publicacios.descripcion','LIKE', '%'.$query.'%')
            ->orderBy('publicacios.id', 'desc')
            ->paginate(6);

            // $portadas=DB::table('portadas as p')
            // ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            // ->join('users as u', 'p.user_id', '=', 'u.id')
            // // para seleecionar todo de las dos tablas->select('u.*', 'p.*')
            // ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto', 'p.created_at', 'u.name', 'c.categoria', 'p.resumen')
            // ->where('p.titulo','LIKE', '%'.$query.'%')
            // ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
            // ->orderBy('p.id', 'desc')
            // ->paginate(6);           

        }
        
        return view('/index', ['portadas' => $portadas, 'futbolinter' => $futbolinter, 'nacional' => $nacional, 'latest' => $latest,'top' => $top, 'imagenes' => $imagenes, 'beisbolinter2' => $beisbolinter2, 'beisbolinter'=> $beisbolinter , 'boxeo' => $boxeo, 'boxeo2' =>$boxeo2, "searchText"=>$query]);


    }


    public function admin()
    {
        // if (Auth::user()-> tipo !=0) {
        //     return redirect('/')->with('message' , 'Usted no tiene acceso a esta opcion, ponerse en contacto con el administrador al correo: edwinjosealtamirano@gmail.com');
        // }
        // else
        // {
        return view ('admin.index')->with('message' , 'Bienvenido ');
        // }
        
    }

    public function futbol_nacional(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $futbol=DB::table('publicacios as p')
            ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo','c.categoria', 'u.name', 'p.created_at', 'p.resumen')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Nacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);

            $portadas=DB::table('portadas as p')
            ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto', 'p.created_at', 'u.name', 'c.categoria', 'p.resumen')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Nacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);    

        }

        return view('deportes.futbolnacional', ["futbol"=>$futbol, "portadas"=>$portadas, "searchText"=>$query]);
        
        
        
    }
    public function futbol_internacional(Request $request)
    {
        if ($request) 
        {

            $query=trim($request->get('searchText'));
            $futbolinter=DB::table('publicacios as p')
            ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo', 'p.resumen','c.categoria', 'u.name', 'p.created_at')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Internacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);

            $portadas=DB::table('portadas as p')
            ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto', 'p.created_at', 'u.name', 'c.categoria', 'p.resumen')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Internacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);    



        }

        return view('deportes.futbolinternacional', ["futbolinter"=>$futbolinter, "portadas"=>$portadas, "searchText"=>$query]);
        
    }
    public function busqueda(Request $request)

    {
     if ($request) 
     {

        $query=trim($request->get('searchText'));
        $publicaciones=DB::table('publicacios as p')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo','c.categoria', 'u.name', 'p.created_at')
        ->where('p.titulo','LIKE', '%'.$query.'%')
        ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('p.id', 'desc')
        ->paginate(10);

        $portadas=DB::table('portadas as p')
        ->join('categoris as c', 'p.categoria_id', '=', 'c.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto', 'p.created_at', 'u.name', 'c.categoria', 'p.resumen')
        ->where('p.titulo','LIKE', '%'.$query.'%')
        ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('p.id', 'desc')
        ->paginate(10);    
    }

    return view('busqueda', ["portadas"=>$portadas, "publicaciones"=>$publicaciones, "searchText"=>$query]);
}

public function galeria(Request $request) 
{
    if ($request) 
    {

        $query=trim($request->get('searchText'));
        $galeria=Imagene::orderBy('id', 'desc')->paginate(30);;;
        
    }

    return view ('galeria', ["searchText"=>$query, 'galeria' => $galeria]);

}




}
