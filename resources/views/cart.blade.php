<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Cart') }}
        </h1>
    </x-slot>

    <div class="py-20">
        <div class="container lg:max-w-[900px]">
            @php
                $carts = Cart::getContent();
            @endphp

            @foreach ($carts as $item)
                <x-cart-item :item="$item" />
            @endforeach

            <div class="flex justify-end">
                <div>
                    <div class="border p-2 dark:border-gray-400">
                        <table class="cart-total">
                            <tbody>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp. {{ number_format(Cart::getTotal(), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-row gap-3 justify-end mt-10">
                        <a href="{{route('product')}}" class="px-8 py-4 border dark:border-gray-400 inline-block text-center text-gray-900 dark:text-gray-100">
                            Belanja Lagi
                        </a>
                        <a href="{{route('checkout')}}" class="px-8 py-4 border border-amber-500 font-bold bg-amber-500 hover:bg-amber-800 text-center text-white inline-block">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
