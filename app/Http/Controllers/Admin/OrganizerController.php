<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\Province;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $organizers = Organizer::all();

        return view('admin.organizers.index', compact('organizers', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::pluck('provincia', 'id');

        return view('admin.organizers.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'unidad' => 'required',
                'detalle' => 'required',
                'province_id' => 'required'
            ]
        );

        $organizer = Organizer::create($request->all());

        return redirect()->route('admin.organizers.edit', $organizer)->with('info', 'El organizador fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Organizer $organizer)
    {
        $provinces = Province::pluck('provincia', 'id');

        return view('admin.organizers.edit', compact('organizer', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizer $organizer)
    {
        $request->validate(
            [
                'unidad' => 'required',
                'detalle' => 'required',
                'province_id' => 'required'
            ]
        );

        $organizer->update($request->all());

        return redirect()->route('admin.organizers.edit', $organizer)->with('info', 'El organizador fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        $organizer->delete();
        return redirect()->route('admin.organizers.index')->with('info', 'El organizador fue eliminado');
    }
}
