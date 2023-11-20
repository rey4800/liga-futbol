<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

/**
 * Class TorneoController
 * @package App\Http\Controllers
 */
class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::paginate();

        return view('torneo.index', compact('torneos'))
            ->with('i', (request()->input('page', 1) - 1) * $torneos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $torneo = new Torneo();
        return view('torneo.create', compact('torneo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Torneo::$rules);

        $torneo = Torneo::create($request->all());

        return redirect()->route('torneos.index')
            ->with('success', 'Torneo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::find($id);

        return view('torneo.show', compact('torneo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneo = Torneo::find($id);

        return view('torneo.edit', compact('torneo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Torneo $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Torneo $torneo)
    {
        request()->validate(Torneo::$rules);

        $torneo->update($request->all());

        return redirect()->route('torneos.index')
            ->with('success', 'Torneo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id)->delete();

        return redirect()->route('torneos.index')
            ->with('success', 'Torneo deleted successfully');
    }
}
