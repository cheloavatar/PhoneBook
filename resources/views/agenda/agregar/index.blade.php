<x-app-layout>
<!-- component -->
<section class="antialiased text-gray-600 min-w-full sm:px-3 sm:py-3 lg:px-6 lg:py-6">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="border border-slate-300 bg-white shadow-lg rounded-sm">
            <header class="px-5 py-4 border-b border-gray-100">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-gray-800">{{ __("PERSONS")}}</h2>
                        <form action="" >
                            <x-jet-input type="text" name="buscar" class="mb-5 xl:w-64" placeholder="Nombre del detenido" value="{{ request()->get('buscar') }}"/>
                                <button type="submit" ><i class="fas fa-search"></i></button>
                        </form>
                    </div>
            </header>
            <div class="p-3 ">
                <div class="overflow-x-auto">
                    <div class="flex justify-between">
                    <b>
                        <span class="text-stone-500">{{$detenidos->total()}}</span> REGISTRO.
                    </b>
                    <button type="button" onclick="window.location='{{ route('agenda.create') }}'" class="text-stone-600 bg-stone hover:bg-stone-300 border border-stone-400 focus:ring-4 focus:outline-none focus:ring-stone-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-stone-600 dark:bg-stone-800 dark:border-stone-700 dark:text-white dark:hover:bg-stone-700 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg> <span class="px-2"> AGREGAR PERSONA </span>
                    </button>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="w-full font-semibold uppercase text-stone-500 bg-stone-300 ">
                            <tr>
                                <th class="border border-stone-400 p-2 w-2/5 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nombre</div>
                                </th>
                                <th class="border border-stone-400 p-2 w-1/6 whitespace-nowrap">
                                    <div class="font-semibold text-center">Alias</div>
                                </th>
                                <th class="border border-stone-400 p-2 w-1/6 whitespace-nowrap">
                                    <div class="font-semibold text-center">Edad</div>
                                </th>
                                <th class="border border-stone-400 p-2 w-1/6 whitespace-nowrap">
                                    <div class="font-semibold text-center">Originario</div>
                                </th>
                                <th class="border border-stone-400 p-2 w-2/5 whitespace-nowrap">
                                    <div class="font-semibold text-center">Agregar Equipo</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-stone-100">
                            @foreach($detenidos as $detenido)
                            <tr class="hover:bg-stone-100">
                                <td class="border border-stone-400 p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                            src="
                                            @if($detenido->fotodetenido !=null)
                                            {{asset($detenido->fotodetenido->url).'/t_foto.jpeg'}}
                                            @else
                                            {{asset("/assets/img").'/t_foto.jpeg'}}
                                            @endif"
                                            width="40" height="40" alt="{{$detenido->nombre}}"></div>
                                        <div class="text-left font-medium text-stone-600">{{$detenido->nombre}}</div>
                                    </div>
                                </td>
                                <td class="border border-stone-400 p-2 whitespace-nowrap text-center">
                                    <div class="font-medium text-gray-800">{{$detenido->alias}}</div>
                                </td>
                                <td class="border border-stone-400 p-2 whitespace-nowrap text-center">
                                    <div class="font-medium text-gray-800">{{\Carbon\Carbon::parse($detenido->fecha_nacimiento)->diff(now())->format("%y años")}}</div>
                                </td>
                                <td class="border border-stone-400 p-2 whitespace-nowrap text-center">
                                    <div class="font-medium text-gray-800">{{$detenido->origen}}</div>
                                </td>
                                <td class="border border-stone-400 p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">
                                        <a class="bg-stone hover:bg-stone-300 text-stone-600 font-semibold py-2 px-3 mr-2 border border-stone-400 rounded shadow" href=" {{ route('agenda.show',$detenido->id) }}"><i class="far fa-eye text-stone-600"></i></a>
                                        <a class="bg-stone hover:bg-stone-300 text-stone-600 font-semibold py-2 px-3 mr-2 border border-stone-400 rounded shadow" href=" {{ route('agenda.edit',$detenido->id) }}"><i class="fas fa-edit text-stone-600"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {!! $detenidos->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
</section>

</x-app-layout>
