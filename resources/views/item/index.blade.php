<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>商品一覧</h2>
                    <a href="{{ route('item.create') }}">新規追加</a>
                    <table class="tabel">
                        echo(items)
                        <!-- 繰り返し表示 -->
                        @foreach($items as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <a href="{{ route('item.edit', $item->id) }}">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('item.show', $item->id) }}">{{ $item->name }}</a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->price }}円
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>