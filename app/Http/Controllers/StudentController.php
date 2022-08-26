<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Admin\Event;
use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Image;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //s$event = Event::all();

        //return $student;
        return view('registers.show');        
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
        $id_event = $request->id_evento;

        $event = DB::table('events')->find($id_event);

        //$event = (array)$evento; 
        
        $student = $request->all();

        if($request->hasFile('img_deposito'))
        {
            //651$student['img_deposito'] = Storage::put('depositos', $request->file('img_depositos'));
            $student['img_deposito'] = $request->file('img_deposito')->store('depositos');
        }

        Student::create($student);
        
        //return $student;
        //return $evento;
        return view('registers.show', compact('student', 'event'))->with('info', 'El estudiante esta en espera de la confirmacion');
        //return redirect()->route('events.show', $event)->with('info', 'Se confirmara su inscripcion a su correo o whatsapp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
        

        return 'Esta en le show';
        //return view('registers.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('registers.show', compact('student'));
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
    public function certificado(Student $student)
    {
        //return $student;
        $images = Image::all();
        $certificates = Certificate::all();
        
        return view('certificate.index', compact('student', 'images', 'certificates')); 
    }

    public function ingresar(Request $request, Student $student){

        return $student->id_evento;

        $id_event = $request->id_evento;
        $event = DB::table('events')->find($id_event);
        $detail = DB::table('details')->find($id_event);
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
        $student2 = DB::table('students')->find($email);
        $document = Document::where('id_evento','=',$id_event)->get();

        if($student->count() !=0){
            $hashp=$student[0]->carnet_identidad;
            $password=$request->get('carnet_identidad2');
            if($password==$hashp){

                if($id_event == $student[0]->id_evento)
                { 
                    return view('registers.evento', compact('event', 'document', 'detail', 'student2'));
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
