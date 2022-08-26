<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Document;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $documents = Document::all();

        return view('admin.documents.index', compact('documents', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        return view('admin.documents.create', compact('events'));
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
            'id_evento' => 'required',
            'titulo' => 'required',
            'documento' => 'required'
        ]);

        $document = $request->all();

        if($request->hasFile('documento'))
        {
            //$document['documento'] = $request->file('documento')->store('documents');
            $document['documento'] = Storage::put('documents', $request->file('documento'));
        }
        //return $document;
        Document::create($document);

        return redirect()->route('admin.documents.index')->with('info', 'El documento se agrego con exito');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $events = Event::pluck('evento', 'id')->toArray();

        return view('admin.documents.edit', compact('document', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        
        $request->validate
        ([
            'titulo' => 'required',
            'id_evento' => 'required'
        ]);

        $document->update($request->all());

        if($request->file('documento'))
        {
            $doc = Storage::put('documents', $request->file('documento'));

            if($document->documento)
            {
                Storage::delete($document->documento);

                $document->update([
                    'documento' => $doc
                ]);
            }
            else
            {
                $document->create([
                    'documento' => $doc
                ]);
            }
        }
        //return $document;

        return redirect()->route('admin.documents.index')->with('info', 'El documento se actualizo con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index')->with('info', 'El documento se elimino correctamente');
    }
}
