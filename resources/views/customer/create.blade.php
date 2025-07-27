<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('customer.store') }}" method="post" class="p-8">
                    @csrf
                    <h1 class="text-lg font-semibold mb-6">Tambah Customer</h1>

                    <div class="flex flex-col gap-2">
                        <div class="">
                            <label for="nama">Nama Customer</label>
                            <x-text-input id="nama" class="block mt-1 w-full h-10 border border-neutral-200 px-4"
                                type="nama" name="nama_customer" required />
                        </div>
                        <div class="">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat"
                                class="border-neutral-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full h-10 border px-4"
                                type="alamat" name="alamat"></textarea>
                        </div>
                        <div class="">
                            <label for="telp">No Telepon</label>
                            <x-text-input id="telp" class="block mt-1 w-full h-10 border border-neutral-200 px-4"
                                type="text" name="telp" />
                        </div>
                        <div class="">
                            <label for="fax">Fax</label>
                            <x-text-input id="fax" class="block mt-1 w-full h-10 border border-neutral-200 px-4"
                                type="type" name="fax" />
                        </div>
                        <div class="">
                            <label for="email">Email</label>
                            <x-text-input id="email" class="block mt-1 w-full h-10 border border-neutral-200 px-4"
                                type="email" name="email" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
