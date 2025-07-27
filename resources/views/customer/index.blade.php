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
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div role="alert" class="alert alert-success mb-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

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
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        {{ $customer->nama_customer ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        {{ $customer->alamat ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        {{ $customer->telp ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        {{ $customer->fax ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        {{ $customer->email ?? '-' }}
                                    </td>
                                    <td class="px-2 py-4 border-b border-neutral-200">
                                        <div class="flex gap-2">
                                            <x-heroicon-s-eye class="size-6" />
                                            <x-heroicon-s-pencil class="size-6" />
                                            <x-heroicon-s-trash class="size-6 cursor-pointer"
                                                @click="selectedCustomer = {{ $customer }}; deleteModal = true" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <dialog x-show="deleteModal" class="modal" x-cloak>
                        <div class="modal-box w-11/12 max-w-5xl">
                            <h3 class="text-lg font-bold">Hapus Customer</h3>
                            <p class="py-4">Apakah kamu yakin ingin menghapus data <span
                                    x-text="selectedCustomer.nama_customer" class="font-semibold"></span>?</p>
                            <div class="modal-action">
                                <form :action="`/customers/${selectedCustomer.id}`" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-ghost"
                                        @click="deleteModal = false">Batal</button>
                                    <button type="submit" class="btn btn-error">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </dialog>

                    <div class="mt-10">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
