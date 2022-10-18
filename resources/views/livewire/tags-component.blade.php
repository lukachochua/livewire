<div class="my-8">
    <h2 class="text-lg font-semibold mt-4">Events Example</h2>

    <div class="mt-4">
        <div 
            class="border border-black w-1/2 px-4 py-2"
            wire:ignore
            x-data
            x-init="
                new Taggle($el, {
                    tags: {{ $tags }},
                    onTagAdd: function(e, tag) {
                        Livewire.emit('tagAdded', tag);
                    },
                    onTagRemove: function(e, tag) {
                        Livewire.emit('tagRemoved', tag);
                    }                         

                })

                Livewire.on('tagAddedFromBackend', tag => {
                    alert('a tag was added ' + tag);
                })
            "    
        >
        </div>
    </div>
</div>