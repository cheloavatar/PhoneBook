<?php

namespace App\Http\Controllers\Admin\Detenido\Celular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Celular\Contact;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use App\Models\Admin\Detenido;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar =$request->get('buscar');
        $contacts =Contact::with(['detenidos','fotodetenido','celulars'])->orderByDesc('created_at','id')
        ->orWhere('telefono','like',"%$buscar%")
        ->orWhere('nombre','like',"%$buscar%")
        ->paginate(30);

        //dd($municipios);
        return view('agenda.agregar.celular.contacts.index',compact('contacts'));
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
    public function store(Request $request)
    {
        $contacto = new Contact;
        $contacto->nombre = $request->nombre;
        $contacto->telefono = $request->telefono;
        $contacto->detenido_id = $request->detenido_id;
        $contacto->celular_id = $request->celular_id;
        $contacto->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function import(){
        return view('agenda.agregar.celular.contacts.import');
    }
    public function importData(Request $request){
        Excel::import(new ContactsImport, request()->file('excel'));
        return redirect()->back();
    }
}
