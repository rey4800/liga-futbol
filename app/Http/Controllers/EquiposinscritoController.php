<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Equiposinscrito;
use App\Models\Torneo;
use Illuminate\Http\Request;

/**
 * Class EquiposinscritoController
 * @package App\Http\Controllers
 */
class EquiposinscritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_torneo)
    {
        $torneo = Torneo::find($id_torneo);
       // $equiposinscritos = Equiposinscrito::paginate();
       $equiposinscritos = Equiposinscrito::select('*')->where('torneo_id','=',$torneo->id)->get();
        $i =0;
        return view('equiposinscrito.index', compact('equiposinscritos','torneo','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_torneo)
    {
        $torneo = Torneo::find($id_torneo);
        //$equipos = Equipo::select('id', 'nombre')->where('id','=','9')->get();
        $equipos = Equipo::pluck('nombre', 'id');
        $equiposinscrito = new Equiposinscrito();
        return view('equiposinscrito.create', compact('equiposinscrito','torneo','equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equiposinscrito::$rules);

        $id_torneo= $request->torneo_id;


        $equiposinscrito = Equiposinscrito::create($request->all());

        return redirect()->route('equiposinscrito.index',$id_torneo)
            ->with('success', 'El Equipo se Incribio al Torneo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_torneo,$id)
    {
        $equiposinscrito = Equiposinscrito::find($id);
        $torneo = Torneo::find($id_torneo);

        return view('equiposinscrito.show', compact('equiposinscrito','torneo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_torneo,$id)
    {
        $equiposinscrito = Equiposinscrito::find($id);
        $torneo = Torneo::find($id_torneo);
      

        return view('equiposinscrito.edit', compact('equiposinscrito','torneo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equiposinscrito $equiposinscrito
     * @return \Illuminate\Http\Response
     */
    public function update($torneo_id,Request $request, Equiposinscrito $equiposinscrito)
    {
       // request()->validate(Equiposinscrito::$rules);

        $id_torneo= $request->torneo_id;
        $equiposinscrito->update($request->all());

        return redirect()->route('equiposinscrito.index',$id_torneo)
            ->with('success', 'Se actualizo con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($torneo_id,$id)
    {
        $equiposinscrito = Equiposinscrito::find($id)->delete();

        return redirect()->route('equiposinscrito.index',$torneo_id)
            ->with('success', 'El Equipo se Elimino de las Inscripciones');
    }
}
