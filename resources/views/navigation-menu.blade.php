<div>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                {{-- botonMenu y logo --}}
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                    </button>
                    <a class="ml-1" href="{{ route('dashboard') }}">
                        <x-application-mark> </x-application-mark>
                    </a>
                </div>
                <h1 class="justify-start hidden text-xl font-semibold text-black sm:flex flotar">Bienvenido a
                    SCHOOLBOOK  {{ Auth::user()->name }}
                </h1>
                {{-- Perfil y cerrar sesion --}}
                <div class="flex items-center">

                    <div class="flex items-center ml-3">

                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">

                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    @if (Auth::user()->profile_photo_path)
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}"
                                        alt="{{ Auth::user()->name }}" />
                                    @else
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @endif
                                </button>

                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 mt-5 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li @class(['bg-amber-300 rounded-lg'=> request()->routeIs('dashboard')])>
                    <a href="{{ route('login') }}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('dashboard'),
                        'bg-amber-300' => request()->routeIs('dashboard')
                        ])
                        >
                        <svg width="32" height="32" fill="none" stroke="#284CDA" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                            </path>
                        </svg>
                        <span class="ml-3">Inicio</span>
                    </a>
                </li>

                @role('docente|alumno')
                <li @class(['bg-amber-300 rounded-lg'=> request()->routeIs('courses.groups')])>
                    <a href="{{route('courses.groups')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('courses.groups'),
                        'bg-amber-300' => request()->routeIs('courses.groups')
                        ])
                        >
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                            fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M10 23c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm8 0c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm-11.241-14c.649 0 1.293-.213 1.692-.436.755-.42 2.695-1.643 3.485-2.124.216-.131.495-.083.654.113l.008.011c.165.204.146.499-.043.68-.622.597-2.443 2.328-3.37 3.213-.522.499-.822 1.183-.853 1.904-.095 2.207-.261 6.912-.331 8.833-.017.45-.387.806-.837.806h-.001c-.444 0-.786-.347-.836-.788-.111-.981-.329-3.28-.426-4.212-.04-.384-.28-.613-.585-.615-.304-.001-.523.226-.549.609-.061.921-.265 3.248-.341 4.22-.034.442-.397.786-.84.786h-.001c-.452 0-.824-.357-.842-.808-.097-2.342-.369-8.964-.369-8.964l-1.287 2.33c-.14.253-.445.364-.715.26h-.001c-.279-.108-.43-.411-.349-.698l1.244-4.393c.122-.43.515-.727.962-.727h4.531zm6.241 7c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm8 0c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm3-1h-14v-2h7v-1h3v1h2v-11h-20v4.356l-2 2v-8.356h24v15zm-7-5h-3v-1h3v1zm-11.626-6c1.241 0 2.25 1.008 2.25 2.25s-1.009 2.25-2.25 2.25c-1.242 0-2.25-1.008-2.25-2.25s1.008-2.25 2.25-2.25zm14.626 4h-6v-1h6v1zm0-2h-6v-1h6v1z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Mis Grupos</span>
                    </a>
                </li>
                @endrole
                @role('admin')
                <div >
                    <li @class(['bg-amber-300 rounded-lg'=> request()->routeIs('subjects.index', 'subjects.create',
                        'subjects.edit', 'subjects.show','subjects.assign-teacher')])>
                        <button type="button"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-amber-300"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                                fill-rule="evenodd" clip-rule="evenodd">
                                <path
                                    d="M22 24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h17v24zm-2-4h-14.505c-1.375 0-1.375 2 0 2h14.505v-2zm0-18h-15v16h15v-16zm-3 3v3h-9v-3h9z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Materias</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        
                    </li>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        {{-- <li >
                            <a href="{{ route('subjects.index') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300 ">Gestión de Materias
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{route('subjects.assign-teacher')}}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300">Asignación de Materias
                            </a>
                        </li> --}}
                        <li class="flex items-center justify-center w-full">
                            <a href="{{ route('subjects.index') }}"
                                class="flex items-center w-full gap-5 p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300 ">
                                <svg fill="#284CDA" sidebar-toggle-item class="w-6 h-6"  viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 13h-4v-1h4v1zm2.318-4.288l3.301 3.299-4.369.989 1.068-4.288zm11.682-5.062l-7.268 7.353-3.401-3.402 7.267-7.352 3.402 3.401zm-6 8.916v.977c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362v-20h14.056l1.977-2h-18.033v24h10.189c3.163 0 9.811-7.223 9.811-9.614v-3.843l-2 2.023z"/></path>
                                </svg>
                                Gestión de Materias
                            </a>
                        </li>
                        <li class="flex items-center justify-center w-full">
                            <a href="{{ route('subjects.assign-teacher') }}"
                                class="flex items-center w-full gap-5 p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300 ">
                                <svg fill="#284CDA" sidebar-toggle-item class="w-6 h-6"  viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.997 18.529c-.372.223-1.044.565-1.997.904v-5.038c-3.979.327-6.323 1.521-7 1.954-.677-.433-3.022-1.627-7-1.954v5.037c-.954-.339-1.625-.681-1.996-.902l-.004-1.944c-.008-2.036.06-2.531 1.863-2.929 2.28-.507 4.616-.775 5.225-2.323.282-.713.117-1.509-.488-2.365-1.588-2.246-2.007-4.36-1.183-5.952.645-1.244 2.018-2.017 3.583-2.017 1.562 0 2.932.766 3.573 1.999.827 1.587.409 3.709-1.175 5.973-.6.857-.762 1.652-.481 2.362.607 1.534 2.929 1.815 5.219 2.323 1.805.398 1.873.898 1.863 2.957l-.002 1.915zm-2.997 2.465c-1.588.287-3.853.925-5.5 1.638v-5.431c1.216-.783 3.666-1.472 5.5-1.707v5.5zm-6.5 1.638c-1.648-.713-3.912-1.351-5.5-1.638v-5.5c1.834.235 4.284.924 5.5 1.707v5.431zm7.851-9.952c-2.865-.632-5.663-.951-4.133-3.134 3.885-5.555.702-9.546-3.218-9.546s-7.12 4.022-3.218 9.546c1.557 2.203-1.328 2.516-4.134 3.134-2.56.566-2.656 1.783-2.648 3.91l.004 2.475s.957.758 2.996 1.431v1.352c.148.022 3.57.457 7 2.131 3.429-1.673 6.866-2.111 7-2.131v-1.352c2.039-.673 2.996-1.431 2.996-1.431l.003-2.451c.01-2.143-.077-3.366-2.648-3.934z"/></path>
                                </svg>
                                Asignacion de Materias
                            </a>
                        </li>

                    </ul>
                </div>
                @endrole

                @role('admin')
                <li @class(['bg-amber-300 rounded-lg'=> request()->routeIs('groups.index', 'groups.create',
                    'groups.edit', 'groups.show')])>
                    <a href="{{route('groups.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('groups.index',
                        'groups.create', 'groups.edit', 'groups.show'),
                        'bg-amber-300' => request()->routeIs('groups.index', 'groups.create', 'groups.edit',
                        'groups.show')
                        ])
                        >
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                            fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M10 23c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm8 0c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm-11.241-14c.649 0 1.293-.213 1.692-.436.755-.42 2.695-1.643 3.485-2.124.216-.131.495-.083.654.113l.008.011c.165.204.146.499-.043.68-.622.597-2.443 2.328-3.37 3.213-.522.499-.822 1.183-.853 1.904-.095 2.207-.261 6.912-.331 8.833-.017.45-.387.806-.837.806h-.001c-.444 0-.786-.347-.836-.788-.111-.981-.329-3.28-.426-4.212-.04-.384-.28-.613-.585-.615-.304-.001-.523.226-.549.609-.061.921-.265 3.248-.341 4.22-.034.442-.397.786-.84.786h-.001c-.452 0-.824-.357-.842-.808-.097-2.342-.369-8.964-.369-8.964l-1.287 2.33c-.14.253-.445.364-.715.26h-.001c-.279-.108-.43-.411-.349-.698l1.244-4.393c.122-.43.515-.727.962-.727h4.531zm6.241 7c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm8 0c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm3-1h-14v-2h7v-1h3v1h2v-11h-20v4.356l-2 2v-8.356h24v15zm-7-5h-3v-1h3v1zm-11.626-6c1.241 0 2.25 1.008 2.25 2.25s-1.009 2.25-2.25 2.25c-1.242 0-2.25-1.008-2.25-2.25s1.008-2.25 2.25-2.25zm14.626 4h-6v-1h6v1zm0-2h-6v-1h6v1z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Grupos</span>
                    </a>
                </li>
                @endrole
              

                @role('alumno|docente')
                <li>
                    <a href="{{ route('profile.show') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-amber-300 dark:hover:bg-gray-700">
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                            fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M24 24h-24v-24h24v24zm-2-22h-20v20h20v-20zm-4.118 14.064c-2.293-.529-4.427-.993-3.394-2.945 3.146-5.942.834-9.119-2.488-9.119-3.388 0-5.643 3.299-2.488 9.119 1.064 1.963-1.15 2.427-3.394 2.945-2.048.473-2.124 1.49-2.118 3.269l.004.667h15.993l.003-.646c.007-1.792-.062-2.815-2.118-3.29z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Mis datos</span>
                    </a>
                </li>
                @endrole
                
                @role('alumno')
                <div>
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-amber-300"
                            aria-controls="dropdown-history" data-collapse-toggle="dropdown-history">
                            <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                                fill-rule="evenodd" clip-rule="evenodd">
                                <path
                                    d="M24 12c0 6.627-5.373 12-12 12s-12-5.373-12-12h2c0 5.514 4.486 10 10 10s10-4.486 10-10-4.486-10-10-10c-2.777 0-5.287 1.141-7.099 2.977l2.061 2.061-6.962 1.354 1.305-7.013 2.179 2.18c2.172-2.196 5.182-3.559 8.516-3.559 6.627 0 12 5.373 12 12zm-13-6v8h7v-2h-5v-6h-2z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Histórico</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <ul id="dropdown-history" class="hidden py-2 space-y-2">
                        <li class="flex items-center justify-center w-full">
                            <a href="{{ route('historial.mostrar') }}"
                                class="flex items-center w-full gap-5 p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300 ">
                                <svg fill="#284CDA" sidebar-toggle-item class="w-6 h-6"  viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="m21 4c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm13.5 10.75c0-.414-.336-.75-.75-.75h-4.5c-.414 0-.75.336-.75.75s.336.75.75.75h4.5c.414 0 .75-.336.75-.75zm-11.772-.537 1.25 1.114c.13.116.293.173.455.173.185 0 .37-.075.504-.222l2.116-2.313c.12-.131.179-.296.179-.459 0-.375-.303-.682-.684-.682-.185 0-.368.074-.504.221l-1.66 1.815-.746-.665c-.131-.116-.293-.173-.455-.173-.379 0-.683.307-.683.682 0 .188.077.374.228.509zm11.772-2.711c0-.414-.336-.75-.75-.75h-4.5c-.414 0-.75.336-.75.75s.336.75.75.75h4.5c.414 0 .75-.336.75-.75zm-11.772-1.613 1.25 1.114c.13.116.293.173.455.173.185 0 .37-.074.504-.221l2.116-2.313c.12-.131.179-.296.179-.46 0-.374-.303-.682-.684-.682-.185 0-.368.074-.504.221l-1.66 1.815-.746-.664c-.131-.116-.293-.173-.455-.173-.379 0-.683.306-.683.682 0 .187.077.374.228.509zm11.772-1.639c0-.414-.336-.75-.75-.75h-4.5c-.414 0-.75.336-.75.75s.336.75.75.75h4.5c.414 0 .75-.336.75-.75z"/></path>
                                </svg>
                                Avence Reticular
                            </a>
                        </li>
                       
                            <li class="flex items-center justify-center w-full">
                                <a href="{{route('subjects.assign-teacher')}}"
                                    class="flex items-center w-full gap-5 p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-amber-300">
                                    <svg fill="#284CDA" sidebar-toggle-item class="w-6 h-6"  viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 0v14.386c0 2.391-6.648 9.614-9.811 9.614h-10.189v-24h20zm-10.638 22c4.156 0 2.638-6 2.638-6s6 1.65 6-2.457v-11.543h-16v20h7.362zm.638-4v1h-5v-1h5zm-5-2h5v1h-5v-1zm0-2h10v1h-10v-1zm0-2h10v1h-10v-1zm3.691-3.174l-2.055.001-.39 1.172-1.246.001 2.113-5.689 1.086-.001 2.133 5.686-1.246.001-.395-1.171zm4.373-2.015l1.41-.001.001 1.019-1.41.001.001 1.594-1.074.001-.001-1.594-1.414.001-.001-1.019 1.414-.001-.001-1.528h1.074l.001 1.527zm-6.112 1.067l1.422-.001-.717-2.129-.705 2.13z"/></path>
                                </svg>
                                    Boletas de Calificaciones
                                </a>
                            </li>
                     
                    </ul>
                </div>
                @endrole
                
                @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('students.index', 'students.create', 'students.edit', 'students.show')])>
                    <a href="{{route('students.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('teachers.index',
                        'teachers.create', 'teachers.edit', 'teachers.show'),
                        'bg-amber-300' => request()->routeIs('students.index', 'students.create', 'students.edit',
                        'students.show')
                        ])
                        >
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                            fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                            <path
                                d="M24 21h-3l1-3h1l1 3zm-12.976-4.543l8.976-4.575v6.118c-1.007 2.041-5.607 3-8.5 3-3.175 0-7.389-.994-8.5-3v-6.614l8.024 5.071zm11.976.543h-1v-7.26l-10.923 5.568-11.077-7 12-5.308 11 6.231v7.769z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Alumnos</span>
                    </a>
                </li>
                @endrole
                
                @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('teachers.index', 'teachers.create', 'teachers.edit', 'teachers.show')])>
                    <a href="{{route('teachers.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('teachers.index',
                        'teachers.create', 'teachers.edit', 'teachers.show'),
                        'bg-amber-300' => request()->routeIs('teachers.index', 'teachers.create', 'teachers.edit',
                        'teachers.show')
                        ])
                        >
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                            fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                            <path
                                d="M12.5 17.52c1.415-1.054 3.624-1.846 5.5-2v6.479c-1.739.263-3.755 1.104-5.5 2v-6.479zm-1 0c-1.415-1.054-3.624-1.846-5.5-2v6.479c1.739.263 3.755 1.104 5.5 2v-6.479zm-6.5 2.917c-2.049-.674-2.996-1.437-2.996-1.437l-.004-2.025c-.008-2.127.088-3.344 2.648-3.909 2.805-.619 5.799-1.317 4.241-3.521-3.901-5.523-.809-9.545 3.111-9.545 3.921 0 6.996 3.991 3.11 9.545-1.529 2.185 1.376 2.888 4.242 3.521 2.57.568 2.657 1.791 2.647 3.934l-.003 2s-.947.763-2.996 1.437v-6.003l-1.082.089c-2.054.169-4.36 1.002-5.918 2.128-1.559-1.126-3.863-1.959-5.918-2.128l-1.082-.089v6.003z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Docentes</span>
                    </a>
                </li>
                @endrole
                
                @role('admin')
                 <li>
                    <a href="{{route('user.index')}}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-amber-300 dark:hover:bg-gray-700">
                        <svg stroke="#284CDA" width="32" height="32" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Usuarios</span>
                    </a>
                </li>
                @endrole
               
                @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('contributions.index', 'contributions.create', 'contributions.edit', 'contributions.show')])>
                    <a href="{{route('contributions.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('schoolCycles.index'),
                        'bg-amber-300' => request()->routeIs('contributions.index', 'contributions.create',
                        'contributions.edit', 'contributions.show')
                        ])
                        >
                        <svg fill="#284CDA" width="32" height="32" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path
                                d="M20.667 13.984c1.782 0 3.333-.671 3.333-1.5s-1.552-1.5-3.333-1.5c-1.781 0-3.333.671-3.333 1.5s1.551 1.5 3.333 1.5zm.062-1.339c-.199-.06-.81-.111-.81-.45 0-.189.223-.358.639-.396v-.148h.214v.141c.156.004.33.021.523.06l-.078.229c-.147-.034-.311-.066-.472-.066l-.048.001c-.321.013-.347.191-.125.267.364.112.844.195.844.493 0 .238-.289.366-.645.397v.146h-.214v-.139c-.22-.002-.451-.038-.642-.102l.098-.229c.163.042.367.084.552.084l.139-.01c.247-.034.296-.2.025-.278zm-.062 5.339c1.261 0 2.57-.323 3.333-.934v.434c0 .829-1.552 1.516-3.333 1.516-1.781 0-3.333-.687-3.333-1.516v-.434c.763.612 2.071.934 3.333.934zm0-3.333c1.261 0 2.57-.323 3.333-.934v.434c0 .829-1.552 1.5-3.333 1.5-1.781 0-3.333-.671-3.333-1.5v-.434c.763.611 2.071.934 3.333.934zm0 1.667c1.261 0 2.57-.323 3.333-.935v.435c0 .828-1.552 1.5-3.333 1.5-1.781 0-3.333-.672-3.333-1.5v-.435c.763.612 2.071.935 3.333.935zm-8.441-3.089c0 .601-.47.922-1.05 1.002v.369h-.351v-.35c-.362-.006-.737-.092-1.05-.254l.16-.575c.334.129.78.267 1.128.189.402-.091.485-.505.041-.705-.326-.15-1.323-.281-1.323-1.134 0-.477.363-.904 1.044-.998v-.373h.351v.356c.253.006.538.051.855.147l-.127.576c-.269-.094-.566-.18-.855-.162-.521.031-.567.482-.204.671.599.282 1.381.491 1.381 1.241zm5.774-7.229h-17v10h-1v-11h18v1zm-16 1v11h14v-5.516c0-1.792 1.985-2.71 4-2.875v-2.609h-18zm9 9c-1.933 0-3.5-1.567-3.5-3.5s1.567-3.5 3.5-3.5 3.5 1.567 3.5 3.5-1.567 3.5-3.5 3.5z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Aportaciones</span>
                    </a>
                </li>
                @endrole
                
                @role('admin')
                 <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('schoolCycles.index')])>
                    <a href="{{route('schoolCycles.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('schoolCycles.index'),
                        'bg-amber-300' => request()->routeIs('schoolCycles.index')
                        ])
                        >
                        <svg stroke="#284CDA" width="32" height="32" fill="#FFFFFF" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Ciclos escolares</span>
                    </a>
                </li>
                @endrole
               
                @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('classroom.index')])>
                    <a href="{{route('classroom.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('classroom.index'),
                        'bg-amber-300' => request()->routeIs('classroom.index')
                        ])
                        >
                        <svg stroke="#284CDA" width="32" height="32" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Aulas</span>
                    </a>
                </li>
                @endrole
                
                @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('courses.index', 'courses.create', 'courses.edit', 'courses.show')])>
                    <a href="{{route('courses.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('classroom.index'),
                        'bg-amber-300' => request()->routeIs('courses.index', 'courses.create', 'courses.edit',
                        'courses.show')
                        ])
                        >
                        <svg stroke="#284CDA" width="32" height="32" fill="none" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Cursos</span>
                    </a>
                </li>
                @endrole
                 @role('admin')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('schedule.index', 'schedule.create', 'schedule.edit', 'schedule.show')])>
                    <a href="{{route('schedule.index')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('schedule.index'),
                        'bg-amber-300' => request()->routeIs('schedule.index', 'schedule.create', 'schedule.edit',
                        'schedule.show')
                        ])
                        >
                        <svg fill="#284CDA" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Horarios</span>
                    </a>
                </li>
                @endrole
                @role('alumno')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('schedule.student')])>
                    <a href="{{route('schedule.student')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('schedule.index'),
                        'bg-amber-300' => request()->routeIs('schedule.student')
                        ])
                        >
                        <svg fill="#284CDA" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Horario</span>
                    </a>
                </li>
                @endrole
                @role('docente')
                <li @class(['bg-amber-300 rounded-lg' => request()->routeIs('schedule.teacher')])>
                    <a href="{{route('schedule.teacher')}}"
                        @class([ 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white'=>
                        true,
                        'hover:bg-amber-300 dark:hover:bg-gray-700' => !request()->routeIs('schedule.teacher'),
                        'bg-amber-300' => request()->routeIs('schedule.teacher')
                        ])
                        >
                        <svg fill="#284CDA" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Horario</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
    </aside>
</div>