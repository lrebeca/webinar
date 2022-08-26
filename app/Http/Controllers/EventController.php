<?php

namespace App\Http\Controllers;

use App\Models\Admin\Event;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('estado', 2)->latest('id')->get();

        return view('welcome', compact('events'));
    }

    public function show(Event $event)
    {
        $this->authorize('published', $event); 

        return view('registers.show', compact('event'));
    }

    public function ingresar(Request $request, Event $event){

        //return $request;

        $id_event = $request->id_evento;
        $event = DB::table('events')->find($id_event);
        $details = Detail::all();
        $documents = Document::all();
        $students = Student::all();
        //$document = Document::all();
        //$detail = Detail::where('id_evento','=', $id_event)->get();

        
        $request->validate([
            'email2' => 'required',
            'carnet_identidad2' => 'required'
        ],
        [
            'email2.required'=>'Ingrese Email',
            'carnet_identidad2.required'=>'Ingrese Contraseña'
        ]);

        $email=$request->get('email2');
        $student=Student::where('email','=',$email)->get();
        //$document = Document::where('id_evento','=',$id_event)->get();

        if($student->count() !=0){
            $hashp=$student[0]->carnet_identidad;
            $password=$request->get('carnet_identidad2');
            if($password==$hashp){

                if($id_event == $student[0]->id_evento)
                { 
                    return view('registers.evento', compact('event', 'documents', 'details', 'students', 'email'));
                    //return redirect()->route('students.show', $event);
                }
                else
                {
                    return back()->withErrors(['id_evento'=>'El participante no se registro en este evento !!!'])->withInput([request('id_evento')]);
                }
            }
            else
            {
                return back()->withErrors(['carnet_identidad2'=>'Contraseña no es Valida'])->withInput([request('carnet_identidad2')]);
            }
        }
        else
        {
            return back()->withErrors(['email2'=>'Email no Valido'])->withInput([request('email2')]);
        }
    }
}
