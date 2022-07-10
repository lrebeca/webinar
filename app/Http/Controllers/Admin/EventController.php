<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Models\Exhibitor;
use App\Models\Province;
use App\Models\Unit;
use App\Models\User;
Use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units = Unit::all();
        $events = Event::all();
        $exhibitors = Exhibitor::all();
        
        return view('admin.events.index', compact('events', 'units', 'exhibitors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $exhibitors = Exhibitor::pluck('nombre', 'id')->toArray();
        //$exhibitors = Exhibitor::all();
        $users = User::pluck('name', 'id')->toArray();
        $units = Unit::pluck('unidad', 'id')->toArray();
        $provinces = Province::pluck('provincia', 'id')->toArray();

        $unidad = Unit::join('provinces','units.id_provincia','=','provinces.id')
            ->select('units.unidad','provinces.provincia')
            ->get();

        return view('admin.events.create', compact('users', 'exhibitors', 'units', 'unidad'));

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());
        
        return redirect()->route('admin.events.edit', $event)->with('info','El evento se creo con exito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //return $event;
        $event = Event::all();
        return view('admin.students.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $units = Unit::pluck('unidad', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $exhibitors = Exhibitor::pluck('nombre', 'id')->toArray();
        return view('admin.events.edit', compact('event', 'users', 'units', 'exhibitors'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //

        $event->update(
            $request->all()
        );
        return redirect()->route('admin.events.index', $event)->with('info','El evento se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        redirect()->route('admin.events.index')->with('info','El evento se elimino con exito');
    }
    public function welcome()
    {
        //
        $events = Event::where('estado', 2)->get();

        return view('welcome', compact('events'));
    }
}