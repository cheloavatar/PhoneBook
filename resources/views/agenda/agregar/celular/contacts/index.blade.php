<x-app-layout>
<!-- component -->
<section class="antialiased text-gray-600 px-6  py-6">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class=" bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <div class="flex justify-between">
                    <h2 class="font-semibold text-gray-800">CONTACTOS</h2>
                    <form action="" >
                        <x-jet-input type="text" name="buscar" class="mb-5 xl:w-64" placeholder="Telefono o nombre de contacto " value="{{ request()->get('buscar') }}"/>
                            <button type="submit" ><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </header>
            <div class="p-3">
                <b class="md-15" ><span class="text-stone-500">{{$contacts->total()}}</span> REGISTRO</b>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="w-full font-semibold uppercase text-stone-500 bg-stone-200">
                            <tr>
                                <th class="border border-stone-400 p-1 h-8 whitespace-nowrap">
                                    <div class="font-semibold text-center">ID</div>
                                </th>
                                <th class="border border-stone-400 p-1 w-128 whitespace-nowrap">
                                    <div class="font-semibold text-center">NOMBRE DEL CONTACTO</div>
                                </th>
                                <th class="border border-stone-400 p-1 w-128 whitespace-nowrap">
                                    <div class="font-semibold text-center">TELEFONO</div>
                                </th>
                                <th class="border border-stone-400 p-1 w-16 whitespace-nowrap">
                                    <div class="font-semibold text-center">CELULAR</div>
                                </th>
                                <th class="border border-stone-400 p-1 w-16 whitespace-nowrap">
                                    <div class="font-semibold text-center">DETENIDO</div>
                                </th>
                                <th class="border border-stone-400 p-1 w-32 whitespace-nowrap">
                                    <div class="font-semibold text-center">ACCIONES</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm  divide-stone-100">
                            @foreach($contacts as $contact)
                            <tr class="hover:bg-stone-100 ">
                                <td class="border border-stone-400 p-1 whitespace-nowrap text-center">
                                    {{$contact->id}}
                                </td>
                                <td class=" border border-stone-400 p-1 whitespace-nowrap text-left">
                                    <div class="font-medium text-gray-800">{{$contact->nombre}}</div>
                                </td>
                                <td class="border border-stone-400 p-1 whitespace-nowrap text-center">
                                    <div class="font-medium text-gray-800">{{$contact->telefono}}</div>
                                </td>
                                <td class="border border-stone-400 p-1 whitespace-nowrap text-center">
                                    <div class="font-medium text-gray-800"><span class="dark:text-gray-400 text-gray-400">EQUIPO: </span>{{$contact->celulars->marca}} {{$contact->celulars->modelo}},
                                        <span class="dark:text-gray-400 text-gray-400"> IMEI:</span> {{$contact->celulars->imei}}
                                        <span class="dark:text-gray-400 text-gray-400"> TEL: </span>{{$contact->celulars->telefono}}
                                    </div>
                                </td>
                                <td class="border border-stone-300 p-1 flex justify-center">
                                    <a href="{{ route('agenda.show',$contact->detenido_id) }}">
                                    <img data-tooltip-target="tooltip-light" data-tooltip-style="light" src="
                                            @if($contact->detenidos->fotodetenido !=null)
                                                {{asset($contact->detenidos->fotodetenido->url).'/t_foto.jpeg'}}
                                            @else
                                                {{asset("/assets/img").'/t_foto.jpeg'}}
                                            @endif"
                                            width="40" height="40" alt="{{$contact->detenidos->nombre}}">
                                    </a>
                                            <div id="tooltip-light" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-stone-900 bg-white rounded-lg border border-stone-200 shadow-sm opacity-0 tooltip">
                                                <b>{{$contact->detenidos->nombre}}</b>
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                </td>
                                <td class=" border border-stone-400 p-1 whitespace-nowrap">
                                    <div class="text-lg text-center py-1">
                                        <a class="bg-gray-200 hover:bg-gray-200 text-gray-100 font-semibold py-1 px-2 mr-2 border border-gray-300 rounded shadow cursor-not-allowed" href=" #"><i class="far fa-edit text-gray-400"></i></a>
                                        <a class="bg-gray-200 hover:bg-gray-200 text-gray-100 font-semibold py-1 px-2 mr-2 border border-gray-300 rounded shadow cursor-not-allowed" href=" #"><i class="fa-solid fa-eraser text-gray-400"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex py-3">
                    <div class="flex-none w-32 ">
                    </div>
                    <div class="flex-auto w-64">
                        {!! $contacts->appends(request()->query())->links()!!}
                    </div>
                    <div class="flex-none w-32">
                    </div>
                  </div>

            </div>
        </div>
    </div>
    <script src="{{asset('vendor\flowbite\flowbite.js')}}"></script>
</section>
</x-app-layout>
