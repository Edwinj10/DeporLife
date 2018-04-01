<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EtiquetaRequest;
// use App\Http\Requests\ComentariosUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Etiqueta;
use App\Publicacion;
use App\User;
use Session;
use DB;
use Auth;
use Cache;
use Image;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listall()
    {
        $tags=DB::table('etiquetas as e')
        ->select('e.*')
        ->paginate(50);

        return view('tags.list', ["tags"=>$tags]);
    }
    public function index()
    {
        $tags=DB::table('etiquetas as e')
        ->select('e.*')
        ->orderBy('e.id', 'desc')
        ->paginate(50);

        return view('tags.index', ["tags"=>$tags]);
    }
    public function listtags()
    {
        $tags = Etiqueta::orderBy('id', 'DESC')->paginate(50);

        return view('publicaciones.etiquetas', ["tags"=>$tags]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtiquetaRequest $request)
    {
         // ajax
        if ($request->ajax()) 
        {
            $result = Etiqueta::create($request->all());
            
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
        $tag = Etiqueta::find($id);
        return response()->json($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtiquetaRequest $request, $id)
    {
        if ($request->ajax())
        {
          $tag = Etiqueta::findOrFail($id);
          $input =  $request->all();
          $result = $tag->fill($input)->save();

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
        $tag=Etiqueta::findOrFail($id);
        $result = $tag->delete();
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
