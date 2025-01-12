<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Checkout') }}
        </h1>
    </x-slot>

    <div class="py-20">
        <div class="container lg:max-w-[1100px]">
            <form action="{{route('order')}}" method="post">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-1">
                        <div class="mb-10 space-y-5">
                            <div class="text-2xl text-gray-900 dark:text-gray-100">
                                Profile
                            </div>
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <x-input-label for="jk" value="Jenis Kelamin" />
                                    <select name="jenis_kelamin" id="jk" class="w-full bg-transparent border rounded dark:text-gray-100">
                                        <option value="laki">Laki Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
                                </div>
                                <div>
                                    <x-input-label for="telp" value="Telepon" />
                                    <x-text-input name="no_telepon" id="telp" type="text" class="w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('no_telepon')" />
                                </div>
                            </div>
                            <div>
                                <x-input-label for="alamat" value="Alamat" />
                                <x-text-input name="alamat" id="alamat" type="text" class="w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                            </div>
                        </div>

                        <div class="mb-10 space-y-5">
                            <div class="text-2xl text-gray-900 dark:text-gray-100">
                                Pengiriman
                            </div>
                            <div>
                                <x-input-label for="alamat_pengiriman" value="Alamat Pengiriman" />
                                <x-text-input name="alamat_pengiriman" id="alamat_pengiriman" type="text" class="w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat_pengiriman')" />
                            </div>
                            <div>
                                <x-input-label for="metode" value="Metode Pengiriman" />
                                <select name="metode_pengiriman" id="metode" class="w-full bg-transparent border rounded dark:text-gray-100">
                                    <option value="jnt">JNT Reguler</option>
                                    <option value="cargo">Cargo</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('metode_pengiriman')" />
                            </div>
                        </div>

                        <div class="mb-10 space-y-5">
                            <div class="text-2xl text-gray-900 dark:text-gray-100">
                                Pembayaran
                            </div>
                            <div>
                                <x-input-label for="metode_pembayaran" value="Metode Pembayaran" />
                                <select name="metode_pembayaran" id="metode_pembayaran" class="w-full bg-transparent border rounded dark:text-gray-100">
                                    <option value="cod">COD ( Cash on Delivery )</option>
                                    <option value="transfer">Transfer Bank</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('metode_pembayaran')" />
                            </div>
                        </div>
                        <div class="flex flex-row justify-end">
                            <button type="submit" class="px-8 py-4 border border-amber-500 font-bold bg-amber-500 hover:bg-amber-800 w-full text-center text-white inline-block"> Pesan </button>
                        </div>
                    </div>
                    <div class="col-span-1 border p-3">
                        @php
                            $carts = Cart::getContent();
                        @endphp
                        <div class="mb-8">
                            @foreach ($carts as $item)
                                <x-cart-item :item="$item" />
                            @endforeach
                        </div>
                        <div class="flex justify-end gap-5 items-center flex-row">
                            <div class="text-xl text-gray-900 dark:text-gray-100">
                                Total
                            </div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                Rp. {{ number_format(Cart::getTotal(), 0, ',', '.') }} <span class="text-red-400">*</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block mt-4 text-base text-gray-600 text-right ml-auto">
                                {{__('*) Harga belum termasuk biaya pengiriman.')}}
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
