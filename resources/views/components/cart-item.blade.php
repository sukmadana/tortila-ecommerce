@props(['item'])

@if (!empty($item))
<div class="cart-item p-5 border dark:border-gray-300 mb-10">
    <div class="grid grid-cols-4 gap-8">
        <div class="col-span-1">
            @if ($item->attributes->has('gambar'))
                <img src="{{ asset('storage/' . $item->attributes['gambar']) }}" alt="" class="w-full">
            @endif
        </div>
        <div class="col-span-3">
            <div class="text-2xl mb-2 text-gray-900 dark:text-gray-100">
                {{ $item->name }}
            </div>
            @if ($item->attributes->has('spesifikasi'))
                <div class="text-base text-gray-600 dark:text-gray-300">
                    {{ $item->attributes->spesifikasi }}
                </div>
            @endif
            <div class="flex flex-row gap-5 mt-16 justify-between text-gray-900 dark:text-gray-100">
                <div class="text-lg font-bold">
                    Rp. {{ number_format($item->price, 0, ',', '.') }}
                </div>
                <div class="text-2xl font-bold flex flex-row gap-10">
                    <div class="">
                        x{{$item->quantity}}
                    </div>
                    <div class="">
                        Rp. {{ number_format($item->getPriceSum(), 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
