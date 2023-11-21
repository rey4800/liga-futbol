<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use App\Models\Genero;
use App\Models\Jugadore;
use App\Models\Posicione;
use Illuminate\Http\Request;

/**
 * Class JugadoreController
 * @package App\Http\Controllers
 */
class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugadore::paginate();

        return view('jugadore.index', compact('jugadores'))
            ->with('i', (request()->input('page', 1) - 1) * $jugadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadore = new Jugadore();
        $equipos = Equipo::pluck('nombre','id');
        $genero = Genero::pluck('nombre','id');
        $posiciones = Posicione::pluck('posicion','id');
        return view('jugadore.create', compact('jugadore','genero', 'posiciones','equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Jugadore::$rules);

        $file = $request->file('imagen');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/fotos', $fileName);

        $jugadortemp = [
            'nombre' =>$request->nombre,
            'apellido' =>$request->apellido,
            'edad' =>$request->edad, 
            'genero_id' =>$request->genero_id, 
            'dni' =>$request->dni, 
            'equipo_id' =>$request->equipo_id,
            'posicion_id' =>$request->posicion_id,
            'numero_jugador' =>$request->numero_jugador,
            'telefono' =>$request->telefono,
            'direccion' =>$request->direccion,
            'nombre_responsable' =>$request->nombre_responsable,
            'dni_responsable' =>$request->dni_responsable,       
            'imagen'=>$fileName 
        ];
        
        $jugadore = Jugadore::create($jugadortemp);
        
        
       // $jugadore = Jugadore::create($request->all());

        return redirect()->route('jugadore.index')
            ->with('success', 'Jugador Creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugadore = Jugadore::find($id);
      

        return view('jugadore.show', compact('jugadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadore = Jugadore::find($id);
        $equipos = Equipo::pluck('nombre','id');
        $genero = Genero::pluck('nombre','id');
        $posiciones = Posicione::pluck('posicion','id');
        $jugadore->imagen = asset('storage/fotos/' . $jugadore->imagen);

        return view('jugadore.edit', compact('jugadore','genero', 'posiciones','equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Jugadore $jugadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugadore $jugadore)
    {
        //request()->validate(Jugadore::$rules);

        $fileName = '';
        $jugador1 = Jugadore::find($jugadore->id);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/fotos', $fileName);
            if ($jugador1->imagen) {
                Storage::delete('public/fotos/' . $jugador1->imagen);
            }
        } else {
            $fileName = $jugador1->imagen;
            
        }

        $jugadortemp = [
            'nombre' =>$request->nombre,
            'apellido' =>$request->apellido,
            'edad' =>$request->edad, 
            'genero_id' =>$request->genero_id, 
            'dni' =>$request->dni, 
            'equipo_id' =>$request->equipo_id,
            'posicion_id' =>$request->posicion_id,
            'numero_jugador' =>$request->numero_jugador,
            'telefono' =>$request->telefono,
            'direccion' =>$request->direccion,
            'nombre_responsable' =>$request->nombre_responsable,
            'dni_responsable' =>$request->dni_responsable,       
            'imagen'=>$fileName 
        ];

       // $jugadore->update($request->all());

      $jugador1->update($jugadortemp);

        return redirect()->route('jugadore.index')
            ->with('success', 'Jugador Actuzalizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jugadore = Jugadore::find($id);

        if (Storage::delete('public/fotos/' . $jugadore->imagen)) {
           
            $jugadore->delete();
        }


        return redirect()->route('jugadore.index')
            ->with('success', 'Jugador Eliminado con Exito');
    }
}
