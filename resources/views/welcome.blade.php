<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Highlighting premium, high-quality tortillas.') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-14">
        <div class="container lg:max-w-[1100px]">
            <div class="grid grid-cols-3 gap-5">
                <div class="col-span-2 flex items-center">
                    <div>
                        <div class="text-[32px] text-gray-900 dark:text-gray-100 leading-8">
                            Tortilla Premium Tanpa Pengawet!
                        </div>
                        <div class="text-[16px] text-gray-900 dark:text-gray-100 leading-6 mb-[25px]">
                            Nikmati cita rasa autentik dengan tortilla premium bebas pengawet yang terbuat dari bahan-bahan berkualitas tinggi. Cocok untuk berbagai hidangan, tortilla kami menjadikan setiap sajian lebih lezat, sehat, dan istimewa!
                        </div>
                        <a href="{{route('product')}}" class="inline-block px-12 py-3 bg-red-500 text-white rounded-full border" >Shop Now!</a>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="p-5">
                        <img src="{{ asset('images/sample.png')}}" alt="" class="w-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 mb-14">
        <div class="container lg:max-w-[1100px]">
            <div class="grid grid-cols-3 gap-5">
                <div class="col-span-1">
                    <div class="p-5">
                        <img src="{{ asset('images/sample.png')}}" alt="" class="w-full">
                    </div>
                </div>
                <div class="col-span-2 flex items-center">
                    <div>
                        <div class="text-[32px] text-gray-900 dark:text-gray-100 leading-8">
                            Tortilla Premium Tanpa Pengawet!
                        </div>
                        <div class="text-[16px] text-gray-900 dark:text-gray-100 leading-6 mb-[25px]">
                            Nikmati cita rasa autentik dengan tortilla premium bebas pengawet yang terbuat dari bahan-bahan berkualitas tinggi. Cocok untuk berbagai hidangan, tortilla kami menjadikan setiap sajian lebih lezat, sehat, dan istimewa!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <div class="py-24 bg-white">
        <div class="container">
            <div class="text-center font-bold text-[35px] leading-9 mb-14 text-gray-900">
                Our Customers
            </div>
            <div class="flex gap-3 justify-between items-center">
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/26.png')}}" alt="" class="w-full">
                </div>
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/27.png')}}" alt="" class="w-full">
                </div>
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/28.png')}}" alt="" class="w-full">
                </div>
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/29.png')}}" alt="" class="w-full">
                </div>
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/30.png')}}" alt="" class="w-full">
                </div>
                <div class="w-[180px] h-auto">
                    <img src="{{ asset('images/customer/31.png')}}" alt="" class="w-full">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
