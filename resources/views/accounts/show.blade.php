<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $accountTitle }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <a href="{{ route('accounts.index') }}" style="margin-right: 1.5rem; margin-left: 1rem">
                        Return
                    </a>

                    <a href="{{ route('transactions.index', ['id' => $account->id]) }}" style="margin-right: 1.5rem">
                        Add Transaction
                    </a>

                    <a href="{{ route('categories.index', ['account_id' => $account->id]) }}" style="margin-right: 1.5rem">
                        Add Category
                    </a>

                    <a href="{{ route('accounts.edit', ['id' => $account->id]) }}">
                        Edit Account
                    </a>
                </div>

                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                {{ $accountTitle }}
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <p class="font-thin">Account Balance</p>
                                <h1 class="text-2xl">
                                    $1,454
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                Transactions
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <p class="font-thin">Account Balance</p>
                                <h1 class="text-2xl">
                                    $1,454
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
