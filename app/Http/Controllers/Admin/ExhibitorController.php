<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitors = Exhibitor::all();

        return view('admin.exhibitors.index', compact('exhibitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exhibitors.create');
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
                'suffix' => 'required',
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'email' => 'required',
                'descripcion' => 'required'
            ]
        );

        $exhibitor = Exhibitor::create($request->all());

        return redirect()->route('admin.exhibitors.index', $exhibitor)->with('info', 'El expositor fue creado ');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Exhibitor $exhibitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Exhibitor $exhibitor)
    {
        return view('admin.exhibitors.edit', compact('exhibitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Exhibitor $exhibitor)
    {
        $request->validate(
            [
                'suffix' => 'required',
                'nombre' => 'required',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'email' => 'required',
                'descripcion' => 'required'
            ]
        );
        $exhibitor->update(
            $request->all()
        );
        return redirect()->route('admin.exhibitors.index', $exhibitor)->with('info', 'El expositor fue actualizado con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Exhibitor $exhibitor)
    {
        $exhibitor->delete();
        return redirect()->route('admin.exhibitors.index')->with('info', 'El expositor fue eliminado');
    
    }
}
