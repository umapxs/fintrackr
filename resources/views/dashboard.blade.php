<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <x-application-logo class="block h-12 w-auto" />

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        FinTrackr is a lightweight personal finance management app for tracking debits, credits, and expenses with visually pleasing dynamic charts.
                    </p>
                </div>

                <div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
                    <div>
                        <div class="flex items-center mb-4">

                            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                                <a>Dashboard</a>
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <p class="font-thin">Total Accounts</p>
                                <h1 class="text-2xl mt-2 font-black">
                                    {{ $totalAccounts }}
                                </h1>
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <p class="font-thin">Overall Balance</p>
                                <h1 class="text-2xl">
                                    $1,454
                                </h1>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-8">
                            <p class="font-thin">Analytics</p>
                            <h1 class="text-2xl">
                                Placeholder (Pie Chart)
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
