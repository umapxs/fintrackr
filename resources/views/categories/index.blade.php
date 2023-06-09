<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                Add Category
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <form method="POST" action="{{ route('categories.create') }}">
                                    @csrf
                                    @method('POST')
                                        <!-- Input -->
                                        <div class="flex flex-row">
                                            <div class="w-full p-8">
                                                <div>
                                                    <label class="block font-medium text-md text-gray-700" for="input_text">
                                                        Category Name
                                                    </label>
                                                    <div class="mt-6 relative">
                                                        <textarea name="category_name" value="" class="p-6 w-full border-gray-200 text-md focus:outline-none focus:ring-black shadow-sm mt-1 block" id="input_text" rows="4" maxlength="50" placeholder="What is the Category name?"></textarea>
                                                            <p id="char_count" class="text-sm text-black mt-2 bottom-0 left-0" style="color: black;">0/50 Characters</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">

                                        <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('ktTV58Y40TMRKelpGBgr').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms="" style="display: none;" class="text-sm text-gray-600 mr-3">
                                            Saved.
                                        </div>

                                        <button type="submit" class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if ($categories->isEmpty())
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-8">
                                <p class="font-thin">No categories created yet.</p>
                            </div>
                        @else
                            @foreach ($categories as $category)
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-8">
                                    <div class="flex items-center justify-between">
                                        <p class="font-thin">{{ $category->title }}</p>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const textarea = document.getElementById('input_text');
        const charCount = document.getElementById('char_count');

        textarea.addEventListener('input', function() {
            const text = textarea.value;
            const remainingChars = 50 - text.length;

            charCount.textContent = `${text.length}/50 Characters`;

            if (remainingChars <= 25) {
                charCount.style.color = 'red';
            } else {
                charCount.style.color = 'black';
            }
        });

        // Trigger the input event on page load to update the character count
        textarea.dispatchEvent(new Event('input'));
    </script>

</x-app-layout>
