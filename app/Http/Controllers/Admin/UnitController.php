<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        $provinces = Province::all();
        
        return view('admin.units.index', compact('units', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $provinces = Province::pluck('provincia', 'id')->toArray();

        return view('admin.units.create', compact('provinces'));
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
                'descripcion' => 'required',
                'id_provincia' => 'required'
            ]
        );
        $unit = Unit::create($request->all());
        
        return redirect()->route('admin.units.index', $unit)->with('info','La unidad se creo con exito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        // $unit = Unit::all();
        // return view('admin.students.index', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $provinces = Province::pluck('provincia', 'id')->toArray();
       
        return view('admin.units.edit', compact('unit', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate(
            [
                'unidad' => 'required',
                'descripcion' => 'required',
                'id_provincia' => 'required'
            ]
        );
        $unit->update(
            $request->all()
        );
        return redirect()->route('admin.units.index', $unit)->with('info','La unidad se actualizo con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('admin.units.index')->with('info','La unidad se elimino con exito');
    }
}
