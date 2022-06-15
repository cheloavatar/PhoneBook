<div class="py-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-2xl text-stone-600">
        <b>BIENVENIDO A PHONEBOOK</b>
    </div>
    <div class="flex flex-row">
        <div class="basis-4/5 text-stone-500 my-8 aling-middle text-justify text-lg">
            <span class="text-justify">Aplicación capaz de registrar personas y a esas personas registrar equipos celulares y a esos equipos celulares registrarle agendas telefónicas. Útil para la relación de contactos entre personas y equipos celulares.
La aplicación permite almacenar contactos manual mente o a partir de una lista de contactos en formato .CSV, .XLS y .XLSX (siempre y cuando respete la nomenclatura: en la primera fila del Excel nombre y la segunda teléfono)
.</span>
        </div>
        <div class="basis-1/5 flex justify-center">
            <img src="{{asset('assets/img/characteres/hector.svg')}}" alt="" class="w-16 md:w-32 lg:w-48" >
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <img src="{{asset('assets/img/characteres/group.png')}}" alt="" class="w-8 md:w-8 lg:w-12" >
            <div class="ml-4 text-lg text-stone-600 leading-7 font-semibold"><a href="{{ route('agenda.index') }}">{{__("PERSONS")}}</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-stone-500">
                Listado de personas que se han registrado a PhoneBook, aqui se agregan generales de la persona tales como lo son: Nombre, Alias,
                Lugar de Origen, Fecha de Nacimiento; Domicilio: calle, Numero, Colonia, Estado y Municipio (por el momento solo se pueden seleccionar municipios de colima).
            </div>
            <a href="{{ route('agenda.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-stone-600">
                        <div>Ver listado de personas</div>
                        <div class="ml-1 text-stone-600">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
                <img src="{{asset('assets/img/characteres/contacts.png')}}" alt="" class="w-5 md:w-6 md:h-8 lg:w-10 lg:h-12" >
            <div class="ml-4 text-lg text-stone-600 leading-7 font-semibold"><a href="{{ route('contacto.index') }}">AGENDAS</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-stone-500">
                Listado de contactos registrados en telefonos de las personas, aqui se muestra aquien a que persona le pertenece el contacto asi como tambien
                se muestra las caractristicas de el equipo donde estaba registrado (marca, modelo, numero de telefono e IMEI).
            </div>

            <a href="{{ route('contacto.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-stone-600">
                        <div>Ver listado de contactos</div>

                        <div class="ml-1 text-stone-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <img src="{{asset('assets/img/cell/cell.png')}}" alt="" class="w-5 md:w-6 md:h-8 lg:w-10 lg:h-12" >
            <div class="ml-4 text-lg text-stone-600 leading-7 font-semibold"><a href="#">CELULARES</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-stone-500">
                Se muestra el total de equipos registrados, donde muestra el IMEI, el número de celular con el que se registro así como a quien pertenece.
            </div>
            <a href="#">
                <div class="mt-3 flex items-center text-sm font-semibold text-stone-600">
                        <div>En desarrollo</div>

                        <div class="ml-1 text-stone-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <img src="{{asset('assets/img/others/guia.png')}}" alt="" class="w-5 md:w-6 md:h-8 lg:w-10 lg:h-12" >
            <div class="ml-4 text-lg text-stone-600 leading-7 font-semibold">MANUAL DE USUARIO</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-stone-500">
            Para utilizar PhoneBook lo primero que se tiene que hacer es <b class="text-lg"><a href="{{ route('agenda.create') }}">registrar una persona</a></b>, una vez registrada esa persona se tiene que acceder al <b class="text-lg"><a href="{{ route('agenda.create') }}">listado de la personas</b></a> y dar click en el ojo para acceder a el panel de persona (panel donde se muestran los celulares que pose)…
            </div>
            <a href="{{ route('agenda.usermanual') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-stone-600">
                        <div>Leer más...</div>

                        <div class="ml-1 text-stone-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>
</div>
