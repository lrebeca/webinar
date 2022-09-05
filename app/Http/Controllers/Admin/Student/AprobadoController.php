<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Admin\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AprobadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $events = Event::all();

        return view('admin.students.aprobado', compact('students', 'events'));
    }

    public function edit(Student $student)
    {
        $id_event = $student->id_evento;
        $event = DB::table('events')->find($id_event);

        return view('admin.students.edit', compact('student', 'event'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->all());

        if($request->file('img_deposito'))
        {
            $img = Storage::put('depositos', $request->file('img_deposito'));

            if($student->img_deposito)
            {
                Storage::delete($student->img_deposito);

                $student->update([
                    'imagen' => $img
                ]);
            }
            else
            {
                $student->create([
                    'imagen' => $img
                ]);
            }
        }
        
        return redirect()->route('admin.students.aprobado.edit', $student)->with('info','Se modificaron los datos del participante');
    }

    public function destroy(Student $student)
    {
       $student->delete();

        return redirect()->route('admin.students.aprobado.index')->with('info','El participante se ha eliminado');
    }
}