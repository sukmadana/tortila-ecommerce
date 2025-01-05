<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-16">
        <div class="container max-w-[1100px]">
            <div class="text-center">
                <h2 class="text-4xl mb-12 text-gray-900 dark:text-gray-100 font-bold">Our Company</h2>
                <div class="text-center text-gray-900 dark:text-gray-100 text-base mb-16">
                    <p>TMs Supplier Tortilla adalah penyedia premium tortilla berkualitas tinggi yang menawarkan berbagai pilihan tortilla untuk kebutuhan kuliner Anda. Didirikan pada tahun 2020, perusahaan kami berkomitmen untuk menyediakan produk tortilla yang tidak hanya lezat dan autentik, tetapi juga mendukung keanekaragaman kreasi masakan, mulai dari hidangan tradisional hingga modern.</p>
                </div>
                <div class="w-full mb-20">
                    <img src="{{ asset('images/office.png') }}" alt="About" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="grid grid-cols-2 gap-16 text-gray-900 dark:text-gray-100 text-base">
                    <div>
                        Kami bangga menggunakan bahan-bahan terbaik dalam setiap produk kami, termasuk jagung pilihan berkualitas premium dan bahan alami lainnya yang diolah dengan teknologi modern. TMs Supplier Tortilla bekerja sama dengan produsen berpengalaman untuk memastikan setiap tortilla yang dihasilkan memiliki kualitas yang luar biasa.
                    </div>
                    <div>
                        Tortilla kami tersedia dalam berbagai varian, dari yang klasik hingga inovatif, dan dirancang untuk memenuhi berbagai kebutuhan kuliner, baik untuk restoran, katering, maupun konsumsi pribadi. Dengan komitmen terhadap rasa autentik dan keunggulan mutu, kami percaya setiap tortilla yang kami produksi akan menjadi pelengkap sempurna untuk hidangan Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
