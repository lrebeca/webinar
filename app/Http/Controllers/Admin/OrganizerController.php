<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
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
        $organizers = Organizer::all();

        return view('admin.organizers.index', compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizers.create');
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
                'provincia' => 'required'
            ]
        );

        $organizer = Organizer::create($request->all());

        return redirect()->route('admin.organizers.index', $organizer)->with('info', 'El organizador fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        return view('admin.organizers.edit', compact('organizer'));
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
                'provincia' => 'required'
            ]
        );

        $organizer->update($request->all());

        return redirect()->route('admin.organizers.index', $organizer)->with('info', 'El organizador fue actualizado');
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
