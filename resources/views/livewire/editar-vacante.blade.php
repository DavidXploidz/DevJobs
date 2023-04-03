<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <!-- Titulo vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')"/>
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo de la vacante"/>
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Salario mensual -->
    <div>
        <x-input-label for="salario" :value="__('Salario')"/>
        <select wire:model="salario" id="salario" class="block text-sm text-gray-200 bg-gray-900 uppercase font-bold my-2 w-full">
            <option value="">-- Seleccione un salario --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Categoria -->
    <div>
        <x-input-label for="categoria" :value="__('Categoria')"/>
        <select wire:model="categoria" id="categoria" class="block text-sm text-gray-200 bg-gray-900 uppercase font-bold my-2 w-full">
            <option value="">-- Seleccione una categoria --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')"/>
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('titulo')" placeholder="Empresa ej: Uber, Netflix Etc"/>
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Ultimo Dia -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')"/>
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Descripcion-->
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Puesto')"/>
        <textarea class="block text-sm text-gray-200 bg-gray-900 uppercase font-bold my-2 w-full h-44" wire:model="descripcion" id="descripcion" placeholder="Descripcion general del puesto"></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')"/>
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />

        <div class="my-5 w-40">
            <x-input-label :value="__('Imagen Actual')"/>
            <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen Vacante '.$titulo}}">
        </div>
        <div class="my-5 w-40">
            @if($imagen_nueva)
                <x-input-label :value="__('Nueva Imagen')"/>
                <img src="{{$imagen_nueva->temporaryUrl()}}" alt="Imagen previa">
            @endif
        </div>
        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        {{ __('Guardar Cambios') }}
    </x-primary-button>
</form>