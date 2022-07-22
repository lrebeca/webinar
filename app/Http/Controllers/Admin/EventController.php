<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Models\Exhibitor;
use App\Models\Organizer;
use App\Models\User;
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
        $organizers = Organizer::all();
        $events = Event::all();
        $exhibitors = Exhibitor::all();
        
        return view('admin.events.index', compact('events', 'organizers', 'exhibitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exhibitors = Exhibitor::pluck('nombre', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $organizers = Organizer::all();

        return view('admin.events.create', compact('users', 'exhibitors', 'organizers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = $request->all();
        if($request->hasFile('imagen')){
            $event['imagen'] = $request->file('imagen')->store('events');  
        }

        // if($imagen = $request->file('imagen'))
        // {
        //     $rutaGuardarImg = $imagen->store('events');
        //     $imagenEvent = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenEvent);
        //     $event['imagen'] = "$imagen";
        // }

        Event::create($event);

        return redirect()->route('admin.events.index', $event)->with('info','El evento se creo con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        return view('registers.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $organizers = Organizer::all();
        $users = User::pluck('name', 'id')->toArray();
        $exhibitors = Exhibitor::pluck('nombre', 'id')->toArray();

        return view('admin.events.edit', compact('event', 'users', 'organizers', 'exhibitors'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
      
        $event->update($request->except('imagen'));

        if($request->file('imagen')){

            $image = Storage::put('events', $event['imagen']);

            if($request->file('imagen')){
                Storage::delete($event['imagen']);

                $event->update(['imagen' => $image]);
            }else{
                $event->create(['imagen'=> $image]);
            }
        }
        return $event;
        
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

        return redirect()->route('admin.events.index')->with('info','El evento se elimino con exito');
    }
    public function welcome()
    {
        //
        $events = Event::where('estado', 2)->get();

        return view('welcome', compact('events'));
    }
}