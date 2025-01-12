<header class="w-full mb-[116px]">
    <div class="container max-w-[1200px]">
        <div class="flex justify-between items-center gap-3">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16">
            </a>

            <nav class="flex items-center gap-7 py-8">
                <a href="{{ route('home') }}"
                    class="hover:text-gray-600 dark:hover:text-gray-300 {{ request()->routeIs('home') ? 'text-red-500' : 'text-white' }} ">Home</a>
                <a href="{{ route('product') }}"
                    class="hover:text-gray-600 dark:hover:text-gray-300 {{ request()->routeIs('product') ? 'text-red-500' : 'text-white' }}">Product</a>
                <a href="{{ route('about') }}"
                    class="hover:text-gray-600 dark:hover:text-gray-300 {{ request()->routeIs('about') ? 'text-red-500' : 'text-white' }}">About</a>
                <a href="#"
                    class="hover:text-gray-600 dark:hover:text-gray-300 {{ request()->routeIs('product') ? 'text-red-500' : 'text-white' }}">Contact
                    Us</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('cart') }}"
                    class="flex items-center gap-2 px-3 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.65391 12.3869C5.65391 12.6815 5.54623 12.9367 5.33087 13.152C5.11562 13.3674 4.86062 13.4749 4.56598 13.4749C4.27134 13.4749 4.01633 13.3674 3.80108 13.152C3.58573 12.9367 3.47804 12.6815 3.47804 12.3869C3.47804 12.0924 3.58573 11.8374 3.80108 11.6221C4.01633 11.4067 4.27134 11.299 4.56598 11.299C4.86062 11.299 5.11562 11.4067 5.33087 11.6221C5.54623 11.8374 5.65391 12.0924 5.65391 12.3869ZM13.2692 12.3869C13.2692 12.6815 13.1615 12.9367 12.9462 13.152C12.7308 13.3674 12.4758 13.4749 12.181 13.4749C11.8866 13.4749 11.6315 13.3674 11.4163 13.152C11.2009 12.9367 11.0932 12.6815 11.0932 12.3869C11.0932 12.0924 11.2009 11.8374 11.4163 11.6221C11.6315 11.4067 11.8866 11.299 12.181 11.299C12.4758 11.299 12.7308 11.4067 12.9462 11.6221C13.1615 11.8374 13.2692 12.0924 13.2692 12.3869ZM14.3571 3.13994V7.49154C14.3571 7.62762 14.3102 7.74793 14.2167 7.85272C14.1231 7.95751 14.0085 8.01858 13.8725 8.0354L4.99947 9.07233C5.07308 9.4124 5.10994 9.61061 5.10994 9.6674C5.10994 9.75804 5.0419 9.93943 4.90594 10.2113H12.7251C12.8724 10.2113 12.9998 10.2651 13.1075 10.3728C13.2153 10.4805 13.2691 10.6079 13.2691 10.7552C13.2691 10.9027 13.2153 11.0299 13.1075 11.1376C12.9998 11.2453 12.8724 11.2991 12.7251 11.2991H4.02212C3.8748 11.2991 3.74729 11.2453 3.63962 11.1376C3.53194 11.0299 3.47816 10.9027 3.47816 10.7552C3.47816 10.693 3.50087 10.6036 3.54608 10.4876C3.59151 10.3713 3.63683 10.2694 3.68216 10.1817C3.72748 10.0938 3.78844 9.98047 3.86494 9.84161C3.94144 9.70275 3.98537 9.61919 3.99672 9.5909L2.49234 2.59608H0.758438C0.611117 2.59608 0.483727 2.54229 0.376049 2.43462C0.26837 2.32694 0.214478 2.19944 0.214478 2.05212C0.214478 1.90479 0.268263 1.77729 0.376049 1.66961C0.48362 1.56204 0.611117 1.50815 0.758438 1.50815H2.9343C3.02494 1.50815 3.10573 1.52658 3.17655 1.56343C3.24737 1.60029 3.30266 1.64422 3.3423 1.69511C3.38194 1.74611 3.4188 1.81554 3.45287 1.9034C3.48672 1.99115 3.50944 2.06487 3.5208 2.12433C3.53216 2.1839 3.54779 2.26747 3.56762 2.37504C3.58744 2.48272 3.60019 2.55633 3.60587 2.59608H13.8135C13.9608 2.59608 14.0881 2.64986 14.196 2.75754C14.3032 2.86511 14.3571 2.99262 14.3571 3.13994Z"
                            fill="white" />
                    </svg>
                    <span>Cart ({{Cart::getContent()->count()}})</span>
                </a>
            </div>
        </div>
    </div>
</header>
