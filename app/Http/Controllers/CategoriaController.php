<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaRequest;
use App\Categori;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use DB;
use Auth;
use Cache;
use Image;

class CategoriaController extends Controller
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
     $categorias=DB::table('categoris as c')
     ->select('c.*')
     ->paginate(50);

     return view('categoria.index', ["categorias"=>$categorias]);

    }
     public function listcategorias()
    {

      $categorias=DB::table('categoris as c')
      ->select('c.*')
      ->orderby('c.categoria', 'desc')
      ->paginate(50);

      return view('categoria.list', ["categorias"=>$categorias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view ('categoria.create');

    }
    public function store(CategoriaRequest $request)
    {

        if ($request->ajax()) 
        {
            $result = Categori::create($request->all());

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
    public function show($id)
    {
        return view ('categoria.show', ['categoria'=>Categoria::findOrFail($id)]);



    }
    public function edit($id)
    {
        $categoria = Categori::find($id);
        return response()->json($categoria);

    }

    public function update(CategoriaRequest $request, $id)
    {
        if ($request->ajax())
        {
          $categoria = Categori::findOrFail($id);
          $input =  $request->all();
          $result = $categoria->fill($input)->save();

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

    public function destroy($id)
    {
        $categoria=Categori::findOrFail($id);
        $result = $categoria->delete();
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


