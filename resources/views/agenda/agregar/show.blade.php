<x-app-layout>
    <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="border border-stone-300 bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <h3 class="text-xl dark:text-white font-semibold leading-5 text-stone-500">{{ __("PERSON")}}:</h3>
                <div class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-stone-200">
                            <img class="w-16" src="@if($detenido->fotodetenido==null)
                            {{asset('assets/img').'/t_foto.jpeg'}}
                            @else
                            {{asset($detenido->fotodetenido->url).'/t_foto.jpeg'}}
                            @endif"
                            alt="avatar" />
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base dark:text-white font-semibold leading-4 text-left text-stone-500">{{$detenido->nombre}}</p>
                                <p class="text-sm dark:text-stone-300 leading-5 text-stone-600">Alias: {{$detenido->alias}}</p>
                            </div>
                        </div>
                        <div class="flex justify-center text-stone-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-stone-200 w-full">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p class="cursor-pointer text-sm leading-5 ">
                                <a data-modal-toggle="extralarge-modal"  onclick="openModal(true)" >Agregar Equipo Celular</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                        <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                            <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-stone-500">Generales</p>
                            <p class="w-48 lg:w-full dark:text-stone-300 xl:w-48 text-center md:text-left text-sm leading-5 text-stone-500">De  {{\Carbon\Carbon::parse($detenido->fecha_nacimiento)->diff(now())->format("%y años")}} de edad, originario de
                                {{$detenido->origen}}
                            </p>
                        </div>
                        <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                            <p class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-stone-500">Domicilio</p>
                            <p class="w-48 lg:w-full dark:text-stone-300 xl:w-48 text-center md:text-left text-sm leading-5 text-stone-500">{{$detenido->direccions->calle}},
                                {{$detenido->direccions->colonia}}, {{$detenido->direccions->municipio->nombre}}, {{$detenido->direccions->estado}}</p>
                        </div>
                        <div class="flex w-full justify-center items-center md:justify-start md:items-start mt-6">
                            <button   role="link" onclick="window.location='{{ route('agenda.edit',$detenido->id) }}'"
                        class="mt-6 md:mt-0 dark:border-white dark:hover:bg-stone-600 dark:bg-transparent dark:text-white py-5 hover:bg-stone-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-600 border border-stone-500 font-medium w-96 2xl:w-full text-base font-medium leading-4 text-stone-600">Editar Datos</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div class="border border-stone-300 flex flex-col justify-start items-start dark:bg-gray-800 bg-stone-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                    <h3 class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-stone-500">EQUIPOS CELULARES</h3>
                    @foreach($detenido->celulars as $celular)
                        <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <div class="pb-4 md:pb-8 w-full md:w-40">
                            <img class="w-full hidden md:block" src="{{$celular->foto}}fotocelular.jpg" alt="dress" />
                            <img class="w-full md:hidden" src="{{$celular->foto}}t_celular.jpeg" alt="dress" />
                            </div>
                            <div class="border-b border-stone-300 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-stone-500">{{$celular->marca}} {{$celular->modelo}}</h3>
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                    <p class="text-sm dark:text-white leading-none text-stone-500"><span class="dark:text-stone-500 text-stone-400">Teléfono: </span> {{$celular->telefono}}</p>
                                    <p class="text-sm dark:text-white leading-none text-stone-500"><span class="dark:text-stone-500 text-stone-400">Imei: </span> {{$celular->imei}}</p>
                                    <p class="text-sm dark:text-white leading-none text-stone-500"><span class="dark:text-stone-500 text-stone-400">Color: </span> {{$celular->color}}</p>
                                    </div>
                                </div>
                                <div class="flex justify-between space-x-15 items-start w-full">
                                    <p class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">
                                        <a class="hover:text-stone-700 text-stone-500" href=" {{ route('celular.show',$celular->id) }}">Numero de Contactos: <b>{{$celular->contacts->count()}}</b></a>
                                    </p>
                                    <p>
                                        <a class="bg-white hover:bg-gray-100 text-stone-600 font-semibold py-2 px-2 border border-stone-400 rounded shadow" data-modal-toggle="extralarge-modal"  href=" {{ route('celular.edit',$celular->id)}}" >Editar <i class="fas fa-edit text-stone-500"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- MODAL CREAR -->
<!-- overlay -->
    <div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
        <!-- modal -->
        <div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
            <!-- button close -->
            <button onclick="openModal(false)" class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
            &cross;
            </button>
            <!-- header -->
            <div class="px-4 py-3 border-b border-gray-200">
                <div class="h-14 w-14 bg-blue-200 rounded-full flex flex-shrink-0 justify-center items-center text-blue-500 text-2xl font-mono">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>
                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                    <h2 class="leading-relaxed">Agregar Celular</h2>
                    <p class="text-sm text-gray-500 font-normal leading-relaxed">Celular propiedad de
                        <a class="underline decoration-sky-500/30" href="{{route('agenda.show', $detenido)}}">"{{$detenido->nombre}}"</a>.
                    </p>
                </div>
            </div>
            <form action="{{ route('agenda.celular', $detenido->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <!-- body -->
                <div class="w-full p-6">
                        @include('agenda.agregar.celular.custom.modal')
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
