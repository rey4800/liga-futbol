<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Genero;
use App\Models\Equipo;
use App\Models\Ubicacione;
use Illuminate\Http\Request;

/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();
        $categoria = Categoria::pluck('categoria','id');
        $genero = Genero::pluck('nombre','id');
        $ubicacion = Ubicacione::pluck('ubicacion','id');
        return view('equipo.create', compact('equipo', 'ubicacion','categoria', 'genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equipo::$rules);

        $equipo = Equipo::create($request->all());

        return redirect()->route('equipo.index')
            ->with('success', 'Equipo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $categoria = Categoria::pluck('categoria','id');
        $genero = Genero::pluck('nombre','id');
        $ubicacion = Ubicacione::pluck('ubicacion','id');

        return view('equipo.edit', compact('equipo', 'ubicacion','categoria', 'genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        request()->validate(Equipo::$rules);

        $equipo->update($request->all());

        return redirect()->route('equipo.index')
            ->with('success', 'Equipo actualizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipo.index')
            ->with('success', 'Equipo eliminado con exito');
    }
}
