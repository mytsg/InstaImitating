<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-around items-center h-20">
                    <h1>{{ $user->name }}</h1>
                    <p>いいね合計数</p>
                </div>
                <div class="px-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-12 mx-auto">
                            <div class="flex flex-wrap -m-4">
                                @foreach($items as $item)
                                <div class="p-1 sm:p-4 w-1/3">
                                    <div class="border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                        <img class="w-full object-cover object-center" src="{{ asset('storage/items/'.$item->filename) }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>