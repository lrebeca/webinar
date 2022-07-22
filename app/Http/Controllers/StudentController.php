<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Admin\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $event = Event::all();

        return view('registers.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //
        $student = $request->all();

        Student::create($student);
        
        return $student;
        //return view('registers.ingresar', compact('student'));
        //return redirect()->route('events.show')->with('info', 'Se confirmara su inscripcion a su correo o whatsapp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
        

        return $student;
        //return view('registers.index', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function ingresar(Request $request){

        $id_event = $request->get('id_evento');
        //$event = Event::where('id','=', $id_event)->toArray();
        $event = DB::table('events')->find($id_event);

        $request->validate([
            'email2' => 'required',
            'carnet_identidad2' => 'required'
        ],
        [
            'email2.required'=>'Ingrese Email',
            'carnet_identidad2.required'=>'Ingrese Contraseña'
        ]);

        $email=$request->get('email2');
        $query=Student::where('email','=',$email)->get();
        if($query->count() !=0){
            $hashp=$query[0]->carnet_identidad;
            $password=$request->get('carnet_identidad2');
            if($password==$hashp){
                return view('registers.evento', compact('event'));
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
