<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use DB;

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
        if ($request) 
        {

            $query=trim($request->get('searchText'));

            $categorias=DB::table('categorias')->where('categoria','LIKE', '%'.$query.'%')
            ->orderBy('id', 'asc')
            ->paginate(7);

            return view('categoria.index', ["categorias"=>$categorias, "searchText"=>$query]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categoria.create');

    }
    public function store(CategoriaRequest $request)
    
    {
        $categoria=new Categoria;
        $categoria->categoria=$request->get('categoria');
        $categoria->save();

        return Redirect::to('/categoria');


    }
    public function show($id)
    {
        return view ('categoria.show', ['categoria'=>Categoria::findOrFail($id)]);



    }
    public function edit($id)
    {
        return view ('categoria.edit', ['categoria'=>Categoria::findOrFail($id)]);

    }

    public function update(Request $request, $id)
    {
        $categoria= Categoria::findOrFail($id);
        $categoria->categoria=$request->get('categoria');
        $categoria->update();

        return Redirect::to('/categoria');

    }
    
    public function destroy($id)
    {
        $categoria=DB::table('categorias')->where('id', '=', $id)->delete();
        Session::flash ('message', 'Eliminado Correctamente');
        return redirect::to('/categoria');
        
    }

}

      
      