<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <h1>いいねしたユーザー一覧</h1>
                        <div class="container px-5 py-24 mx-auto">
                            @foreach($users as $user)
                            <div class="lg:w-2/3 my-4 py-4 border border-y-4 border-gray-300 sm:items-center items-start mx-auto">
                                <h2 class="flex-grow sm:pr-16 text-2xl font-medium title-font text-gray-900">
                                    <a class="block text-center" href="{{ route('user.profile',['id' => $user->id ]) }}">{{ $user->name }}</a>
                                </h1>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>