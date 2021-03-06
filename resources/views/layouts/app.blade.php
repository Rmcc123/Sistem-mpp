<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Municipalidad Provincial de Puno') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body x-data="sidebar()" class="text-gray-900 bg-gray-200" @resize.window="handleResize()">
        <div class="min-h-screen lg:flex">
                <div x-show="isOpen()" class="inset-0 flex overflow-auto bg-blue-800 bg-opacity-75 position lg:static">
                    
                    <div @click.away="handleAway()" class="static w-56 h-full text-white bg-gray-800 shadow">
                        <div class="flex content-between bg-gray-700">
                            <img src="../img/Escudo_de_Puno_mini.png" alt="ESCUDO DE PUNO" class="p-1 w-14" > 
                            <div class="w-full p-1 text-sm ">Municipalidad Provincial de Puno</div>
                            <a	@click.prevent="handleClose()" class="flex items-center flex-1 p-3 hover:bg-indigo-500"	href="#">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"	fill="none"	viewBox="0 0 24 24" 	stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </a>
                        </div>
                        <a	class="flex items-center w-full p-3 hover:bg-indigo-500" href="{{route('dashboard')}}" >
                            <i class="fas fa-home"></i><p class="pl-1 text-sm"> Inicio</p>
                        </a>
                        <a 	class="flex items-center w-full p-3 hover:bg-indigo-500" href="{{route('personas')}}">
                            <i class="fas fa-users"></i><p class="pl-1 text-sm"> Personas</p>
                        </a>
                        <a class="flex items-center w-full p-3 hover:bg-indigo-500"	href="#" >
                            <i class="fas fa-people-carry"></i><p class="pl-1 text-sm">Fiscalizacion</p>
                        </a>
                        <a class="flex items-center w-full p-3 hover:bg-indigo-500" href="#" >
                            <i class="fas fa-store"></i></i><p class="pl-1 text-sm">Mercados de Abastos</p>
                        </a>
                        <a class="flex items-center w-full p-3 hover:bg-indigo-500" href="#" >
                            <i class="fas fa-user-tag"></i><p class="pl-1 text-sm">Comercio Ambulatorio </p>
                        </a>
                        <a class="flex items-center w-full p-3 hover:bg-indigo-500" href="{{route('users.index')}}" >
                            <i class="fas fa-user-lock"></i><p class="pl-1 text-sm">Usuarios MPP </p>
                        </a>
                    </div>
                </div> 

                <div class="flex-auto">
                        <div class="flex text-gray-700 bg-white">   
                        @livewire('navigation-menu')
                        </div>
                            <!-- Page Content -->
                    
                        <main class="grid gap-4 p-1 md:grid-cols-2 lg:grid-cols-1">
                            <div class="shadow-lg">
                                {{ $slot }}
                            </div>
                            
                        </main>
                </div>

                @stack('modals')

                @livewireScripts
        </div>
        <script>
			function sidebar() {
				const breakpoint = 1280
				return {
					open: {
						above: true,
						below: false,
					},
					isAboveBreakpoint: window.innerWidth > breakpoint,

					handleResize() {
						this.isAboveBreakpoint = window.innerWidth > breakpoint
					},

					isOpen() {
						console.log(this.isAboveBreakpoint)
						if (this.isAboveBreakpoint) {
							return this.open.above
						}
						return this.open.below
					},
					handleOpen() {
						if (this.isAboveBreakpoint) {
							this.open.above = true
						}
						this.open.below = true
					},
					handleClose() {
						if (this.isAboveBreakpoint) {
							this.open.above = false
						}
						this.open.below = false
					},
					handleAway() {
						if (!this.isAboveBreakpoint) {
							this.open.below = false
						}
					},
				}
			}
		</script>
     </body>
</html>
