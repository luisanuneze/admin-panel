<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full max-w-screen-md mx-auto">
                        <a href="{{route('brands.create')}}"
                            class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-base py-3 px-6 mb-4 text-white bg-blue-900 hover:bg-blue-600 hover:border-blue-600"
                        >
                            {{__('Add brand')}}
                        </a>
                        <table class="w-full table-auto rounded-sm">
                            <thead>
                            <tr>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    {{__('Name')}}
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    {{__('Website')}}
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    {{__('Options')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                    {{ $brand->name }}
                                </td>

                                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                    <a href="{{ $brand->website }}">
                                        {{ $brand->website }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                    <ul class="flex items-center">
                                        <li class="d-inline px-4">
                                            <a href="{{ route('brands.edit', ['brand'=>$brand])}} ">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('brands.destroy', ['brand' => $brand]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br/>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
