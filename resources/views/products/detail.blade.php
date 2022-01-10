<x-app-layout>

    <section class="bg-white">
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="w-full md:w-1/2">
                    <a href="#_" class="block">
                        <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                            src="{{ asset('storage/' . $product->image_url) }}">
                    </a>
                </div>
                <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                    <div
                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                        @if ($product->category->id == 1)
                            <div
                                class="bg-purple-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            @elseif ($product->category->id == 2)
                                <div
                                    class="bg-pink-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                @else
                                    <div
                                        class="bg-blue-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        @endif
                        <span>{{ $product->category->name }}</span>
                    </div>
                    <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl"><a
                            href="#_">{{ $product->name }}</a></h1>
                    <p class="text-sm text-gray-500">{{ $product->description }}.</p>
                    <p class="pt-2 text-xl font-bold font-medium">
                        <span class="mx-1">$ </span>
                        <span class="mx-1 text-gray-600">{{ $product->price }}</span>
                    </p>
                    <form action="{{ route('wishlists.store') }}" method="POST">
                        <input type="hidden" id="id" name="id" value="{{ $product->id }}" />

                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-indigo-600 rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto">
                            Wishlist now
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    @livewire('footer')

</x-app-layout>
