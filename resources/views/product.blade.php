<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Highlighting premium, high-quality tortillas.') }}
        </h2>
    </x-slot>

    @if (!empty($terlaris))
        <div class="py-24">
            <div class="container xl:max-w-[1100px]">
                <div class="text-left font-bold text-[35px] leading-9 mb-14 text-gray-900 dark:text-gray-100">
                    Produk Terlaris
                </div>
                <div class="grid grid-cols-3 gap-5">
                    @foreach ($terlaris as $product)
                        <x-product-item :product="$product"></x-product-item>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (!empty($products))
        <div class="py-32 bg-slate-200 dark:bg-slate-800">
            <div class="container max-w-[1100px]">
                <div class="text-[35px] leading-9 mb-14 text-gray-900 dark:text-gray-100 font-bold ">
                    Semua Product
                </div>
                <div class="grid grid-cols-3 gap-5">
                    @foreach ($products as $product)
                        <x-product-item :product="$product"></x-product-item>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>
