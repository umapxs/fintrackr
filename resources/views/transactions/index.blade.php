<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Transaction
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                Add Transaction
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <form method="POST" action="{{ route('transactions.create', ['id' => $account->id]) }}">
                                    @csrf
                                    @method('POST')
                                    <!-- Input -->
                                    <div class="flex flex-row">
                                        <div class="w-full p-8">
                                            <div>
                                                <label class="block font-medium text-md text-gray-700" for="input_text">
                                                    Category
                                                </label>
                                                <div class="mt-6 relative">
                                                    <select name="category_id" class="p-6 w-full border-gray-200 text-md focus:outline-none focus:ring-black shadow-sm mt-1 block">
                                                        <option value="">Select a category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block font-medium text-md text-gray-700 mt-8" for="transaction_value">
                                                    Transaction Value
                                                </label>
                                                <div class="mt-6 flex items-center">
                                                    <input type="number" name="transaction_value" id="transaction_value" step="any" placeholder="Enter a number" class="p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">

                                                    <button type="button" onclick="makePositive()" class="ml-2 px-4 py-2 bg-gray-800 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none">+</button>
                                                    <button type="button" onclick="makeNegative()" class="ml-2 px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none">-</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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


        function makePositive() {
            var transactionValueInput = document.getElementById('transaction_value');
            var currentValue = parseFloat(transactionValueInput.value);

            if (currentValue < 0) {
                transactionValueInput.value = Math.abs(currentValue);
            }

            // Submit the form
            transactionValueInput.form.submit();
        }

        function makeNegative() {
            var transactionValueInput = document.getElementById('transaction_value');
            var currentValue = parseFloat(transactionValueInput.value);

            if (currentValue > 0) {
                transactionValueInput.value = -Math.abs(currentValue);
            }

            // Submit the form
            transactionValueInput.form.submit();
        }
    </script>

</x-app-layout>
