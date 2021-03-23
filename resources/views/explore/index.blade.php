<x-app>
    <div class="flex flex-wrap">
        @foreach ($users as $user)
            <div class="w-1/4 p-4">
                <a href="{{ $user->path() }}">
                    <img
                        src="{{ $user->avatar }}"
                        alt="{{ $user->username }}"
                        class="w-full pb-2 rounded-full">
                    <h3 class="text-sm font-bold">{{ "@$user->username" }}</h3>
                </a>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}
</x-app>
