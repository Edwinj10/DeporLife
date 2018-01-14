<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portada;
use App\Publicacion;
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

        $latest=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.resumen', 'publicacions.foto', 'publicacions.created_at', 'categorias.categoria', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(3);;;
        
        $top=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.resumen',
            'publicacions.foto', 'publicacions.created_at', 'categorias.categoria', 'publicacions.total_visitas', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->orderBy('publicacions.total_visitas', 'desc')
        // ->orderBy('publicacions.total_visitas', 'desc')
        ->paginate(3);;;;
        
        $futbolinter=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.tipo', 'categorias.categoria', 'publicacions.foto','publicacions.slug' )
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        ->where('publicacions.tipo', '=', 'Internacional')
        ->where('categorias.categoria', '=', 'Futbol')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(6);

        $nacional=Publicacion::select('publicacions.id', 'publicacions.slug','publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.tipo', 'categorias.categoria', 'publicacions.foto', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        ->where('publicacions.tipo', '=', 'Nacional')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(4);  

        $boxeo=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.tipo', 'categorias.categoria', 'publicacions.foto', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        // ->where('publicacions.tipo', '=', 'Internacional')
        ->where('categorias.categoria', '=', 'Boxeo')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(1); 

        $maxbox=DB::table('publicacions as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->select('c.categoria', 'p.tipo')
        ->where('c.categoria', '=', 'Boxeo')
        ->max('p.id');

        $boxeo2=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.tipo', 'categorias.categoria', 'publicacions.foto', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        // ->where('publicacions.tipo', '=', 'Internacional')
        ->where('categorias.categoria', '=', 'Boxeo')
        ->where('publicacions.id', '!=', $maxbox)
        ->orderBy('publicacions.id', 'desc')
        ->paginate(4); 
        
        $beisbolinter=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.tipo', 'categorias.categoria', 'publicacions.foto', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        // ->where('publicacions.tipo', '=', 'Internacional')
        ->where('categorias.categoria', '=', 'Beisbol')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(2); 

        $max=DB::table('publicacions as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
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

        $beisbolinter2=Publicacion::select('publicacions.id', 'publicacions.titulo', 'publicacions.fecha', 'publicacions.resumen', 'publicacions.descripcion', 'publicacions.created_at', 'publicacions.importante','publicacions.tipo', 'categorias.categoria', 'publicacions.foto', 'publicacions.slug')
        ->join('categorias', 'publicacions.categoria_id', '=', 'categorias.id')
        ->join('users', 'publicacions.user_id', '=', 'users.id')
        ->where('publicacions.id', '!=', $max)
        ->where('publicacions.id', '!=', $m)
        ->where('publicacions.importante', '=', 'No')
        ->where('categorias.categoria', '=', 'Beisbol')
        ->where('publicacions.tipo', '=', 'Internacional')
        ->orderBy('publicacions.id', 'desc')
        ->paginate(6);  

        $imagenes = Imagene::paginate(4);

        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $portadas = Portada::select('portadas.id', 'portadas.titulo', 'portadas.descripcion','portadas.foto','portadas.created_at', 'users.name', 'categorias.categoria', 'portadas.resumen')
            ->join('categorias','categorias.id','=','portadas.categoria_id')
            ->join('users','users.id','=','portadas.user_id')
            ->where('portadas.titulo','LIKE', '%'.$query.'%')
            ->orwhere('portadas.descripcion','LIKE', '%'.$query.'%')
            ->orderBy('portadas.id', 'desc')
            ->paginate(6);

            // $portadas=DB::table('portadas as p')
            // ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
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
            $futbol=DB::table('publicacions as p')
            ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo', 'p.fecha','c.categoria', 'u.name', 'p.created_at', 'p.resumen')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Nacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);

            $portadas=DB::table('portadas as p')
            ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
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
            $futbolinter=DB::table('publicacions as p')
            ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo', 'p.resumen', 'p.fecha','c.categoria', 'u.name', 'p.created_at')
            ->where('c.categoria', '=', 'Futbol')
            ->where('p.tipo', '=', 'Internacional')
            ->where('p.titulo','LIKE', '%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->paginate(20);

            $portadas=DB::table('portadas as p')
            ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
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
        $publicaciones=DB::table('publicacions as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select('p.id', 'p.titulo', 'p.descripcion', 'p.foto','p.importante', 'p.tipo', 'p.fecha','c.categoria', 'u.name', 'p.created_at')
        ->where('p.titulo','LIKE', '%'.$query.'%')
        ->orwhere('p.descripcion','LIKE', '%'.$query.'%')
        ->orderBy('p.id', 'desc')
        ->paginate(10);

        $portadas=DB::table('portadas as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
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
