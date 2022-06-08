<?php

namespace App\Http\Controllers\Admin\Detenido;

use App\Http\Controllers\Controller;
use App\Models\otros\lugares\municipio\Municipio;
use Illuminate\Http\Request;
use App\Models\Admin\Detenido;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Celular\Celular;

//App
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class DetenidoController extends Controller
{
    public $municipios;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
        $buscar =$request->get('buscar');
        $municipios = Municipio::orderBy('id')->get();
        $detenidos = Detenido::with(['fotodetenido'])->orderByDesc('created_at','id')
        ->orWhere('alias','like',"%$buscar%")
        ->orWhere('nombre','like',"%$buscar%")
        ->paginate(10);
        return view('agenda.agregar.index',compact('municipios','detenidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipio::orderBy('id')->get();
        //dd($municipios);
        return view('agenda.agregar.create',compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',

            'origen' => 'required',
            'd_calle' => 'required',
            'd_numero' => 'required',
            'd_colonia' => 'required',
            'd_cp' => 'required',
            'd_estado' => 'required',
            'fecha_nacimiento' => 'required'
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',

            'slug.unique' => 'Nombre de usuario ya registrado.',
            'origen.required' => 'El campo Lugar de Origen es obligatorio.',
            'd_calle.required' => 'El campo Calle es obligatorio.',
            'd_numero.required' => 'El campo Numero es obligatorio.',
            'd_colonia.required' => 'El campo Colonia es obligatorio.',
            'd_cp.required' => 'El campo CP es obligatorio.',
            'd_estado.required' => 'El campo Estado es obligatorio.',
            'fecha_nacimiento.required' => 'El campo Fecha de Nacimiento es obligatorio.'
        ]);
        //Imagen de perfil
        if($request->hasFile('foto')){

            $imagen= $request->File('foto');
            $extension = $imagen->getClientOriginalExtension();
            $size = $imagen->getSize();
            $name='fotoperfil.jpg';
            $ruta= public_path().'/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre;
            $file_path=$ruta.'/'.$name;
            $file_pathminiatura=$ruta.'/t_foto.jpeg';
            //dd($file_path);
            $imagen->move($ruta, $name);
            $imagen = Image::make($file_path);
            $imagen->fit(256,256, function($constraint){
                $constraint->upsize();
            });
            $imagen->save($file_pathminiatura, 80, 'jpg');
                $urlimagen = ([
                    'url' => '/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre.'/',
                    'ext' => $extension,
                    'mgb'=> $size,
                    'nombre' => 'foto',
                ]);
                $direccion = ([
                    'calle' =>  $request->d_calle,
                    'numero' => $request->d_numero,
                    'colonia'=> $request->d_colonia,
                    'cp' => $request->d_cp,
                    'estado' => $request->d_estado,
                    'municipio_id' => $request->municipio_id,
                ]);
                $detenido = new Detenido;
                $detenido->elemento_creo = $request->elemento_creo;
                $detenido->elemento_edito = $request->elemento_edito;
                $detenido->nombre = $request->nombre;
                $detenido->slug = Str::slug($request->nombre);
                $detenido->alias = $request->alias;
                $detenido->origen = $request->origen;
                $detenido->foto = '/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre.'/';
                $detenido->fecha_nacimiento = $request->fecha_nacimiento;
                $detenido->save();
                $detenido->fotodetenido()->create($urlimagen);
                $detenido->direccions()->create($direccion);
                return redirect()->route('agenda.index');
        }else{
            $direccion = ([
                'calle' =>  $request->d_calle,
                'numero' => $request->d_numero,
                'colonia'=> $request->d_colonia,
                'cp' => $request->d_cp,
                'estado' => $request->d_estado,
                'municipio_id' => $request->municipio_id,
            ]);
            $detenido = new Detenido;
            $detenido->elemento_creo = $request->elemento_creo;
            $detenido->elemento_edito = $request->elemento_edito;
            $detenido->nombre = $request->nombre;
            $detenido->slug = Str::slug($request->nombre);
            $detenido->alias = $request->alias;
            $detenido->origen = $request->origen;
            $detenido->foto = '/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre.'/';
            $detenido->fecha_nacimiento = $request->fecha_nacimiento;
            $detenido->save();
            $detenido->direccions()->create($direccion);
            return redirect()->route('agenda.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipios = Municipio::orderBy('id')->get();
        $detenido = Detenido::with('fotodetenido','direccions','celulars','contacts')->where('id',$id)->firstOrFail();
        $contactos = Celular::with('contacts');
        //dd($municipios);
        return view('agenda.agregar.show',compact('municipios','detenido','contactos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipios = Municipio::orderBy('id')->get();
        $detenido = Detenido::find($id);
        $img_perfil = Detenido::with(['fotodetenido'])->findOrFail($id);
        //dd($municipios);
        return view('agenda.agregar.edit',compact('municipios','detenido','img_perfil'));
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
        //Imagen de perfil
        if ($request->fotoguardado !='/assets/img/'){
        if($request->hasFile('foto')){
            $imagen= $request->File('foto');
            $extension = $imagen->getClientOriginalExtension();
            $size = $imagen->getSize();
            $name='fotoperfil.jpg';
            $ruta= public_path().$request->fotoguardado;
            $file_path=$ruta.$name;
                $file_pathminiatura=$ruta.'t_foto.jpeg';
                //dd($file_path);
                $imagen->move($ruta, $name);
                //dd($file_pathminiatura=$ruta.'t_foto.jpeg');
                $imagen = Image::make($file_path);
                $imagen->fit(256,256, function($constraint){
                    $constraint->upsize();
                });
                $imagen->save($file_pathminiatura, 80, 'jpg');
        }
        }else{
            if($request->hasFile('foto')){

                $imagen= $request->File('foto');
                $extension = $imagen->getClientOriginalExtension();
                $size = $imagen->getSize();
                $name='fotoperfil.jpg';
                $ruta= public_path().'/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre;
                $file_path=$ruta.'/'.$name;
                $file_pathminiatura=$ruta.'/t_foto.jpeg';
                //dd($file_path);
                $imagen->move($ruta, $name);
                $imagen = Image::make($file_path);
                $imagen->fit(256,256, function($constraint){
                    $constraint->upsize();
                });
                $imagen->save($file_pathminiatura, 80, 'jpg');
                    $urlimagen = ([
                        'url' => '/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre.'/',
                        'ext' => $extension,
                        'mgb'=> $size,
                        'nombre' => 'foto',
                    ]);
            }
        }
        $detenido = Detenido::findOrFail($id);
        $detenido->elemento_creo = $request->elemento_creo;
        $detenido->elemento_edito = $request->elemento_edito;
        $detenido->nombre = $request->nombre;
        $detenido->slug = $request->slug;
        $detenido->alias = $request->alias;
        $detenido->origen = $request->origen;
        $direccion = ([
            'calle' =>  $request->get('d_calle'),
            'numero' => $request->get('d_numero'),
            'colonia'=> $request->get('d_colonia'),
            'cp' => $request->get('d_cp'),
            'estado' => $request->get('d_estado'),
            'municipio_id' => $request->get('municipio_id'),
        ]);
        if ($request->fotoguardado =='/assets/img/' && $request->File('foto') ){
        $detenido->fotodetenido()->create($urlimagen);
        $detenido->foto = '/uploads/images/foto_detenido/'.date("M").'/'.date("Y-m-d").'/'.$request->nombre.'/';
        }else{
        $detenido->foto = $request->fotoguardado;
        }
        $detenido->fecha_nacimiento = $request->fecha_nacimiento;
        $detenido->direccions()->update($direccion);
        $detenido->save();
        return redirect()->route('agenda.index');
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
}
