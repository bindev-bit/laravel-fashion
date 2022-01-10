<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    All wishlists ({{ count($wishlists) }})
                </h2>
                <div>
                    @if ($wishlists->isNotEmpty())
                        <form class="inline-block" action="{{ route('wishlists.removeAll') }}" method="POST">
                            @csrf

                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                                Remove all
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </header>
    @if ($wishlists->isEmpty())
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Wishlists is empty!</span>
            </h2>
        </div>
    @else

        <div class="py-12">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                @can('admin')
                    <div class="flex mt-6 flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Username
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Product
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created at
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($wishlists as $w)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="{{ $w->users->profile_photo_url }}"
                                                                    alt="{{ $w->users->name }}">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $w->users->name }}</div>
                                                                <div class="text-sm text-gray-500">{{ $w->users->email }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $w->products->name }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ $w->created_at->format('d M Y') }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('wishlists.show', $w->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

                        @foreach ($wishlists as $pd)
                            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                                <a href="{{ route('wishlists.show', $pd->id) }}" class="block">
                                    <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                                        src="{{ asset('storage/' . $pd->products->image_url) }}">
                                </a>
                                @if ($pd->products->category->id == 1)
                                    <div
                                        class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                        <span>{{ $pd->products->category->name }}</span>
                                    </div>
                                @elseif($pd->products->category->id == 2)
                                    <div
                                        class="bg-pink-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                        <span>{{ $pd->products->category->name }}</span>
                                    </div>
                                @else
                                    <div
                                        class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                        <span>{{ $pd->products->category->name }}</span>
                                    </div>
                                @endif

                                <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a
                                        href="{{ route('wishlists.show', $pd->id) }}">{{ $pd->products->name }}</a>
                                </h2>
                                <p class="text-sm text-gray-500">{{ $pd->products->description }}.</p>
                                <p class="pt-2 text-xs font-medium">
                                    <span class="mx-1">$ </span>
                                    <span class="mx-1 text-gray-600">{{ $pd->products->price }}</span>
                                </p>
                            </div>

                        @endforeach
                    </div>
                @endcan
            </div>
        </div>
    @endif
</x-app-layout>
