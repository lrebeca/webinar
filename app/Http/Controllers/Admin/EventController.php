<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Admin\Event;
use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Image;
use App\Models\Organizer;
use App\Models\Province;
use App\Models\Student;
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
        $provinces = Province::all();
        $organizers = Organizer::all();
        $events = Event::all();
        $users = User::all();
        $certificates = Certificate::all();
        
        return view('admin.events.index', compact('events', 'organizers', 'provinces', 'users', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizers = Organizer::pluck('unidad', 'id');
        $provinces = Province::pluck('provincia', 'id');
        $users = User::all();

        return view('admin.events.create', compact('users', 'organizers', 'provinces'));
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
            $event['imagen'] = Storage::put('events', $request->file('imagen'));  
        }

        $evento = Event::create($event);

        $evento->users()->attach($request->input('users'));

        return redirect()->route('admin.events.edit', $evento)->with('info','El evento se creo con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Event $event)
    {

        $this->authorize('author', $event);

        $organizers = Organizer::pluck('unidad', 'id');
        $provinces = Province::pluck('provincia', 'id');
        $users = User::all();
        $user_ids = $event->users()->pluck('users.id');

        return view('admin.events.edit', compact('event', 'users', 'organizers','provinces', 'user_ids'));
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
        
        return redirect()->route('admin.events.edit', $event)->with('info','El evento se actualizo con exito');
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

    // detalles del evento 

    public function detalles(Event $event)
    {
        $id = $event->id;
        $details = Detail::where('id_evento','=',$id)->get();
        //return $details;
        return view('admin.events.details', compact('details', 'event'));
    }

    public function documentos(Event $event)
    {
        $id = $event->id;
        $documents = Document::where('id_evento','=',$id)->get();
        //return $details;
        return view('admin.events.documents', compact('documents', 'event'));
    }

    public function aprobados(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.aprobados', compact('students', 'event', 'count'));
    }

    public function pendientes(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'enviado']])->get();
        //$students = DB::table('students')->where([['id_evento','=',$id], ['progreso', '=', 'enviado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.enviados', compact('students', 'event', 'count'));
    }

    public function rechazados(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'rechazado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.rechazados', compact('students', 'event', 'count'));
    }

    public function certificado(Event $event)
    {
        $id = $event->id;
        $certificates = Certificate::all();
        $images = Image::all();
 
        return view('admin.events.certificado', compact('certificates', 'event', 'images'));        
    }
}