<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <h2 class="text-2xl font-extrabold text-gray-900">Update Product - {{ $product->name }}</h2>
            <div>
                <a href="{{ route('products.index') }}"
                    class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                    Cancel
                </a>
                <form class="inline-block" action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" onclick="return confirm('Are you sure?')"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                        Remove
                    </button>
                </form>
            </div>
        </div>
        <form class="inline-block" action="{{ route('products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Product information</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you create.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name products</label>
                                <input type="text" name="name" id="name" autocomplete="name"
                                    value="{{ $product->name }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="name" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" min="10000" name="price" id="price" autocomplete="price"
                                    value="{{ $product->price }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="price" class="mt-2" />
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Description for more informations">{{ $product->description }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for new product.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Product image
                                </label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex flex-wrap justify-center mb-6">
                                            @if ($product->image_url)
                                                <img src="{{ asset('storage/' . $product->image_url) }}"
                                                    class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                            @else
                                                <img class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />

                                            @endif
                                        </div>

                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="mx-auto text-sm text-gray-600">
                                            <label for="image_url"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="image_url" name="image_url" type="file" accept="image/png"
                                                    value="{{ $product->image_url }}" class="sr-only"
                                                    onChange="previewImage()">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <x-jet-input-error for="image_url" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    @section('file-upload')
        <script>
            function previewImage() {
                const image = document.querySelector('#image_url');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                };
            }
        </script>
    @stop
</x-app-layout>
