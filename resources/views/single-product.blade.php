<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ $product->nama_produk}}
        </h2>
    </x-slot>

    <div class="py-20 mb-20">
        <div class="container lg:max-w-[1100px]">
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    <h2 class="text-3xl font-bold text-amber-500 dark:text-amber-100 mb-5">
                        {{$product->nama_produk}}
                    </h2>
                    <div class="text-base text-gray-800 dark:text-gray-300 tracking-wider mb-2">
                        {{$product->kategori}}
                    </div>
                    <div class="text-base text-amber-500 tracking-wider leading-relaxed mb-10">
                        <span class="font-bold">Spesifikasi : </span> <span>{{$product->spesifikasi}}</span>
                    </div>
                    <div class="text-base text-gray-900 dark:text-gray-100">
                        {{$product->deskripsi}}
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="relative mb-10">
                        <img src="{{asset('storage/'. $product->gambar)}}" alt="{{$product->nama_produk}}">
                    </div>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="flex justify-start items-start gap-5">
                            <div class="flex flex-col gap-2">
                                <x-input-label for="qty" :value="__('Quantity')" />
                                <x-text-input name="quantity" type="number" id="qty" min="0" value="1" />
                            </div>
                            <button type="submit" class="py-3 px-8 rounded bg-amber-500 text-white font-bold text-center tracking-wide" >Tambah Keranjang</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($related))
        <div class="py-24">
            <div class="container xl:max-w-[1100px]">
                <div class="text-left font-bold text-[35px] leading-9 mb-14 text-gray-900 dark:text-gray-100">
                    Produk Terlaris
                </div>
                <div class="grid grid-cols-3 gap-5">
                    @foreach ($related as $product)
                        <x-product-item :product="$product"></x-product-item>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>
