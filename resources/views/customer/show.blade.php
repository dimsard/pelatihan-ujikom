<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer') }}
            </h2>
            <div class="flex justify-end">
                <a href="{{ route('customer.create') }}" type="button" class="btn btn-primary">
                    Add Customer
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $customer->nama_customer }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
