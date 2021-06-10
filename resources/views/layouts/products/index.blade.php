<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full max-w-screen-md mx-auto">
                        <a href="{{route('products.create')}}"
                           class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-base py-3 px-6 mb-4 text-white bg-blue-900 hover:bg-blue-600 hover:border-blue-600"
                        >
                            {{__('Add product')}}
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
                                    {{__('Model No')}}
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    {{__('Brand')}}
                                </th>
                                <th
                                    class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium"
                                >
                                    {{__('Options')}}
                                </th>
                            </tr>
                            </thead>

                            @foreach($products as $product)
                                <tbody>
                                <tr class="border-gray-300">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                        {{ $product->name }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                        {{ $product->model_number }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                        {{ $product->brand->name }}
                                    </td>

                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                                        <div class="flex flex-wrap content-center">
                                            <ul class="flex items-center">
                                                <li class="d-inline px-4">
                                                    <a href="{{ route('products.edit', ['product'=>$product])}} ">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </li>
                                                <li class="d-inline px-4">
                                                    <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <br/>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
