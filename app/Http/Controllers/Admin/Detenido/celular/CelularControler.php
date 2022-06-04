<?php

namespace App\Http\Controllers\Admin\Detenido\celular;

use App\Http\Controllers\Controller;
use App\Models\Admin\Celular\Celular;
use Illuminate\Http\Request;
use App\Models\Admin\Detenido;
//App
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class CelularControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $celular = Celular::with(['contacts'])->where('id',$id)->firstOrFail();
        $contacts =$celular->contacts()->orderByDesc('created_at','id')->paginate(8);

        //dd($municipios);
        return view('agenda.agregar.celular.show',compact('celular','contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celular = Celular::find($id);
        //dd($municipios);
        return view('agenda.agregar.celular.edit',compact('celular'));
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
        if($request->hasFile('fileInput')){
            $imagen= $request->File('fileInput');
            $extension = $imagen->getClientOriginalExtension();
            $size = $imagen->getSize();
            $name='fotocelular.jpg';
            $ruta= public_path().$request->fotoguardado;
            $file_path=$ruta.$name;
                $file_pathminiatura=$ruta.'t_celular.jpeg';
                //dd($file_path);
                $imagen->move($ruta, $name);
                //dd($file_pathminiatura=$ruta.'t_foto.jpeg');
                $imagen = Image::make($file_path);
                $imagen->fit(256,512, function($constraint){
                    $constraint->upsize();
                });
                $urlimagen = ([
                    'url' => $request->fotoguardado,
                    'ext' => $extension,
                    'mgb'=> $size,
                    'nombre' => 'foto',
                ]);
            $imagen->save($file_pathminiatura, 80, 'jpg');
            $celular = Celular::findOrFail($id);
            $celular->marca = $request->marca;
            $celular->modelo = $request->modelo;
            $celular->telefono = $request->telefono;
            $celular->imei = $request->imei;
            $celular->color = $request->color;
            $celular->elemento_edito = $request->elemento_edito;
            $celular->fotodetenido()->update($urlimagen);
            $celular->save();
            return redirect()->route('agenda.show', $celular->detenido_id);
        }else{
            $celular = Celular::findOrFail($id);
            $celular->marca = $request->marca;
            $celular->modelo = $request->modelo;
            $celular->telefono = $request->telefono;
            $celular->imei = $request->imei;
            $celular->color = $request->color;
            $celular->elemento_edito = $request->elemento_edito;
            $celular->save();
            return redirect()->route('agenda.show', $celular->detenido_id);
        }
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
    public function createcelular(Request $request, $id)
    {
        if($request->hasFile('fileInput')){
        $slug = Str::slug($request->marca.'-'.$request->modelo);
        $imagen= $request->File('fileInput');
        $extension = $imagen->getClientOriginalExtension();
        $size = $imagen->getSize();
        $name='fotocelular.jpg';
        $ruta= public_path().'/'.$request->url_f.'/'.$request->marca.'/'.$request->modelo.'/';
        $file_path=$ruta.'/'.$name;
        $file_pathminiatura=$ruta.'/t_celular.jpeg';
        //dd($file_path);
        $imagen->move($ruta, $name);
        $imagen = Image::make($file_path);
        $imagen->fit(256,256, function($constraint){
            $constraint->upsize();
        });
        $imagen->save($file_pathminiatura, 80, 'jpg');
        $urlimagen = ([
            'url' => $request->url_f.$request->marca.'/'.$request->modelo.'/',
            'ext' => $extension,
            'mgb'=> $size,
            'nombre' => 'foto',
        ]);
        $celular = Detenido::findOrFail($id);
        $celular->celulars()->create([
        'marca'=>$request->marca,
        'modelo'=>$request->modelo,
        'telefono'=>$request->telefono,
        'imei'=>$request->imei,
        'foto'=>$request->url_f.$request->marca.'/'.$request->modelo.'/',
        'elemento_creo'=>$request->elemento_creo,
        'elemento_edito'=>$request->elemento_edito,
        'color'=>$request->color,
        'slug' => $slug])->fotodetenido()->create($urlimagen);

        return redirect()->back();
        }

    }
    public function storecelular(Request $request, $id)
    {

        $detenido = Detenido::findOrFail($id);
        return view('agenda.agregar.celular.create',compact('detenido'));
    }
}
