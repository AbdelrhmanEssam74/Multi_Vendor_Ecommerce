<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="eCommerce,shop,fashion">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
<body>
<div class="bg-indigo-600 text-white p-2 text-center text-sm font-medium">
    ✨ New Feature: Quick Setup for Vendors! Join our growing community today.
</div>

<header class=" top-0 z-50 bg-white shadow-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0">
                <a href="#" class="text-3xl font-extrabold text-indigo-700 tracking-wider">
                    Vendora
                </a>
            </div>

            <div class="flex-1 max-w-xl mx-8 hidden lg:block">
                <div class="relative">
                    <input type="search" placeholder="Search products, categories, or sellers..."
                           class="w-full py-3 pl-4 pr-12 text-gray-800 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150 ease-in-out" />
                    <button type="submit"
                            class="absolute right-0 top-0 mt-3 mr-4 text-gray-400 hover:text-indigo-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <a href="/vendor-signup"
                   class="hidden md:inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-green-500 hover:bg-green-600 transition duration-150 ease-in-out shadow-md">
                    Sell on Vendora
                </a>

                <button
                    class="p-2 rounded-full text-gray-500 hover:text-indigo-600 transition duration-150"
                    aria-label="Account">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </button>

                <button
                    class="relative p-2 rounded-full text-gray-500 hover:text-indigo-600 transition duration-150"
                    aria-label="Shopping Cart">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5H21M7 13l-1.4 5h12.8l-1.4-5M7 13H5.4M17 13h2.6M10 21a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                        3
                    </span>
                </button>
            </div>
        </div>
    </div>

    <nav class="bg-gray-800 shadow-inner hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-8 h-12 items-center">
                <a href="#" class="text-white hover:text-indigo-300 font-semibold text-sm transition duration-150">All Categories</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-150">Electronics</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-150">Fashion</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-150">Home & Kitchen</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-150">Handmade Goods</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-150">Digital Products</a>
            </div>
        </div>
    </nav>
</header>
<section class="">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-12">
        <div class="relative w-full overflow-hidden rounded-lg  aspect-[16/6]">
            <div id="hero-slider-track" class="flex w-full h-full transition-transform duration-500 ease-in-out">
                <div class="flex-shrink-0 w-full bg-cover bg-center h-full"
                     style="background-image: url('{{asset('images/banner/banner-bg1.jpg')}}');">
                    <div class=" h-full flex items-center p-12">
                        <div class="max-w-md text-black">
                            <h2 class="text-5xl font-extrabold mb-2 leading-tight">Vendor Spotlight Week!</h2>
                            <p class="text-xl font-light mb-6">Discover 50+ New Artisans and Makers today.</p>
                            <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg bg-blue-950  text-white  hover:bg-blue-800 transition duration-150">
                                Shop All Vendors
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 w-full bg-cover bg-center h-full"
                     style="background-image: url('{{asset('images/banner/banner-bg2.jpg')}}');">
                    <div class="h-full flex items-center p-12">
                        <div class="max-w-md text-black">
                            <h2 class="text-5xl font-extrabold mb-2 leading-tight">Summer Clearance: Up to 60% Off</h2>
                            <p class="text-xl font-light mb-6">Massive discounts across all electronics and apparel.</p>
                            <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg   text-white  hover:bg-blue-800 bg-blue-950  transition duration-150">
                                View Deals
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 w-full bg-cover bg-center h-full"
                     style="background-image: url('{{asset('images/banner/banner-bg3.jpg')}}');">
                    <div class="h-full flex items-center p-12">
                        <div class="max-w-md text-black">
                            <h2 class="text-5xl font-extrabold mb-2 leading-tight">Summer Clearance: Up to 60% Off</h2>
                            <p class="text-xl font-light mb-6">Massive discounts across all electronics and apparel.</p>
                            <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg   text-indigo-700 bg-white hover:bg-gray-100 transition duration-150">
                                View Deals
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // 1. Get necessary DOM elements
    const sliderTrack = document.getElementById('hero-slider-track');
    const slides = sliderTrack.children;
    const totalSlides = slides.length;

    // Check if we have slides before proceeding
    if (totalSlides > 0) {
        let currentSlide = 0;
        const slideInterval = 5000; // Time in milliseconds (5 seconds)

        /**
         * Function to transition to the next slide.
         */
        function nextSlide() {
            // Calculate the index of the next slide
            currentSlide = (currentSlide + 1) % totalSlides;

            // Calculate the required horizontal shift (in percentage)
            const offset = -currentSlide * 100;

            // Apply the transformation to the slider track
            sliderTrack.style.transform = `translateX(${offset}%)`;
        }

        /**
         * Function to set up the slide buttons (if you add IDs to them).
         * NOTE: The buttons in the HTML need IDs (e.g., 'prev-button', 'next-button')
         * for this to work perfectly, but we will focus on auto-slide first.
         */

        // Start the automatic rotation
        setInterval(nextSlide, slideInterval);

        // Initial setup to ensure all slides are set to full width
        for (let i = 0; i < totalSlides; i++) {
            slides[i].style.width = '100%';
        }
    }
</script>
</body>
</html>
