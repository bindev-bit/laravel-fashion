<x-app-layout>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit User') }}
                </h2>
                <div>
                    <a href="{{ route('users.index') }}"
                        class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                        Cancel
                    </a>
                    <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                            Remove
                        </button>
                    </form>
                    <form class="inline-block" action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                            Save
                        </button>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Information</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This information will be displayed publicly so be careful what you create.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidde">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="name" id="name" autocomplete="name"
                                value="{{ old('name', $user->name) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" autocomplete="email"
                                value="{{ old('email', $user->email) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <x-jet-section-border />

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Password</h3>
                    <p class="mt-1 text-sm text-gray-600">Ensure your account is using a long, random password to
                        stay secure.</p>
                </div>
            </div>
            <div x-data="{changePassword: false}" class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidde">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div x-show="!changePassword">
                            <h3 class="text-lg font-medium text-gray-900">

                                {{ __('You have enabled two factor authentication.') }}
                            </h3>
                            <div class="my-3 max-w-xl text-sm text-gray-600">
                                <p>
                                    {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                                </p>
                            </div>
                            <x-jet-button @click="changePassword = !changePassword" type="button">
                                {{ __('Change password') }}
                            </x-jet-button>
                        </div>

                        <div x-show="changePassword">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" autocomplete="password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="password" class="mt-2" />
                            </div>
                            <div class="col-span-6 my-3 sm:col-span-3">
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    autocomplete="password_confirmation"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="password_confirmation" class="mt-2" />
                            </div>
                            <x-jet-button @click="changePassword = !changePassword" type="button">
                                {{ __('Cancel') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

</x-app-layout>
