<x-app-layout>
    <div class="py-10 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="border border-stone-300 bg-stone-50 dark:bg-stone-600 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <div class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-center items-center flex-shrink-0">
                        <h3 class="text-2xl	 dark:text-white font-bold text-stone-600 uppercase">{{$celular->marca}} {{$celular->modelo}}</h3>
                        <div class="flex justify-center w-full items-center space-x-4 py-8 border-b border-stone-200">
                            <img class="w-48" src="{{$celular->foto}}/fotocelular.jpg" alt="avatar" />
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-2 xl:mt-8">
                                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-stone-600">Teléfono:</p>
                                <p class="w-48 lg:w-full dark:text-stone-300 xl:w-48 text-center md:text-left text-sm leading-5 text-stone-500">
                                    {{$celular->telefono}}
                                </p>
                                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-stone-600">Imei:</p>
                                <p class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-stone-500"> {{$celular->imei}}</p>
                                <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-stone-600">Color:</p>
                                <p class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-stone-500"> {{$celular->color}}</p>
                            </div>
                            <div class="flex w-full justify-center items-center md:justify-start md:items-start mt-6">
                                <a   role="link" href="{{ route('celular.edit',$celular->id)}}"
                            class="bg-stone hover:bg-stone-200 text-stone-600 font-semibold py-1 px-8 border border-stone-400 rounded shadow">Editar Características</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div class="border border-stone-300 flex flex-col justify-start dark:bg-stone-800 bg-stone-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                    <div class="flex justify-end">
                        <a class=" bg-stone hover:bg-stone-100 text-stone-600 font-semibold py-2 px-2 mx-2 border border-stone-400 rounded shadow " href="#" onclick="openModal(true)">
                            Agregar <i class="fa-solid fa-user-plus"></i>
                        </a>
                        <a class=" bg-stone hover:bg-stone-100 text-stone-600 font-semibold py-2 px-2 mx-2 border border-stone-400 rounded shadow "  href="#"  data-modal-toggle="default-modal">
                            Agregar <i class="fa-solid fa-file-csv"></i>
                        </a>
                    </div>
                    <div class="flex justify-star">
                        <p>
                        <a href="{{route('agenda.show', $celular->detenido_id)}}" class="hover:text-red-600 text-stone-600 mx-4 ">
                            <i class="fa-solid fa-arrow-left-long"></i></a></p>
                        <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-stone-600">Contactos en el Dispositivo
                        </p>
                    </div>
                    <div class="p-10 w-full">
                        <div class="overflow-y-auto">
                            <table class="table-auto w-full">
                                <thead class="w-full font-semibold uppercase text-gray-500 bg-gray-200">
                                    <tr>
                                        <th class="border border-slate-300 p-2 h-14 whitespace-nowrap">
                                            <div class="font-semibold text-center">ID</div>
                                        </th>
                                        <th class="border border-slate-300 p-2 w-128 whitespace-nowrap">
                                            <div class="font-semibold text-center">NOMBRE DEL CONTACTO</div>
                                        </th>
                                        <th class="border border-slate-300 p-2 w-64 whitespace-nowrap">
                                            <div class="font-semibold text-center">TELEFONO</div>
                                        </th>
                                        <th class="border border-slate-300 p-2 w-32 whitespace-nowrap">
                                            <div class="font-semibold text-center">Agregar Equipo</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm  divide-gray-100">
                                    @foreach($contacts as $contact)
                                    <tr class="hover:bg-gray-100 ">
                                        <td class="border border-slate-300 p-2 whitespace-nowrap text-center">
                                            {{$contact->id}}
                                        </td>
                                        <td class=" border border-slate-300 p-2 whitespace-nowrap text-center">
                                            <div class="font-medium text-gray-800">{{$contact->nombre}}</div>
                                        </td>
                                        <td class="border border-slate-300 p-2 whitespace-nowrap text-center">
                                            <div class="font-medium text-gray-800">{{$contact->telefono}}</div>
                                        </td>
                                        <td class=" border border-slate-300 p-2 whitespace-nowrap">
                                            <div class="text-lg text-center py-2">
                                                <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-3 mr-2 border border-gray-400 rounded shadow" href=" #"><i class="far fa-edit"></i></a>
                                                <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-3 mr-2 border border-gray-400 rounded shadow" href=" #"><i class="fa-solid fa-eraser"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $contacts->appends(request()->query())->links()!!}
                </div>
            </div>
        </div>
    </div>
<!-- MODAL CREAR UN CONTACTO-->
<!-- overlay -->
<div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
    <!-- modal -->
    <div id="modal" class="pacity-0 transform -translate-y-full scale-100  relative w-7/12 md:w-1/3 h-1/3 md:h-1/3 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
        <!-- button close -->
        <button onclick="openModal(false)" class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
        &cross;
        </button>
        <!-- header -->
        <div class="px-4 py-3 border-b border-gray-200">
            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                <h2 class="leading-relaxed">Agregar un contacto</h2>
            </div>
        </div>
        <form action="{{ route('contacto.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- body -->
            <div class="w-full p-6">
                <div class="flex items-center  content space-x-4">
                    <div class="flex flex-col flex-1">
                        <input type="text" name="detenido_id" id="detenido_id" class="form-control" hidden value="{{$celular->detenido_id}}" >
                        <input type="text" name="celular_id" id="celular_id" class="form-control"  hidden value="{{$celular->id}}" >
                        <label class="leading-loose">Nombre</label>
                        <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="nombre" id="nombre" >
                    </div>
                    <div class="flex flex-col flex-1">
                        <label class="leading-loose">Telefono</label>
                        <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="telefono" id="telefono" >
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                    <button type="button" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" onclick="openModal(false)">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                    </button>
                    <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" type="submit">Agregar</button>
            </div>
        </form>
    </div>
</div>
<!-- /.modal -->
<!-- MODAL CREAR UN LISTA DE CONTACTOS-->
    <!-- Main modal -->
    <div id="default-modal" style="background-color: rgba(0,0,0,0.5);" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center" >
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                        Agregar lista de contactos
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <form action="{{url('contacts/importData')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <input type="text" name="detenido_id" id="detenido_id" class="form-control" hidden value="{{$celular->detenido_id}}" >
                    <input type="text" name="celular_id" id="celular_id" class="form-control"  hidden value="{{$celular->id}}" >
                    <p class="text-gray-500 text-base leading-relaxed dark:text-gray-400">
                        Selecciona un archivo xls, xlsx o cvs
                    </p>
                    <div class="flex justify-center">
                        <div class="mb-3 w-96">
                          <input id="excel" name="excel" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-toggle="default-modal" type="button" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" >
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                    </button>
                    <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" type="submit">Agregar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor\flowbite\flowbite.js')}}"></script>
    <script>
        const modal_overlay = document.querySelector('#modal_overlay');
        const modal = document.querySelector('#modal');
        function openModal (value){
            const modalCl = modal.classList
            const overlayCl = modal_overlay
            if(value){
            overlayCl.classList.remove('hidden')
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
            } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
            }
        }
        openModal(false)
    </script>
</x-app-layout>
