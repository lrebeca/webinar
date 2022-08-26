<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

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
        $users = User::all();
        
        return view('admin.events.index', compact('events', 'organizers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users = User::pluck('name', 'id')->toArray();
        $organizers = Organizer::all();
        $users = User::all();

        return view('admin.events.create', compact('users', 'organizers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        // return $request->all();
        $event = $request->all();
        if($request->hasFile('imagen')){
            //$event['imagen'] = $request->file('imagen')->store('events');  
            $event['imagen'] = Storage::put('events', $request->file('imagen'));  
        }

        $evento = Event::create($event);

        $evento->users()->attach($request->input('users'));

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
        //return $event;
        $this->authorize('published', $event); 

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

        $this->authorize('author', $event);

        $organizers = Organizer::all();
        $users = User::all();
        $user_ids = $event->users()->pluck('users.id');

        return view('admin.events.edit', compact('event', 'users', 'organizers', 'user_ids'));
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
      
        $this->authorize('author', $event);

        $event->update($request->all());

        if($request->file('imagen'))
        {
            $img = Storage::put('events', $request->file('imagen'));

            if($event->imagen)
            {
                Storage::delete($event->imagen);

                $event->update([
                    'imagen' => $img
                ]);
            }
            else
            {
                $event->create([
                    'imagen' => $img
                ]);
            }
        }

        $event->users()->sync($request->input('users'));
        //return $event;
        
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
        
        $this->authorize('author', $event);

        $event->delete();

        return redirect()->route('admin.events.index')->with('info','El evento se elimino con exito');
    }

    public function welcome()
    {
        //
        $events = Event::where('estado', 2)->latest('id')->get();

        return view('welcome', compact('events'));
    }
}