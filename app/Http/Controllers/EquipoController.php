<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Etiqueta;
use Carbon\Carbon;
use App\User;
use App\Liga;
use Session;
use DB;
use Auth;
use Cache;
use Image;
use Validator;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listall()
    {
        $team=DB::table('equipos as e')
        ->select('e.*')
        ->paginate(50);

        return view('equipos.list', ["team"=>$team]);
    }
    public function index()
    {
        $team=DB::table('equipos as e')
        ->select('e.*')
        ->orderBy('e.id', 'desc')
        ->paginate(50);

        return view('equipos.index', ["team"=>$team]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ligas = Liga::orderBy('id', 'DESC')->paginate(50);
         $team=DB::table('equipos as e')
        ->select('e.*')
        ->orderBy('e.id', 'desc')
        ->paginate(50);
        // return 'hola';
        return view ('equipos.create', ['ligas'=> $ligas, 'team'=>$team]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nombre' => 'required',
            // 'apodo' => 'required',
            // 'sitio_web' => 'required',
            // 'pais' => 'required',
            // 'historia' => 'required',
            // 'descripcion' => 'required',
            // 'nombre_estadio' => 'required',
            // 'ligas_id' => 'required',
        ]);


        if ($validator->passes()) {


            $input = $request->all();


            $input['logo'] = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/imagenes/equipos/logos'), $input['logo']);

            $input['uniforme'] = time().'.'.$request->uniforme->getClientOriginalExtension();
            $request->uniforme->move(public_path('/imagenes/equipos/uniformes'), $input['uniforme']);

            $input['plantilla'] = time().'.'.$request->plantilla->getClientOriginalExtension();
            $request->plantilla->move(public_path('/imagenes/equipos/platillas'), $input['plantilla']);

            $input['estadio'] = time().'.'.$request->estadio->getClientOriginalExtension();
            $request->estadio->move(public_path('/imagenes/equipos/estadios'), $input['estadio']);

            


            Equipo::create($input);


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2 (Request $request, $nombre)
    {
        if ($request) 
        {
             $query=trim($request->get('searchText'));
            $equipo=Equipo::select('equipos.*', 'ligas.*', 'equipos.logo as lo' )
            ->join('ligas', 'equipos.ligas_id', '=', 'ligas.id')
            ->where('equipos.nombre', '=', $nombre)
            ->first();

            return view ('equipos.show', ['equipo'=>$equipo, "searchText"=>$query]);
        }
    }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
