<x-app-layout>
    <h2>Item</h2>
    <div class="w-full max-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form class="mb-4" action="{{ route('item.update', $item->id) }}" method="post">
                @csrf
                <div class="mb-4">
                    <!-- <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        商品名
                    </label> -->
                    <label for="item_name">{{ __('messages.item_name') }}</label>
                    <input type="text" name="name" value="{{ $item->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="item_price">{{ __('messages.price') }}</label>
                    <input type="text" name="price" value="{{ $item->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('messages.update') }}</button>

                <a href="{{ route('item.index') }}">{{ __('messages.back') }}</a>
            </form>

            <form action="{{ route('item.destroy', $item->id) }}" method="post">
                @csrf
                <button class="bg-red-500 text-sm text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('messages.delete') }}</button>
            </form>
        </div>
    </div>
</x-app-layout>