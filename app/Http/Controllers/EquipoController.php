<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Genero;
use App\Models\Equipo;
use App\Models\Ubicacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $file = $request->file('imagen');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/escudos', $fileName);

        $equipotemp = [
            'nombre' =>$request->nombre,
            'descripcion' =>$request->descripcion,
            'categoria_id' =>$request->categoria_id,
            'ubicacion_id' =>$request->ubicacion_id,  
            'genero_id' =>$request->genero_id, 
            'imagen'=>$fileName 
        ];

       // $equipo = Equipo::create($request->all());
       $equipo = Equipo::create($equipotemp);

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

        $equipo->imagen = asset('storage/escudos/' . $equipo->imagen);

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

        $fileName = '';
        $equipo1 = Equipo::find($equipo->id);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/escudos', $fileName);
            if ($equipo1->imagen) {
                Storage::delete('public/escudos/' . $equipo1->imagen);
            }
        } else {
            $fileName = $request->imagen;
            
        }

        $equipotemp = [
            'nombre' =>$request->nombre,
            'descripcion' =>$request->descripcion,
            'categoria_id' =>$request->categoria_id,
            'ubicacion_id' =>$request->ubicacion_id,  
            'genero_id' =>$request->genero_id, 
            'imagen'=>$fileName 
        ];
        //$equipo->update($request->all());

        $equipo1->update($equipotemp);

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
        $equipo = Equipo::find($id);

        if (Storage::delete('public/escudos/' . $equipo->imagen)) {
           
            $equipo->delete();
        }

        return redirect()->route('equipo.index')
            ->with('success', 'Equipo eliminado con exito');
    }
}
