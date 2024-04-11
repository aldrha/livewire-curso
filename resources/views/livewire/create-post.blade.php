<div>
    <x-danger-button wire:click="$set('isOpen', true)">
        Crear nuevo post
    </x-danger-button>

    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" wire:model.blur="title" />
                <x-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-label value="Contenido del post" />
                <textarea class="form-control w-full" wire:model.blur="content" rows="6"></textarea>
                <x-input-error for="content" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isOpen', false)">
                Cancelar
            </x-secondary-button>
            <x-button class="ml-3" wire:click="save">
                Crear Post
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
