<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    All products ({{ count($products) }})
                </h2>
                <div>
                    <a href="{{ route('products.create') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                        Create
                    </a>
                </div>
            </div>
        </div>
    </header>
    @if ($products->isEmpty())
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Products is empty!</span>
            </h2>
        </div>
    @else

        <div class="py-12">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

                    @foreach ($products as $pd)
                        <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                            <a href="{{ route('products.edit', $pd->id) }}" class="block">
                                <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                                    src="{{ asset('storage/' . $pd->image_url) }}">
                            </a>
                            @if ($pd->category->id == 1)
                                <div
                                    class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                @elseif($pd->category->id == 2)
                                    <div
                                        class="bg-pink-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                    @else
                                        <div
                                            class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            @endif
                            <span>{{ $pd->category->name }}</span>
                        </div>
                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a
                                href="{{ route('products.edit', $pd->id) }}">{{ $pd->name }}</a>
                        </h2>
                        <p class="text-sm text-gray-500">{{ $pd->description }}.</p>
                        <p class="pt-2 text-xs font-medium">
                            <span class="mx-1">$ </span>
                            <span class="mx-1 text-gray-600">{{ $pd->price }}</span>
                        </p>
                </div>

    @endforeach


    </div>
    </div>
    </div>
    @endif
</x-app-layout>
