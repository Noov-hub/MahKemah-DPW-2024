<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #737373">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            
            <a href="/home" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Lanjutkan ke Home</a>
        </div>
    </div>
</x-app-layout>
