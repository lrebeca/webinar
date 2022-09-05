<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all();
        $events = Event::all();
        
        return view('admin.details.index', compact('details', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        return view('admin.details.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
            ([
                'detalle' => 'required',
                'id_evento' => 'required'
            ]); 

        $detail = Detail::create($request->all());

        return redirect()->route('admin.details.edit', $detail)->with('info', 'El detalle del evento fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Detail $detail)
    {
        $events = Event::pluck('evento', 'id')->toArray();

        return view('admin.details.edit', compact('detail', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //return $request->all();
        $request->validate(
            [
                'detalle' => 'required',
                'id_evento' => 'required'
            ]); 

        $detail->update($request->all());

        return redirect()->route('admin.details.edit', $detail)->with('info', 'El detalle fue actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect()->route('admin.details.index')->with('info', 'El detalle fue eliminado');
    }
}
