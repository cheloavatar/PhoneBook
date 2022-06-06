<x-app-layout>
    <div class="py-12">
        <div class="relative py-3 max-w-6xl mx-auto sm:px-6 lg:px-6">
            <div x-data="app()" x-cloak>
                <form action="{{ route('agenda.celular.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <div class="">
                            <div class="flex items-center space-x-5">
                                <div class="h-14 w-14 bg-blue-200 rounded-full flex flex-shrink-0 justify-center items-center text-blue-500 text-2xl font-mono">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </div>
                                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                    <h2 class="leading-relaxed">Agregar Celular</h2>
                                    <p class="text-sm text-gray-500 font-normal leading-relaxed">Celular propiedad de
                                        <a class="underline decoration-sky-500/30" href="{{route('agenda.show', $detenido)}}">"{{$detenido->nombre}}"</a>.</p>
                                </div>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="mb-5 text-center">
                                        <div class="mx-auto w-32 h-32 mb-2 border relative bg-gray-100 mb-4 shadow-inset">
                                            <img id="image" class="object-cover w-full h-32" :src="image" />
                                        </div>
                                        <input type="text" name="elemento_creo" id="elemento_creo" class="form-control" hidden value="{{$detenido->elemento_creo}}" >
                                        <input type="text" name="elemento_edito" id="elemento_edito" class="form-control" hidden value="{{Auth::user()->id}}" >
                                        <input type="text" name="url_f" id="url_f" class="form-control" hidden value="{{$detenido->foto}}" >
                                        <label
                                        for="fileInput"
                                        type="button"
                                        class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                            Buscar Foto
                                        </label>
                                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click para agregar fotografia del equipo</div>
                                        <input name="foto" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0]; var reader = new FileReader(); reader.onload = (e) => image = e.target.result; reader.readAsDataURL(file);">
                                    </div>
                                    <div class="flex items-center  content space-x-4">
                                        <div class="flex flex-col flex-1">
                                            <label class="leading-loose">Marca</label>
                                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="marca" id="marca" >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <label class="leading-loose">Modelo</label>
                                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="modelo" id="modelo" >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <label class="leading-loose">Telefono</label>
                                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="telefono" id="telefono" >
                                        </div>
                                    </div>
                                    <div class="flex items-center  content space-x-4">
                                        <div class="flex flex-col flex-1">
                                            <label class="leading-loose">Imei</label>
                                            <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="imei" id="imei" >
                                        </div>
                                        <div class="flex flex-col flex-1">
                                            <label class="leading-loose">Notas</label>
                                            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Opcional" name="nota" id="nota" >
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <a class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none" href="{{ route('cancelar','/') }}">
                                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                                    </a>
                                    <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Agregar</button>
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
                        image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAACAASURBVHic7d13nFT1of7xZ2Z2Z3svsLuwsPTeFEXBQrEiWFCSqFETS2KsKUajKdeS+1Nji9EkRo1JromN2LGiiAiCgEjvbVl2YXuvU35/7JUblbJ75syeM3M+79dr/tH9fs/DsMx55pTvcQnRbKSkUyWNkTREUn9JaZJSJXksSxWaCkmbJP1b0lOSmntw28MlXSvpNEmFkhJ7cNtAOPkkNUiqk7Rb0lZJayUtlLTRulgAumOCpEcklUoKRvmrRNJJ5rxtR+SW9P8kdfTwn48XLzu8SiU9LGm8ANiOS9I5kpbK+g+Lnn61SZoR+lt4RH+3wZ+TFy87vJZIOludnzkALDZe0qey/oPByleVpOxQ38jDuNoGfz5evOz2WiJprBDRIvU8MKRYSfdJ+qs6z0c7WYI6v5G8b/K8XkmvS0o2eV4g0vWVdJWkJEmLJAWsjQM4Rz9Jy2T9twA7vfbK/MOSZ9jgz8WLl91fS9VZCBBh3FYHQLeNVOfht+OtDmIzfST1MnnOY02eD4hGJ0haLk4JRBwu5Igsx0t6R1K61UHs6OypZz7cr2+/A2bN9+aC+TP3lpb0xF0GQDSoUedRsxVWB0HXxFgdAF02WJ3no9n5H0ZuTs6PO49ImiO/V572lpaYNh8Q5TIkva3OW3M3WZwFXcApgMiQLWmBpFyrg9hVclKyEuITTJ0zJyvH1PkAB8iS9JakTKuD4OgoAPbnUud96E6/0v+IBvUfaPqcBb3zlZjAYn9AN/WX9Iw4xWx73AZof9dLusnqEHYWHxev006erpgYc89ouVwueb1e7SnZY+q8gAMMlbRf0kqrg+DwKAD2lifpZUnxVgexK7fbrTOnnq7M9PAccczJylZDY4OqaqrCMj8QxSar80hAk9VBcGgUAHt7VNIkq0PYVXJiks6adqYKeueHdTv9+/ZTIBjQgYpyBU28yBCIcgnqfPjYm1YHwaFxjsa++qvziVyxFuewlYT4eGWkZWhAvyINHzxMMZ6eu5Gltq5W67duVElpiRoaG+Xz+3ps20CEalfnHUzFVgfBN1EA7OsP6jz/H7K4uDgNKCxS/779lJGarqTEJNPPlwPoGS2trdq3f5+pc/oDfrW1tampuVkVVRUqryxXh8+0gvuouI7JligA9hSvzkdwZoQyidvt1riRYzR+5Dh5vV5zkgGwVDgKwNf5fD7t2rtHxSXFCgRDXua/Wp3XM7WHngxm4hoAezpf0mWhTJAQH6+Z08/SsEFD5fHw1wxEC5/Pp4bGhrBuw+12KysjUxnpGaqorlQgEFIJSJC0WtJmc9LBLKwDYE+zQhns9Xp17hmzlJfb26w8ABwoIy1dx449RjGhf4mYbUYemIsCYE9TQxk8Y8o0ZaSFdPYAACR13m0zatjIUKeZZkYWmIsCYD/91flkO2OD+/ZTvz4sGgjAPDlZOcrOzAplikKxmqntUADsZ3gogyeOPcasHABw0MB+A0KdIqTPNpiPAmA/Q40OTE1JVXZmtplZAEBS5+dLQnxIi5Ia/mxDeFAA7KeX0YF98wyfOQCAo8rMCOk0AFcl2wwFwH5SDA9MTjYzBwB8RUJcSEcA+ICyGQqA/SQZHRgf2uE5ADiiEBcUM/zlBuFBAbAfw6szulz8dQIIH1doi8ey8qzNsMcAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeKsToAIlNbe5vKDuxXVU2V6hvq1eHzWR0JiHoul0ter1fBYFDpqWlKTkq2OhIiGAUA3bK3tERrN63X3tK9CgaDVscBHC0+Pl4FvfJVWNBXMTF8nKN7+I1Bl1RUVWrZ58tVUrbP6igA/ldra6t27Nmp4tK9KurbX33z+8jt5swuuoYCgKPauHWTFi9fokAwYHUUAIfQ0dGhrTu3qax8v8aNHKP4uHirIyECUBVxWIFAQAuXLtKiZYvZ+QMRoKGxQZ+tXqn6hnqroyACUABwWIs/W6LN27dYHQNAN7S1t+nzdV+ouaXZ6iiwOQoADmntpvXauHWT1TEAGNDh69AXG9bKx905OAIKAL6hurZGn65cZnUMACFoam7S1p3brI4BG6MA4BuWfb6cc/5AFCjdX6aGxgarY8CmKAD4irLy/dpTUmx1DAAmCCqoHbt3Wh0DNkUBwFes37zB6ggATFRRXamW1harY8CGKAA4yO/3a/fePVbHAGCy8soKqyPAhigAOOhAZbl8fq4aBqJNdW211RFgQxQAHFRVU2V1BABh0NjUaHUE2BAFAAfxIQFEp9a2Nh7ehW/gWQA4qKPD+OH/orMvUv/TzzcxDRCdmv3S8noDO+P2Vul310q+dkPb9fl9io2JNTQW0YkCgINCufc/f9JUFZ05x8Q0QHSq7ZBUYfDf2p9ulWorDQ3lCAC+jlMAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4UIzVAYDuqtm2QcUfvKGy5R+pubxMTQdK1dFYb3WsLonPyFZCdi8lF/RTwZTTVDjtHCXnF1odC4ADUQAQMUoWv6eVD/1S1ZvWWB3FsNaaSrXWVKpm2wbt/egtLbvnxyqYPEPH/vS3yhoxzup4AByEAgDba62q0KKfX6F9SxZYHSUs9i1ZoNJPP9TgCy7XCb98WJ74BKsjAXAArgGArdVsXa/X506O2p3/l4KBgLbOe0ZvXnyqGsv2Wh0HgANwBAC2Vbtjs+ZfMk3tDXVWR+kxVRu/0NuXn67ZL36iuPQsq+McUcDXoYbinWouL1NHS5N8zU3qaKqXNzlNMYlJiklMVlKvfCX36S+3h48awG74Vwlbaqur1oIfzXHUzv9LDcU7teD6uTrrmbfljvVaHUdS5xGKmi3rVLZ8kfavXKyabRvVWLJbAb/vqGPdMbFKKRygjMEj1XviScqbdKoyBo3ogdQAjoQCAFtadvePVb9nu9UxLHNg5Sda9/RDGvvD26wLEQzqwOpPtf3Vf2rP+6+qtabS0DQBX4fqdm5R3c4t2v3uy5KkhOxeKjpzjgade4myRx9rZmoAXUQBgO1Ub16rnW+9aHUMy6198gENuej7SsjK7dHt+lqatOWFp7XxX39SQ/HOsGyjpfKANj77R2189o9KHzhMIy79kQbPuUIeb1xYtgfgm7gIELaz6pHfKBgIWB3Dch1NDVr/zCM9ur01f75XL04bouX33hK2nf/X1e7YrKV33qiXZgzV+md+L39rS49sF3A6CgBspb2hLuqv+O+OXW+91CPbKV44X6+cM16rHvmN4UP9oWouL9Nn9/1cL88ar70fvW1JBsBJKACwlb0fvaVAR7vVMWyjsbRY1ZvXhm3+prISvfv9s7Xg2gtsc/thw95dev+H5+mD6y9Sa1WF1XGAqEUBgK1UrF1hdQTbKV+zPCzz7v3oLb16/nHat/SDsMwfqj0LXtfLs8fbNh8Q6SgAsJXmA6VWR7Cdlor9ps4XDAS04oHb9f61F6ittsrUuc3WWlWh966epTV/ud/qKEDUoQDAVloqD1gdwXaaTCxFAb9Pn/zyh1r31INSMGjavOEU9Pu16qFfafHt13Rp3QEAXcNtgLAVH1eAf4NZV8X7Wpv1wfVzte+T902Zr6dte/nv6mhq0KkP/N02CyQBkYwCgKjx2fyzNWF0ptUxDumfL+/S5TcvsWz7AV+HPrzpOxG78//S7ndf1scxMTrld3+Xy80BTCAU/AsCol0wqCW/+pFKFr1jdRJT7Jz/oj69+2arYwARjwIARLnPH7tb2175h9UxTLX5uSe04R+PWR0DiGgUACCKlS1fpDV/vtfqGGGx4v7bVP7FMqtjABGLawCAKNVSeUAf/eRSBf3+sG0jxu1WUU6uBufmKikuXmkJCaptblZjW6u2HjigPVWV8odpWeeAr0OLfna5zn15ubyp6WHZBhDNKABAlPr0rpvUUlVu+rwFGRn6zsRJOm3kKE0aMFAJR7giv6mtTUt2bNN7G9bpxRWfaX+9uY93bijZrRUP3KHJdz1u6ryAE1AAgChUsvg97X7vFVPnPL5ooG47a6bOGj1WbperS2OS4uJ0+ohROn3EKN0751t6bfUq3ffOfH2xt9i0XFvn/VVD5lyunLHHmTYn4ARcAwBEGX97m5aZeJV8fnqGnrv6Wi2+9Q7NHDOuyzv/r4txuzXnmIlafvtv9PTlVyo3JdWUfMFAQEvvvJEnSALdRAEAosy2l/+u+uIdpsw1a+x4rf71XZpzzERT5pMkl8ul754wWV/85h6dMXK0KXNWbVxt+hEPINpRAIAoEvD7Opf5NcGvzjlX/772BmUkJpky39dlJyfrtetv1g3TTjNlvjVP3BcxyxsDdkABAKLIzjeeV0PJ7pDneeCi7+hX55wbeqCjcLtcenDud/TLmbNDnqt60xrtXfS2CakAZ6AAAFFk8wtPhTzH7WfP0o3TzflW3lW/nnWefnjKtJDn2fz8kyakAZyBAgBEifriHSEvjHPmqNH69azzTErUPQ9962KdOHBwSHPsW/xeWG59BKIRBQCIEttffTakc+DZycl6+vKrDF/lH6oYt1v/uPIaJcfFGZ4j4Pdp11svmZgKiF4UACBK7Fnwekjj7znvQuWkpJiUxpjCzCzdHuL1AHsWvGZSGiC6UQCAKNBaVaGabRsMjx/Sq7eumHySiYmMu2HaacpPzzA8vnz1MvlbW0xMBEQnCgAQBco+WxTS4f9bzjjbskP/XxcXE6ObZ5xueLy/vU0HVvOQIOBoKABAFDiwaonhsSnx8broWHsto3vppMnyxhhfqfzAqk9MTANEJwoAEAXqdm4xPHb22AlK9B7+gT5WyE5O1ozhIwyPrw3h/QCcggIARIHaXcZ3eDNGGN/RhtO0YSMNj63btdXEJEB0ogAAEc7X2qym/fsMjw/13vtwmTLYeK76XdtYFhg4CgoAEOHaaqoN7+wSYr3ql5VtciJzDO2VJ5fBCxN9rc3ytTabnAiILhQAIMJ1NDUYHluYlWWbq/+/LikuTrkhrEvQ3mj8fQGcgAIARLhQCkBqfLyJScyXEp9geKyvudHEJED0oQAAES4Y8Bsem5aQaGIS88XHxhoe629rNTEJEH0oAECES8jqZXhsXnq6iUnM1xjCTjwmMdnEJED0oQAAES6lb5ESe+UbGjtl0BCT05irurHJ8NjYJAoAcCQUACDSuVwafN53uz0sLSFB546bEIZA5thfX6f6ENb0j02y9sFGgN1RAIAoMPrKn3T7KMCvzjlPmUlJYUoUunUlJYbHJmTlyuM1/lhhwAkoAEAU8Kama8bj8+RN7do5/e+eMFk3TJsR5lSh+XjrZsNj0wYMNTEJEJ0oAECUyB51jGa9sFg5Yw//YJ+kuDj99vwL9dRl3ze8yE5PeWvdGsNj04rsfW0DYAfGH7cFwHbSioZo1vMfa9+SBdrzwRuq3b5R/rZWjYl166wBAzR34nHqnZpmdcyjWluyV+v2GT8FkDFklIlpgOhEAQCijculgimnqWDKaQf/0zm71+mc3WstDNU9f/zog5DG50061ZwgQBTjFADgAMt79VekPBqnuLpKzy5banh8QlauMgYONzEREJ0oAIADVCSkaGdajtUxuuSWl55Xu89neHz+CdMkm1/fANgBBQBwiA8L7H9l/OtffK5XVq8KaY6imXNNSgNENwoA4BCf5xSqLMm+FwDuqarU1f94JqQ54jNz1Oek001KBEQ3CgDgEEGXS/P7jbY6xiFVNzXp3Md/r5pm40v/StKAsy+SO8b4A4QAJ6EAAA6yMrefNmcYf3hQOFQ1NWrWHx7SxtJ9Ic3j8ng04rLrTUoFRD9uA0TUeOyZzeqdY/z58eG0YWut1REOen7wcbp91Vvy+o0/Rtgs28sP6Pw/Pqot+8tCnmvA2XOVWjjQhFSAM1AAYCsut/GDUv+Yt9PEJPYRyntyKPsTU/XioGN16Zblps7bXc99tkw3/Ot/Qnrgz5dcbrfG/ODnJqQCnIMCAFuJz8y2OoLtJGTlmj7nJ3mDNKiuQpP293xp2lC6T7e89LwWbNpg2pxDL7pSGYNGmDYf4AQUANhKYk6e1RFsJyFM78n/DD1eKe0tGlkd+uH3o/EHAvpg80Y9+fFHen3NagWD5i1LFJ+Zo2N+cpdp8wFOQQGAraT04xzu16WG6T3xu9x6cuRJumnNhyqqrzR17oqGBu2qrNCG0n36eOsWfbBpg/bX15m6jS9NvOW/FZeWGZa5gWhGAYCtFJ56tlY99CurY9iGJz5B+SdMDdv8rZ5YPTJuuq5ev1ijqku7PT4YDOr1Nav1worl+mJvsfbX1aqxrS0MSQ+t6KwLNfj8y3pse0A0oQDAVjKGjFJqv0Gq37Pd6ii2UHDidMUkJIV1G23uGP1p9Cmau22VTind2uVxxdVV+s5f/qgVu3eFMd3hpRYO1JS7/2TJtoFowDoAsJ0Rl/7I6gi2MeLS63pkO36XW88NmainRkxRSxcW0tldWanJ995t2c4/NilF037/nGKTUy3ZPhANKACwnWHfuYb7uSX1Oel05Z84rUe3uTK3n/7ruFla3rvosE8P9AcCmvvEYzpQX9+j2b7kjvVq2h9eUObwsZZsH4gWFADYjjsmVpPueMj0+98jSWxiso677XeWbLvOm6Bnhp2oh8fP0Jb0b64a+OX5fiu43G6dfO9TKjhxuiXbB6KJcz9hYWt9TjlTE26+0+oY1nC5NOW//6L0gcMsjbE1rZceHjdDv5twupb3LlKbu/OSoX8t/9SSPO5Yr0753d81YOa3LNk+EG24CBC2NfbqW9RSsV8b/+dxq6P0GJfHo0m3P6SiM+dYHeWgHak52pGao7jBHRpdWapPi2/q8Qyxicma9ocXVDB5Ro9vG4hWHAGAfblcmnTHQ5p81+OOeMJbbFKKpj/2koZf8kOroxxSmydWK7L7qKGpsUe3mz5ouM55cTE7f8BkFADY3tC5V2n2vKVRuwNwud0adN6luuDNL1Q4dabVcY7I5fHIm5LWY9sbdO4lmvXiJyzzC4QBpwAQETKHjdEZT89X2fJF2vH6v1S8cL5aqyusjhWS5IJ+6jd9lgbPuUKZQ0dbHafLsoaPVdnyRWHdRlJeHx3/iwfU//Tzw7odwMkoAIgoeceforzjT1HQ71fN9o1qKitRS+V+tdZUWR3tqFwul+Kzc5WYk6fk/EKlFQ2xOpIhA2bODVsBcMd6NfKy6zXuujsUm5gclm0A6EQBQERyeTzKHDo6or45R4vB51+mdU8/bOpqjZ74BA298HsafeVPlZTXx7R5ARweBQBAt7hjvZr+hxf05sVT1dEY2mJAaUVDNHD2xRo698qwPPYYwOFRAAB0W8aQUTrnXwv1wQ3f6taRAJfbrcxhY5Q/aar6n3GBcsYeF8aUAI6EAgDAkIwho3TBm6u19d9/0663XlLFulXytTRJkrwpaYpNSlZCTp7S+g9W+sBhSh84XL0nTlFcepbFyQFIFAAAIXDHejXs29do2LevkST5W1vkiU+wOBWArmAdAACmYecPRA4KAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAH4mmAiFj+tlY1V+xXc3mp/K2tVsfpkpikJCX16qOE7Fy5Y2J7fPsBX4caS4vVUrFfLVXlCgYCPZ6hu1wejxKycpWYm6+kvD5ye/jYAszAvyRElMayvdr11ksq/uANlX+xLCJ2YIfi8cYp7/hTVDhjtorOnKO4tMywbSvg69Ce917V7vdfVcni99TRWB+2bYVbXGqG+px6lvqfdp4Kp8+Sy81BTMAoCgAiQlttldY9/ZA2/OMx+dsi49v+kfjb21Sy+D2VLH5PK+67TcMv+aHGXvsLxSYmm7qd4oXz9dm9P1f9nu2mzmuVtvoa7Xj9X9rx+r+UPnCYxt/waxWdOcfqWEBEoj7D9kqXfqh5Z4zS2icfiIqd/9d1NDdq7ZMP6LXzjlPt9k2mzOlradKHN3xLC669IGp2/l9Xu2OzFt58sT766WXyt7ZYHQeIOBQA2Nrm557Qe1fPUltdtdVRwq6+eIfe+PbJKvn43ZDmaS4v05sXT9Xu9181KZm97Zz/gt6+4ky11lRaHQWIKBQA2Nbud1/W0rtuUsDvszpKj+lorNcHN8xVxZrPDI33t7ZowXUXqnrTGpOT2Vv5F8v0wfVzFehotzoKEDEoALClyg2fa9Gt35eCQauj9Dh/W6s+uGGumiv2d3vsx7+4SpXrVoYhlf0dWLVEy+75idUxgIhBAYD9BINa+uvrHH1et7m8TCsfuL1bY0oWvaNdb88LU6LIsPmFJ3Xg86VWxwAiAgUAtrPzrRdVueFzq2NYbscbz6lq4+ou/WwwENDKR34d5kSRYcV9tznyyBHQXRQA2M7apx60OoItBAMBrf/rI1362X1LFjjuvP/hlK9ZrvK1xq6hAJyEAgBbady3hx3Zf9i76O0uXdi25/3XeiBN5Cj+4A2rIwC2RwGArezhg/sr2hvqtH/FJ0f9ub0L3+yBNJGj+EPeD+BoKACwldrtG62OYDs1R3lP2hvqDN0xEM3qd22L2GWigZ5CAYCtNJeXWR3BdloqjvyetLDz/4aA38fCQMBRUABgK63VFVZHsJ2WigNH/P+8Z4fWUnnk9w1wOh4GBFsJ+Iyv+jcxp7dSY70mpjHP/pYmbaipMjT2aCshBvx+Q/NKUnZOjqacfKrh8eG28IP3VVdba2hs0EErSAJGUAAQNR47caomZOdaHeOQ/rl9s65YFNoa/+EwbMRI/f25F62OcVgnHTdBa7/o2loIALqHUwAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwoBirAwBmueD9N+T1eKyOcUhNvg6rIxzSsiWfqF+vTKtjHFZDfb3VEYCoRQGArXhivYbH7mtuNDGJfbiP8p544uIMz+3z+VRbU2N4vJ15vPFWRwBsjVMAsJWEnF5WR7CdxNy8I/7/hOzePZQkshztfQOcjgIAW0nMzbc6gu0cbUeWmJsnuVw9lCYyxMQnypuabnUMwNYoALCVzGGjrY5gO5nDxhzx/3u8ccoYNKKH0kSG7NHHWB0BsD0KAGylcPpsudz8Wn4pPitHuWOPP+rP9ZsxuwfSRI7CabOsjgDYHp+0sJWErFzljj/B6hi20W/6uXJ14c6G/qef3wNpIoPL7aYQAV1AAYDtjPvR7VZHsAV3rFdjrvppl342c/hYFU7nW68kDTrvu0rpW2R1DMD2KACwnYLJM1Rw4nSrY1hu+MU/UErhgC7//MSf/bfcHmff2euJi9f4G35ldQwgIlAAYEsn3vm44tKzrI5hmfRBwzXhhl93a0xa0RAd85O7w5QoMky640El5/W1OgYQESgAsKWUvkWa8diLR10EJxrFpWVqxuPzFJuc2u2xo6/8iYZc+L0wpLK/kZddr6Fzr7I6BhAxKACwrV7HTtG0R59XbFKK1VF6TFLvAp35zFtK7TfI8Bwn/uZRDbno+yamsr9R37tJx916v9UxgIhCAYCtFU6dqXOe+yikHWKk6HXMZM2e96myRowPaR53rFdT7v6TJt3xkDzxCSals6fYpBSddO9TOu7W+7t0twSA/0MBgO1lDBmlC+Z/ocl3Pa6ErFyr45guOa+vJt/1uM7+nwVKyDZvKeQR371OF727UUPnXhV1O0d3TKyGzr1KF767QYPP+67VcYCI5OxLhhExvvzAH3DOt1Xy8bsq/uANlX22SC0V+xUMBKyO1y3umFgl5fVRwZTT1W/6LOVNOlXumNiwbCuxV74m3/W4xl//SxV/+IaKP3xTNVvXq6WyXAGbPqHwUNyxXiVm9+q83XHaOSqceo7is3KsjgVENAoAIkpsYrKKzpyjojPnSJICfp9aK8vlb2+zOFnXxCQkdh7F6OG1+xNz8zTs29do2Lev6fwPwaBaqsrla2nu0RxGxCQmReWRH8BqFABENLcnRom9eIBQt7lcpp5uABB5uAYAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4UIzVAQAr+dvbVL97m+p2bVXDvj1qr6uRr6VJHS3NcrnciklMVGxisuJSM5TSb6DSBwxVcp/+cnv4pwMgsvEpBkdpb6jT/s8+VumyhSpbvki12zcqGAh0aw53TKyyR05Q3qRTlXf8qep1zInyxMWHKTEAhAcFAFEv6PerbPkibX/tWe1+9xX5WptDmi/g61D5muUqX7Nca564T7HJqeo3fZYGnXup8k+YKrlcJiUHgPChACBqdTQ1aNO/ntCGv/1eLVXl4dtOY722v/ZPbX/tn0rtN0hjM33s6AAAHshJREFUrrlFg2ZfLHesN2zbBIBQcREgoo6vtVmrH7tHL04drJUP3hHWnf/X1e/Zrk/u+IHmnT5Cm194stunFwCgp1AAEFWKF87XK+eM1+rH7lZbfY1lORrL9mrpb67X6xeeoPI1yy3LAQCHQwFAVGirr9GHN35bC669QA0lu62Oc1DVxi80/zunavm9tyjQ0W51HAA4iAKAiFe5fpVen3OCdr/3itVRDikYCGjD3x7Vm98+RQ3FO62OAwCSKACIcFtefLpzx7p3l9VRjqpyw+d67cITVPrpQqujAAAFAJFr7ZMPaMlvrlPA12F1lC5rr6/Ve9fM1s75L1odBYDDcRsgItLye2/Rhr89anUMQwId7Vp0y+Vqb6zTsG9dbXUcAA7FEQBEnNWP3R2xO/8vBQMBfXrnjdr11ktWRwHgUBQARJTNz/9Fqx+7x+oYpggGAlr08+9p3yfvWx0FgANRABAx9q/4WJ/efbPVMUwV8HVo4U8ujYiLGAFEFwoAIkJrVYU++ullCvr9VkcxXXt9rRb++BLWCQDQo7gIEPYXDGrRz69Qc3lZ2DaRn1+gMaPHqKioSDk5uYqP73y6X3NTkw6UH9D27du1Zu0aVVdXhWX7letXacWDd+j4234XlvkB4OsoALC97a/9U/uWLDB93qFDhmrOBRfqjDPOVL/Cfkf9+WAwqM2bN2n+2/P18isvq7R0n6l5Nv7jMQ2c+S1ljz7W1HkB4FAoALC1tvoaffa720yd85gJx+imG27WySef0q1xLpdLw4eP0PDhI3TzTT/Wm2++oUcfe1Q7d+4wJVcwENDSO2/UrBcWy+XxmDInABwO1wDA1lY/epdaqypMmSszI1MPPvCw5r34crd3/l8X44nReeeer3ffek+33nKb4uLiTMlYuX6Vtsz7qylzAcCRUABgW83lZdry4tOmzDXx2Ima/+bbmnP+HLlcLlPmlKTY2Fhd+8Mf6ZV5r6p/v/6mzLn2z/dF1OqGACITBQC2te6vD8nf3hbyPKefdoae/ce/lNc7z4RUhzZixEi99sobOvaY0M/fN5bt1fbX/mlCKgA4PAoAbKmtrlpbXgj92//sWefqz398wrRD9EeSlpamf/ztWY0fPyHkudY9+YAUDJqQCgAOjQIAW9r11kvytTSFNMfkEyfrwd89JLe7537NExMT9dennlH//kUhzVO3e5v2r/zEpFQA8E0UANjS9ldDOwSenZ2tRx56VLGxsSYl6rqM9Az9+Y9PHFxLwKgdbzxnUiIA+CYKAGynfs92la9ZHtIc9/73/crJyTEpUfcNGzpMN15/U0hz7Hp7nvxtrSYlAoCvogDAdvYueiek8dOnTdeM6TNMSmPc1VddowEDBhoe395Qp/LVy0xMBAD/hwIA2ylbtjCk8Tff9BOTkoQmNjZWN1x3Q0hzlIb4XgDA4VAAYCtBvz+ki99OmnKSRo8abWKi0MyaNVv5+QWGx5d9SgEAEB4UANhK3a6taq+vNTz+ogvnmpgmdDGeGF1w/gWGx1duXK2A32diIgDoRAGArdTt2mp4rNfr1WkzTjcxjTlmnjXT8NhAR7sa9u4yMQ0AdKIAwFZCKQDjx09QQkKCiWnMMWzYcGVmZhkeX797m4lpAKATBQC2Ul9s/Ml648aMMzGJeVwul8aNHWt4fP3u7SamAYBOFADYSntdjeGxAwcav+Uu3EK5HbCt3vh7AgCHQwGArXQ0Nxoe27tXbxOTmCuUBxF1NDWYmAQAOlEAYCsdTcYLQFJysolJzJWUlGR4bCjvCWAmj8cTynB+kW2GAgBbCQYDhse6XS4Tk5grlA/OoN9vYhLAuBCfb7HHrBwwBwUAthKbaPybclNzs4lJzNXQaPzLT2xyiolJAONSk1NCecBWaGt8w3QUANhKbJLxnV1FRbmJScxVWVlheGwo7wlgJpfLpb75fYwMXSRpnclxECIKAGzFm5xmeOzOnTtNTGKuHTuM397oTTH+ngBm69+nn5K7d6SuQdJ1YYqDEFAAYCspfYsMj1233r5fMELJltKnv3lBgBB5PB6NGzVOSQmJXfnxekkXStoQ3lQwggIAW0krGmJ47IqVK+Tz2W/d/N17dqu0dJ/h8WkDhpqYBghdQny8jhs/UX3z+8rtOuxuZL6kiZLe67lk6I4YqwMA/ym1/2DDY5uaGvXJksU69ZSpJiYK3bvvGb/2yeV2K7XQvgscwbliYmI0bNAQDew/QNU1VWpqaVZVdeXfauvrl0h6X1z1b3scAYCtpA8aLk+88fX85/17nolpzPHKKy8bHps+aIQ8cSHdegWEVWxMjHrl9NKAwiKddsr0pyU9JXb+EYECAFvxeOPUa/wkw+PfefdtlZSUmJgoNIsXf6zNWzYbHp9/gr2OZgCIHhQA2E7eJOM7PZ/Pp8f/9JiJaYwLBoP6/R8eCWmOUN4LADgSCgBsp2DKaSGNf+HF57Vm7RqT0hj3yquvaOWqlYbHe+LilTfxJBMTAcD/oQDAdrJHTlD6wGGGxwcCAf381p+ppaXFxFTdU7a/TPf89q6Q5iicOlOxyakmJQKAr6IAwJYGnntJSOO3bN2iX/3mlyal6Z6Ojg7dcON1qq6pDmmeUN8DADgSCgBsadCsi+X2hHaX6rx/v6RHfv+wSYm6JhAI6Mc/vTmkQ/+SlJCVqz4nnW5SKgD4JgoAbCkpr48GnPOtkOd55NGHdd/9/8+EREfn8/t02+236s35b4Q818grbpI7xvBDVwDgqCgAsK0x1/xcLnfov6J/euJPuuXWn6m1tdWEVIdWVVWpyy6/VC++9ELIc8WlZWr4xT8wIRUAHB4FALaVPnCY+p85x5S5Xpr3os49f1ZY7g5Y8MECnXXOmVr66VJT5ht5+Q08ARBA2FEAYGsTb/l/ikno1pPHDmvL1i06f865uu32W01ZLGjjxg266prv66prvq/ycnMeRZzSp79Gf//HpswFAEdCAYCtJef11bhrf2HafIFAQM+/8JxOnX6yrr/xOi386MNuPUCoublZr73+qi773nc1c/bZWvDBAtOySdKkXz4c0lLIANBVPAwItjfqezdp5/wXVL3FvMf9+nw+vTn/Db05/w0lJSZp4sTjNGrUKA0aOEjZ2TlKSUlRwO9XY1OTSkv3adeuXfr8i8+1evXn6ujoMC3Hf+p/xgXqe+rZYZkbAL6OAgDbc8d6Ne3R5/XaBZPU0dRg+vxNzU36aNFCfbRooelzd1VyXl9NvtMeSxgDcAZOASAipPYbpMl3/dHqGGHhjonVqQ8/q7j0LKujAHAQCgAixoCZczXyihutjmEul0sn/tcflDvO+BMQAcAICgAiyvG33q/B519mdQzTHHPznRpy4fesjgHAgSgAiCwulybf/Uf1PfUsq5OEbORl12vsD261OgYAh6IAIOK4Y2I1/fF5GnzB5VZHMWzM1T/T8bc/aHUMAA7GXQCISG5PjKbc82d5U1K14e9/sDpOl7k8Hp3w699r2LeutjoKELK2tjYVl+5VRVWlWlpbFAgEPpK0T9L7kv4sKbSnYiGsOAKAiOVyu3X8Lx7QKfc/o9jEZKvjHFV8Vo5Of/INdv6ICiVl+7RkxafavXePmpqbFAgEJMkjqVDSlZI+k/QnSV4LY+IIKACIeANnX6zZ85Yqc+hoq6McVsGU03TBG6tVcOJ0q6MAIdtdskebtm2WP+A/0o+5JP1Q0ktiX2NL/KUgKqQNGKrZ//5Ux9/+oK0epBOXnqXJdz2uM558Q/GZOVbHAUJWW1+n7Tt3dGfIbEk/CVMchIACgKjhjonVyMuu1/lvrlbR2ReZ8ihhozxx8Rp52fW66L2NGjr3KsnlsiwLYKYdu3coqGB3h90hyf7n6RyGAoCok5zXV1MfelYXvrNBQ+deJben5651jUlI0ojvXqeL3tuk429/UN7U9B7bNhBube1tqqmtNTI0XVLk37sbZbgLAFErpXCAJt/1uMb96HbteP1f2v76P1W7fVNYtpU7/gQNmv0dFc2cq7jUjLBsA7BaQ2OjkW//X5qgzusBYBMUAES9pN4FGnPNLRpzzS2q2rha+z5ZoNJlH+rA55/K39piaE5varp6TzxJ+SdMU9+Tz1RK4QCTUwP209HRHsrwXLNywBwUADhK1ojxyhoxXmOuuUX+9jbVbt+k+t3bVLdrq+qLd6ijuVEdTQ1qr6+Ty+1WbHKKvMlp8qakKbXfIKUVDTn4cnk8Vv9xgB4VNPzlX1LnLYKwEQoAHMvjjVPWiHHKGjHO6igA0OO4CBAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAAAORAEAAMCBKAAAADgQBQAAAAeiAAAA4EAUAAAAHIgCAACAA8VYHQAwW/OBUm177VmVffqhmg6UKtDR3qPbj4lLUHKffio46QwNmn2xvClppm+jtbpC21/7p/YtWaCm/SXyt7Wavo0j8cTFK6l3HxVMPk2DzrtE8RnZps4f6GjXrrfnqXjhfNXt2qqOpgZT5z8al9ujhJze6jXhBA2afYnSBw3v0e0DPYECgOgRDGrtkw9o9R9/K39ri6VRarZv1N6P3tYXj92jSb98WANmzjVt7s3PPaEVD/5SHY31ps1pRO32Tdr3yfta/fg9mviz32rYt68xZd4Dny/Vx7ddqYbinabMZ1T9nu06sPITrXvqQQ2de5WOv/0BebxxlmYCzMQpAESNJb+5Tisf+qXlO///1FpTqY9+dpk2/P0Ppsy38qFfaemdN1q+8/9PHY31WvpfN2jVI78Jea6Sj9/VO1ecafnO/z8FAwFtfv4vevfKc+Rvb7M6DmAaCgCiwuYXntSWF5+2OsahBYP67P5btX/F4pCm2f3+q1r7l/tNCmW+NX++V3vef83w+MayvVr4k0ttu5Pdv+JjrbjvVqtjAKahACDi+Vqa9Pnv77Q6xhEF/X59dv9tIY1fEcL4nvLZ725T0O83NPaLx+6x1ZGNQ9n8/JOq273N6hiAKSgAiHh7F72j1uoKq2McVeW6lardsdnQ2P2rlqhh7y6TE5mvoXinDny+tNvj/O1t2vXOv8OQyFwBv08733ze6hiAKSgAiHgVa5ZbHaHLyld/amhcxReR9Gdc1u0x1ZvX9viV/kaVf27s7xCwGwoAIl5Llf2//X+pparc2LhqY+Os0FJ1oNtjWqsrw5AkPIz+HQJ2QwFAxIsLw3324RKXlmFsXEq6yUnCJy4ts9tjvKmR83foTTX2dwjYDQUAES9j6CirI3RZxhBjWY2Os4KRrOkDh8ntiYxlSTKHjLQ6AmAKCgAiXuG0WRGxQEtSXh/ljptkaGzBlBlhWVHQbN7UdBVMmdHtcXFpmco7YWoYEpmv/5lzrI4AmIICgIiXkN1Lwy/5odUxjmr89b+Sy23sn1xMQpLGXH2LyYnMN+bqWxQTn2ho7PgbjL8/PaXgxOnqPfEkq2MAprD3vzagi4656U7ljJlodYzDGjDzWxpyweUhzTHqyh+rYHL3v133lIIpp2n0939seHzu2OM14ab/Mi+QyRJ75euke2262BRgAAUAUcETn6Aznp6vvqeeZXWUr3K5NPySH+rk+56WXK6QpnJ7YjTj8XkaeM63TQpnnoGzvqMZj70kl8cT0jxjf3Crjv/FA3LHxJqUzByZw8dq5j8XKjE3z+oogGki46oboAu8KWk67c+vqvjDN7X5+b+obNlHli0rG5ucqj4nn6GRl9+g3LHHmzavJz5Bpzzwdw2ec4U2Pvu4Spd8IF9rs2nzd0dMfKIKpszQiEuvU96kU02bd+TlN6jv1LO1/umHtWfBa5bddudyu5U7bpIGn/9dDbrgsoi5SBHoKn6jEXUKp52jwmnnSMGgWqrK5Wvp2R2kNyVVcelZYd1G/glTlf+/F821VlWoo7kxrNv7utjEZMVn5YRt/tTCgTrxzsd04p2PqaOpocfXCfB44xSfnctOH1GN325EL5dLCdm9rE4RdvFZOWHdGVstNilFsUkpVscAog7XAAAA4EAUAAAAHIgCAACAA1EAAABwIAoAAPSgtmDQ6giAJAoAAPSoRr/VCYBOFAAA6EElrVYnADpRAACghzT7pT2tnAKAPVAAAKCHLKsLysf+HzZBAQCAHrCqPqjdfPuHjbAUMACEUUug85v/rhZ2/rAXCgBM0RqQGnxWpwDswSepviOoknZpZ3NQHez7YUMUAJhiVUNQq8oDVscAAHQR1wAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAMzR0W51AiC6BYNSR4fVKRBFeBogDoqJCeHX4Yk7pJceNS8MgK9qb5Wa6gwP93g8JoZBNKAA4KCEuHjjg9uapbJd5oUBYBqPxyOPmwKAr+IUAA5KT0u3OgKAMEhKSLQ6AmyIAoCDeuf0tjoCgDCg3ONQKAA4KCkxUVkZmVbHAGCy7IwsqyPAhigA+IqhA4daHQGAieLi4pRJscchUADwFSOHDldyYpLVMQCYZEBhkVwul9UxYEMUAHxFjCdGx4w9xuoYAEyQlJCogt75VseATVEA8A3DBg1R71wuCAQimcvl0rDBw/j2j8OiAOAb3C63zpp6ulJTUq2OAsCgIQMGKzM9w+oYsDEKAA4pPi5eZ5xymuJDWRwIgCX65vdRYUFfq2PA5igAOKzszCzNOfs8vkUAEcLlcmlw0SANG8TdPDg6CgCOKDUlVeefda6GDhzCuUTAxhISEjR+1Dj179vP6iiIEDwLAEfljfVq2uRTNXbEaC37/DMV79trdSQA/8sb61VRYX/1yS+Q28V3OnQdBQBdlpWRpZnTz1Jtfa127N6pkrJ9qqqpUls7jwIGeorb5VJ8fIIy0tKVnZmt7Mwsud3s+NF9FAB0W3pquo4ZM0HHjJkgSWpvb1dre1vn88oBhE1MTIyCQamsvMzqKIgCFACEzOv1yuv1Wh0DcISW1larIyBKcNwIAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCAKAAAADkQBAADAgSgAAAA4EAUAAAAHogAAAOBAFAAAAByIAgAAgANRAAAAcCCeBgg4RFt7u2rralVbX6vmlhb5/D5JUownRokJCUpPTVdGWjpPdgQcggIARLGqmmpt27lNJWX7VFlTpWAweMSfd7lcys7IUp/8PhpcNEhZGZk9lBRAT6MAAFEmGAxqZ/EurV7/hSqqKrs9tqK6UhXVlVq9/gvlZOVowqhxKirsL5fLFabEAKxAAQCiSFn5fi1e/omqaqpNma+iqkLvLnpfWRlZOnnSFPXO6WXKvACsRwEAooDf79fSlcu0fsuGsMxfVVOlV95+TaOHj9IJE46Xx+MJy3YA9BwKABDhGpub9PaH76qyunuH+41Yt2m99pfv11lTz1RSYmLYtwcgfLgNEIhgtfW1evXt13pk5/+liqpKvfLOa6qtr+uxbQIwHwUAiFCNzU164/231NDU2OPbbmhs0OvvvWnJtgGYgwIARKD2jna98d58NVq4A25qbtL8BW+po6PDsgwAjKMAABHo42WfqLa+1uoYqqmr1cJPF1kdA4ABFAAgwmzbuV3bdm23OsZBO3bv1PbdO6yOAaCbKABABGlvb9fSVcusjvENS1d+qvaOdqtjAOgGCgAQQdZsWqfmlmarY3xDU3Oz1m1ab3UMRwjqyMs5A11FAQAiRIevQ+s223cnu3bTenX4fFbHiHrBQMDqCIgSFAAgQuzYvVNtbW1Wxzis1rZW7dyz0+oYUY+SBbOwEiAQIbbs3GbKPHFer/rk9VFaapqkoOrq67W3rETt7aGfw9+6c5uGDhwSekgcFrddwiwUACACtLe3a/+B/SHN4fF4NHHsMRo9fJRiPF/9p+/z+7R243qtXLtKfr/f8DZK95epo6NDsbGxIWXF4bW2tVgdAVGCUwBABCgr369A0Pi539iYGM0+babGjxr3jZ2/JMV4YjRh9DjNOm2mYmOMfy8IBAMqKy8zPB5H5g/41cbdFjAJBQCIABUhrvV/ygknq3du76P+XF5ub5086aSQtlVR1XPPJXCahsYGcRMAzEIBACJAbZ3xVf9ys3M1uGhQl39+yIDBysnKMbw9HhIUJkGpvqHe6hSIIhQAIAI0NTcZHjukGzv/g2MGdH/Ml6x8PkE0a2xuUjsXAMJEFAAgAoTywZ+dld39MZndH/MlrlI3XyAYUFUNp1ZgLgoAEAFCuTLfa+CK/Div1/D2/AHjWXFoVTXV3P8P01EAgAgQym11Tc3dXzo4lFMOsTHcAmimxqZG1XFdBcKAAgBEAG+s8W/k+/bv6/aYkrJSw9vzhnD0AF/V2taq8soKq2MgSlEAgAiQmpJieOzm7Vu7tcpfW3u7tuzYanh7aSmphsfi/zS3tmjfgbKQ1n8AjoQCAESAjLQMw2Nb21q1ZMXSLv/8khVL1drWanh76WnphseiU219ncoOlPHgH4QVSwEDESAvt1dI4zfv2KpYr1cnHjtJbtehe38gGNDSFctC+vYvqUsLDuHQ2trbVVFVEVIBA7qKAgBEgOzMbMV5vWoL4YE96zatV+n+Uk0YPV79+hQevFivw9ehPSXFWrV2taprq0PKGR8Xr+yMrJDmcKK2tjbV1tepoanB6ihwEAoAEAFcLpeKCou0efuWkOapqqnW+x9/ILfLrYSEBElSS0uLaeeZBxT2l8vlMmWuaObz+9TW3q7W1lY1NTepnfX9YQEKQBSpqqnSnn3FVsdAmKSnppk2VyAYCOlWv8NJS03jd/AIAoGAgoEgF/bBFigAUcTv97MKWxRLSU5RakqqbdeDT01OUXJSMr+DQITgLgAgghQV9rc6wmEN6DfA6ggAuoECAESQ3KwcZaZnWh3jG7IyMpVj4JkDAKxDAQAizLDBQ+Vxe6yOcZDH49GwQUOtjgGgmygAQIRJSkjU0EFDrI5x0LBBQ5WYkGh1DADdRAEAIlBB73z1ye9jdQz1ze+r/F55VscAYAAFAIhQwwYOUa+cXMu23zunl4YOGmzZ9gGEhgIARCiXy6XRw0apIK+gx7ed3ytPo4aNlEss+gNEKtYBACKYy+XSiMHDlBifoO27dygYDIZ9e4OLBqlfn8KwbgdA+FEAgCjQv28/paela+PWTWFZ4U+SkhKTNHLIcKWZuCIhAOtQAIAokZ6apknHHKfikr3aXbLHtBX5vLFe9e/bT4UFfVnnH4giFAAgirhdbvXv20998/to3/5Sle4vVUNTo6G5UpJTlN8rTwW98+Xx2GfdAQDmoAAAUcjj8aiwoK8KC/qqsblJ1TXVqq6tUWNzo1pbW79xrYDL5VJCfLySEpOVmZ6hrIxMJSUmWZQeQE+gAABRLjkxScmJSSos6Cup80mAvg6ffH6/JCnG41FMbIzcLm4KApyEAgA4jNvlltfrldfqIAAsReUHAMCBKAAAADgQBQAAAAeiAAAA4EAUAPsxvJZruJeBBeBsQeMfT53DYSsUAPsxvI5re3u7mTkA4Cva2ttCGd5gVg6YgwJgP4b/kbS2tZqZAwC+orWNAhBNKAD2c8DowKraajNzAMBXVNdUhTLc8GcbwoMCYD9bjA5saWlRfSMlG4D56hvq1dIa0lFGw59tCA8KgP1sCmXwzj07zcoBAAftCP2zJaTPNpiPAmA/uyXtNTq4oqpSFVWV5qUB4HjllRWqrA7p8P8eScUmxYFJKAD2tDCUwes3b1Bjs+GbCQDgoMamRm3YsiHUaT40IwvMRQGwp9dDGezz+7RyzSrV1NWalQeAA9XU1mjl2s8PPjkyBCF9piE8XFYHwCHFSSqVlBnKJC6XS/36FKp/3/6KjeHBjwC6psPn067iXSret9eMBcaqJOVLYqESm/FYHQCH5JdUIOn4UCeqra/TvrJ9am5pkdRZCtweN89+B3CQP+BXS2ur6uprtbtkjzZt26ya2hqzpv+LpLfMmgzm4QiAffWVtF3ise0AIlaHpMHqvAgQNsPXQPvaK+kfVocAgBA8JXb+tsURAHvrpc57ZzOsDgIA3VQtaZikCquD4NC4BsDemiTVS5ppdRAA6KabJC22OgQOjyMA9ueS9LKk86wOAgBd9Kak2eIRwLZGAYgMmZJWSepvcQ4AOJodko6VxEIkNsdFgJGhWtJp4mlaAOytUp2nLNn5RwAKQOTYrs5DaqbdnAsAJqqWdJZ46l/EoABEls8kTVEIDwsCgDAokzRV0kqrg6DrKACRZ6OkEyUttToIAKjzSv+JktZaHQTdw22AkalenYsEeSVNEkUOQM/rkHSvpO9JqrM4CwzgLoDIN0bS4+o8NQAAPWGRpOslrbc6CIzjm2PkWyvppP99fWBxFgDRbYk6L0aeKnb+EY8jANFnrKTLJM2V1MfiLAAi315JL6rztCPn+aMIBSC6DVNnUx8jaaikQnUuKpQiKcbCXADsxSepQZ238u2RtFXSGkkLxW19Uev/A9XAeV/WXZbFAAAAAElFTkSuQmCC',
                    }
                }
            </script>
        </div>
    </div>
</x-app-layout>
