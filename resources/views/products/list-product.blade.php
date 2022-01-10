<x-app-layout>


    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">

            <!-- Main Hero Content -->
            <div class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center">
                <h1
                    class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span class="inline md:block">Start Your Fashion now.</span>
                    @if ($title === 'Special pants.')
                        <span
                            class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-indigo-500 md:inline-block">
                        @elseif($title === 'Man daily.')
                            <span
                                class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-purple-600 to-indigo-500 md:inline-block">
                            @else
                                <span
                                    class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-pink-600 to-indigo-500 md:inline-block">
                    @endif
                    {{ $title }}
                    </span>
                </h1>
                <div class="mx-auto mt-5 text-gray-500 mb-12 md:mt-12 md:max-w-lg md:text-center lg:text-lg">
                    Simplifying
                    the
                    creation of landing pages, blog pages, application pages and so much more!</div>

            </div>
            <!-- End Main Hero Content -->

        </div>
    </section>

    @if ($products->isNotEmpty())
        <section class="bg-white">
            <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

                <div class="flex flex-col items-center sm:px-5 md:flex-row">
                    <div class="w-full md:w-1/2">
                        <a href="{{ route('products.show', $top) }}" class="block">
                            <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                                src="{{ asset('storage/' . $top->image_url) }}">
                        </a>
                    </div>
                    <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                        <div
                            class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                            @if ($top->category->id == 1)
                                <div
                                    class="bg-purple-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                @elseif ($top->category->id == 2)
                                    <div
                                        class="bg-pink-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                    @else
                                        <div
                                            class="bg-blue-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            @endif
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span>Top product {{ $top->category->name }}</span>
                        </div>
                        <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl"><a
                                href="{{ route('products.show', $top) }}">{{ $top->name }}</a></h1>
                        <p class="text-sm text-gray-500">{{ $top->description }}.</p>
                        <p class="pt-2 text-xs font-medium">
                            <span class="mx-1">$ </span>
                            <span class="mx-1 text-gray-600">{{ $top->price }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
                @foreach ($products as $key => $pd)
                    @if ($key > 0)
                        <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                            <a href="{{ route('products.show', $pd) }}" class="block">
                                <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                                    src="{{ asset('storage/' . $pd->image_url) }}">
                            </a>
                            @if ($pd->category->id == 1)
                                <div
                                    class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                    <span>{{ $pd->category->name }}</span>
                                </div>
                            @elseif($pd->category->id == 2)
                                <div
                                    class="bg-pink-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                    <span>{{ $pd->category->name }}</span>
                                </div>
                            @else
                                <div
                                    class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                    <span>{{ $pd->category->name }}</span>
                                </div>
                            @endif

                            <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a
                                    href="{{ route('products.show', $pd) }}">{{ $pd->name }}</a>
                            </h2>
                            <p class="text-sm text-gray-500">{{ $pd->description }}.</p>
                            <p class="pt-2 text-xs font-medium">
                                <span class="mx-1">$ </span>
                                <span class="mx-1 text-gray-600">{{ $pd->price }}</span>
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
        </section>
    @else
        <div class="mx-auto mt-5 text-gray-500 mb-12 md:mt-12 md:max-w-lg md:text-center lg:text-lg">Product
            @if ($title === 'Special pants.')
                <span
                    class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-indigo-500 md:inline-block">
                @elseif($title === 'Man daily.')
                    <span
                        class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-purple-600 to-indigo-500 md:inline-block">
                    @else
                        <span
                            class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-pink-600 to-indigo-500 md:inline-block">
            @endif
            {{ $title }}
            </span> is empty.
        </div>
    @endif

    @livewire('footer')

</x-app-layout>
