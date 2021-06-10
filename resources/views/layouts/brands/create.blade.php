<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create brand') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('brands.store')}}">
                        @csrf
                        <div class="w-full max-w-screen-md mx-auto">
                            <div class="block">
                                <div class="block w-full">
                                    <label class="text-sm text-gray-600 sm:w-24">{{__('Name')}}</label>
                                    <div class="block w-full">
                                        <input
                                            name="name"
                                            class="w-full border border-gray-300 rounded-sm px-4 py-3 outline-none transition-colors duration-150 ease-in-out focus:border-blue-400"
                                        />
                                        @error('name')
                                        <div class="text-red-900 text-xs w-100">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="block w-full">
                                    <label class="text-sm text-gray-600 sm:w-24">{{__('Website')}}</label>
                                    <div class="block w-full">
                                        <input
                                            name="website"
                                            class="w-full border border-gray-300 rounded-sm px-4 py-3 outline-none transition-colors duration-150 ease-in-out focus:border-blue-400"
                                        />
                                        @error('website')
                                        <div class="text-red-900 text-xs w-100">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <button type="submit"
                                        class="mt-4 inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-base py-3 px-6 mb-4 text-white bg-blue-900 hover:bg-blue-600 hover:border-blue-600"
                                >
                                    {{__('Save')}}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
