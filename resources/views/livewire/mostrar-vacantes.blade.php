<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">{{$vacante->titulo}}</a>
                    <p class="text-sm font-bold ">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-100">Ultimo dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 mt-5 md:mt-0 items-center">
                    <a href="{{ route('candidatos.index', $vacante) }}" class="bg-gray-300 px-4 py-2 rounded-lg text-slate-800 text-xs font-bold uppercase text-center w-full ">
                        {{ $vacante->candidatos->count() }} Candidatos
                    </a>
                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-blue-300 px-4 py-2 rounded-lg text-slate-800 text-xs font-bold uppercase text-center w-full ">
                        Editar
                    </a>
                    <button wire:click="$emit('mostrarAlerta', {{$vacante->id}})" class="bg-red-600 px-4 py-2 rounded-lg text-slate-800 text-xs font-bold uppercase text-center w-full ">
                        Eliminar
                    </button>
                </div>
            </div>
            @empty
            <p class="p-3 text-center text-sm text-gray-200 ">No hay vacantes</p>
        @endforelse
    </div>
    
    <div class="mt-10">
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            // El siguiente código es el Alert utilizado
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, !Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar la vacante
                    Livewire.emit('eliminarVacante', vacanteId)
                    Swal.fire(
                        'Se elimino la vacante!',
                        'Eliminado correctamente.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush