<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Certificate;
use App\Models\Image;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        $events = Event::all();
        $images = Image::all();

        return view('admin.certificates.index', compact('certificates', 'events', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $images = Image::all();

        return view('admin.certificates.create', compact('events', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all(); 
        $request->validate([
            'id_evento' => 'required',
            'detalle' => 'required',
            'image_id' => 'required',
        ]);

        $certificate = $request->all();

        Certificate::create($certificate);

        return redirect()->route('admin.certificates.index')->with('info', 'El certificado se creo con exito!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        $events = Event::all();
        $images = Image::all();

        return view('admin.certificates.edit', compact('certificate', 'events', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'id_evento' => 'required',
        ]);

        $certificate->update(
            $request->all()
        );

        return redirect()->route('admin.certificates.index')->with('info', 'El certificado se actualizo con exito!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('info', 'El certificado se elimino');
    }
}
