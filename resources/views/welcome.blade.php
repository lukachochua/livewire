<x-navbar />

<body>
    <div class="my-8">
        <h2 class="text-lg font-semibold mt-4">Events Example</h2>

        <div class="mt-4">
           <div 
                class="border border-black w-1/2 px-4 py-2"
                x-data
                x-init="
                    new Taggle($el, {
                        tags: ['these', 'are', 'prefilled', 'tags'],
                        onTagAdd: function(e, tag) {
                            {{-- alert('You just added ' + tag + '');  --}}
                        },
                        onTagRemove: function(e, tag) {
                            {{-- alert('You just removed ' + tag + '');  --}}
                        }                         

                    })
                "    
            >
                
           </div>
        </div>
    </div>
    {{-- <livewire:poll-example /> --}}
</body>
   

