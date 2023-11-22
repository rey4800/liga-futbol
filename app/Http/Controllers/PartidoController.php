<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Equiposinscrito;
use App\Models\Estado;
use App\Models\Partido;
use App\Models\Torneo;
use Illuminate\Http\Request;

/**
 * Class PartidoController
 * @package App\Http\Controllers
 */
class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_torneo)
    {
       // $partidos = Partido::paginate();
       $torneo = Torneo::find($id_torneo);
       // $equiposinscritos = Equiposinscrito::select('*')->where('torneo_id','=',$torneo->id)->get();
       $partidos = Partido::select('*')->where('torneo_id','=',$torneo->id)->get();
       $i =0;
      
        return view('partido.index', compact('partidos','torneo','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_torneo)
    {
        $partido = new Partido();
        $torneo = Torneo::find($id_torneo);
        $estado = Estado::pluck('estado','id');
       // $equipos = Equiposinscrito::where('torneo_id', $torneo->id)->pluck('id');
      // $equipos = Equipo::pluck('nombre', 'id');
       //  $equipos = Equiposinscrito::select('id')->where('torneo_id','=',$torneo->id)->get();


       $equipos = Equiposinscrito::where('torneo_id', $torneo->id)
       ->join('equipos', 'equiposinscritos.equipo_id', '=', 'equipos.id')
       ->pluck('equipos.nombre','equipos.id');
         

       
        return view('partido.create', compact('partido','torneo','equipos','estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Partido::$rules);
        
        $request->validate([
            'equipo_local_id' => 'required',
            'equipo_visitante_id' => 'required|different:equipo_local_id',
            // Resto de las reglas de validación
        ]);

        $id_torneo= $request->torneo_id;

        $partido = Partido::create($request->all());

        return redirect()->route('partido.index',$id_torneo)
            ->with('success', 'Se creo el partido con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_torneo,$id)
    {
        $partido = Partido::find($id);
        $torneo = Torneo::find($id_torneo);

        return view('partido.show', compact('partido','torneo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_torneo,$id)
    {
        $partido = Partido::find($id);
        $torneo = Torneo::find($id_torneo);
        $estado = Estado::pluck('estado','id');
        
       $equipos = Equiposinscrito::where('torneo_id', $torneo->id)
       ->join('equipos', 'equiposinscritos.equipo_id', '=', 'equipos.id')
       ->pluck('equipos.nombre','equipos.id');

        return view('partido.edit', compact('partido','torneo','estado','equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Partido $partido
     * @return \Illuminate\Http\Response
     */
    public function update($torneo_id,Request $request, Partido $partido)
    {
        request()->validate(Partido::$rules);

        $partido->update($request->all());

        return redirect()->route('partido.index',$torneo_id)
            ->with('success', 'Partido Actualizado con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($torneo_id,$id)
    {
        $partido = Partido::find($id)->delete();

        return redirect()->route('partido.index',$torneo_id)
            ->with('success', 'Partido Eliminado con Exito');
    }
}
