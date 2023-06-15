<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banking Accounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                <a>Banking Accounts</a>
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <form method="POST" action="{{ route('accounts.create') }}">
                                    @csrf
                                    <!-- Input -->
                                    <div class="flex flex-row">
                                        <div class="w-full p-8">
                                            <div>
                                                <label class="block font-medium text-md text-gray-700" for="input_text">
                                                    Create a new Banking Account
                                                </label>
                                                <div class="mt-6 relative">
                                                    <textarea name="input_text" class="p-6 w-full border-gray-200 text-md focus:outline-none focus:ring-black shadow-sm mt-1 block" id="input_text" rows="4" maxlength="50" placeholder="What is the Banking Account name?"></textarea>
                                                    <p id="char_count" class="text-sm text-black mt-2 bottom-0 left-0" style="color: black;">0/50 Characters</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 mb-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if ($accounts->isEmpty())
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-8">
                                <p class="font-thin">No accounts created yet.</p>
                            </div>
                        @else
                            @foreach ($accounts as $account)
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-8">
                                <div class="flex items-center justify-between">
                                            <a href="{{ route('accounts.show', ['id' => $account->id]) }}">
                                                <p class="font-thin">{{ $account->title }}</p>
                                            </a>
                                            <form action="{{ route('accounts.destroy', $account->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="relative inline-flex items-center">
                                                    <button type="button" class="text-red-600 mt-2 delete-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                    <div class="top-0 right-0 hidden password-input ml-4">
                                                        <input type="password" required name="password" placeholder="Enter password" class="p-2 border border-gray-300 mt-2" />
                                                        <button type="submit" class="px-3 py-2 bg-red-600 text-white mt-2">Confirm</button>
                                                    </div>
                                                </div>
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
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach((button) => {
            button.addEventListener('click', function() {
                const parentDiv = button.parentElement;
                const passwordInput = parentDiv.querySelector('.password-input');
                passwordInput.classList.toggle('hidden');
            });
        });

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