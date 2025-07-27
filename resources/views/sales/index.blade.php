<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer') }}
            </h2>
            <div class="flex justify-end">
                <button type="button" class="btn btn-primary">
                    Add Customer
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-auto table- text-left">
                        <thead>
                            <tr>
                                <th class="bg-neutral-200 p-2">Nama</th>
                                <th class="bg-neutral-200 p-2">Alamat</th>
                                <th class="bg-neutral-200 p-2">No Telepon</th>
                                <th class="bg-neutral-200 p-2">Fax</th>
                                <th class="bg-neutral-200 p-2">Email</th>
                                <th class="bg-neutral-200 p-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-10">
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
