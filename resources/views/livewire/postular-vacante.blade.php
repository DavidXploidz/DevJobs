<div class="bg-gray-700 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4 text-gray-100">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <p class="uppercase rounded-lg border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-4">
            {{session('mensaje')}}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme' >
            <div class="mb-4">
                <x-input-label for="cv" :value="__('cv')"/>
                <x-text-input id="cv" class="block mt-1 w-full" type="file" accept=".pdf" wire:model="cv"/>
            </div>
            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror
            <x-primary-button class="my-5">
                {{__('Postularme')}}
            </x-primary-button>
        </form>
    @endif
    
</div>
