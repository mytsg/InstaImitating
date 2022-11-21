<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:w-2/3 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-4 mx-auto">
                            <div class="-m-4">
                                @foreach($items as $item)
                                <div class="p-4">
                                    <div class="border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                        <img class="w-full object-cover object-center" src="{{ asset('storage/items/'.$item->filename) }}">
                                        <div class="p-6">
                                            <a href="{{ route('user.profile',['id' => $item->user_id]) }}">
                                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $item->user->name }}</h1>
                                            </a>
                                            <p class="leading-relaxed mb-3">{{ $item->information }}</p>
                                            <p>{{ $item->created_at }}</p>
                                            <div class="py-4">
                                            @if($item->is_liked_by_auth_user())
                                                <a href="{{ route('user.unlike', ['id' => $item->id]) }}" class="btn btn-success btn-sm">
                                                    ❤<span class="badge ml-4">{{ $item->likes->count() }}</span>
                                                </a>
                                            @else
                                                <a href="{{ route('user.like', ['id' => $item->id]) }}" class="btn btn-secondary btn-sm">❤<span class="badge ml-4">{{ $item->likes->count() }}</span></a>
                                            @endif
                                            </div>
                                            <a href="{{ route('user.items.show',['item' => $item->id]) }}">いいねしたユーザー</a>

                                            @if($item->user_id == Auth::id())
                                            <form id="delete_{{$item->id}}" method="post" action="{{ route('user.items.destroy',['item' => $item->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <div class="md:px-4 py-3">
                                                <div class="p-2 w-full mt-4 flex justify-around">
                                                    <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除する</a>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{ $items->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してもいいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
</x-app-layout>