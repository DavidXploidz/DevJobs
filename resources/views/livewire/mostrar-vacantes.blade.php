<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

    @foreach ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="leading-10">
                <a href="#" class="text-xl font-bold">{{$vacante->titulo}}</a>
                <p class="text-sm font-bold ">{{$vacante->empresa}}</p>
                <p class="text-sm text-gray-100">Ultimo dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
        </div>
        
    @endforeach
</div>