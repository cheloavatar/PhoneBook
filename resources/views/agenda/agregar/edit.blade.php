<x-app-layout>
    <div class="py-12">
        <div class="relative py-3 max-w-6xl mx-auto sm:px-6 lg:px-6">
            <div x-data="app()" x-cloak>
                <form action="{{ route('agenda.update',$detenido->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                  <div class="">
                    <div class="flex items-center space-x-5">
                      <div class="h-14 w-14 bg-green-200 rounded-full flex flex-shrink-0 justify-center items-center text-green-500 text-2xl font-mono">
                        <i class="fa-solid fa-user-pen"></i>
                      </div>
                      <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                        <h2 class="leading-relaxed">Editar Detenido</h2>
                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Solo se agrega generales del detenido, para agregar agendas ir a
                            <a class="underline decoration-sky-500/30" href="{{route('agenda.index')}}">"Busqueda"</a>.</p>
                      </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                          <div class="mb-5 text-center">
                            <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" />
                            </div>

                            <label
                                for="fileInput"
                                type="button"
                                class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium"
                            >
                                Buscar Foto
                            </label>

                            <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click para agregar fotografia al detenido</div>
                            @if($img_perfil->fotodetenido !=null)
                            <input id="urle" name="urle" hidden value="{{$img_perfil->fotodetenido->url}}">
                            @endif
                            <input id="fotoguardado" hidden name="fotoguardado" value="{{$detenido->foto}}">
                            <input name="foto" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
                                var reader = new FileReader();
                                reader.onload = (e) => image = e.target.result; reader.readAsDataURL(file);">
                        </div>
                        <div class="flex flex-col">
                            <input type="text" name="elemento_creo" id="elemento_creo" class="form-control" hidden value="{{$detenido->elemento_creo}}" >
                            <input type="text" name="slug" id="slug" class="form-control" hidden value="{{$detenido->slug}}" >
                            <input type="text" name="elemento_edito" id="elemento_edito" class="form-control" hidden value="{{Auth::user()->id}}" >
                          <label class="leading-loose">Nombre</label>
                          <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Nombre completo" name="nombre" id="nombre" value="{{$detenido->nombre}}" >
                        </div>
                        <div class="flex items-center  content space-x-4">
                          <div class="flex flex-col flex-1">
                              <label class="leading-loose">Alias</label>
                              <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="alias" id="alias" value="{{$detenido->alias}}" >
                          </div>
                          <div class="flex flex-col flex-1">
                              <label class="leading-loose">Lugar de Origen</label>
                              <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="origen" id="origen" value="{{$detenido->origen}}">
                          </div>
                          <div class="flex flex-col flex-1">
                            <label class="leading-loose">Fecha de Nacimiento</label>
                            <div class="relative focus-within:text-gray-600 text-gray-400">
                              <input type="date" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="26/02/2020" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$detenido->fecha_nacimiento}}">
                              <div class="absolute left-3 top-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                          <p class="text-sm text-gray-500 font-normal leading-relaxed">Domicilio</p>
                          <div class="flex items-center  content space-x-4">
                              <div class="flex flex-col flex-1">
                                  <label class="leading-loose">Calle y Numero</label>
                                  <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="d_calle" id="d_calle" value="{{$detenido->direccions->calle}}">
                              </div>
                              <div class="flex flex-col flex-1/2">
                                  <label class="leading-loose">Numero</label>
                                  <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="d_numero" id="d_numero" value="{{$detenido->direccions->numero}}">
                              </div>
                              <div class="flex flex-col flex-1">
                                  <label class="leading-loose">Colonia</label>
                                  <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="d_colonia" id="d_colonia" value="{{$detenido->direccions->colonia}}">
                              </div>
                            </div>
                            <div class="flex items-center  content space-x-4">
                                <div class="flex flex-col flex-1/2">
                                    <label class="leading-loose">Codigo Postal</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="d_cp" id="d_cp" value="{{$detenido->direccions->cp}}">
                                </div>
                                <div class="flex flex-col flex-1">
                                    <label class="leading-loose">Estado</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="d_estado" id="d_estado" value="{{$detenido->direccions->estado}}">
                                </div>
                              <div class="flex flex-col flex-1">
                                  <label class="leading-loose">Municipio</label>
                                  <select name="municipio_id" id="municipio_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                    @foreach($municipios as $municipio)
                                    @if ($municipio->id==$detenido->direccions->municipio_id)
                                        <option value="{{ $municipio->id }}" selected="selected">{{ $municipio->nombre }}</option>
                                    @else
                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="pt-4 flex items-center space-x-4">
                          <a class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" href="{{ route('cancelar','/') }}">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                          </a>
                          <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Actualizar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
                </div>
                <script>
                  function app() {
                      return {
                          step: 1,
                          @if($img_perfil->fotodetenido !=null)
                          image: '{{asset($img_perfil->fotodetenido->url).'/t_foto.jpeg'}}',
                          @else
                          image: '{{asset("/assets/img").'/t_foto.jpeg'}}',
                          @endif
                      }
                  }
              </script>
        </div>
    </div>
</x-app-layout>
