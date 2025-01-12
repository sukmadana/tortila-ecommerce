@props(['product'])

@if (!empty($product))
<div class="p-5">
    <div class="relative w-full mb-5">
        <div class="relative w-full">
            <a href="{{route('product.single', $product->id)}}">
                <img src="{{ asset('storage/'. $product->gambar )}}" alt="" class="w-full">
            </a>
        </div>
    </div>
    <div class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">
        <a href="{{route('product.single', $product->id)}}">
            {{ $product->nama_produk }}
        </a>
    </div>
    <div class="text-base mb-8 text-gray-500 dark:text-gray-400">
        {{ $product->spesifikasi}}
    </div>
    <div class="text-xl font-bold text-amber-500 dark:text-amber-500">
        Rp. {{ number_format($product->harga, 0, ',', '.') }}
    </div>
</div>
@endif
