<div>
    <x-danger-button wire:click="$set('isOpen', true)">
        Crear nuevo post
    </x-danger-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full"
                role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            <div class="mb-4">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                @endif
            </div>
            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" wire:model="title" />
                {{-- wire:model.blur="title" --}}
                <x-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-label value="Contenido del post" />
                <textarea class="form-control w-full" wire:model="content" rows="6"></textarea>
                <x-input-error for="content" />
            </div>
            <div class="mb-4">
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-input-error for="image" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isOpen', false)">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-3 disabled:opacity-25" wire:click="save" wire:loading.attr="disabled"
                wire:target="save, image">
                Crear Post
            </x-button>

            {{-- <span wire:loading wire:target="save">Cargando ...</span> --}}
        </x-slot>
    </x-dialog-modal>
</div>
