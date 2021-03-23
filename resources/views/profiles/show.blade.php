<x-app>
    <header class="mb-6">
        <div class="mb-2 relative">
            <div class="h-48 rounded-lg overflow-hidden">
                <img
                    src="/images/default-profile-banner.jpg"
                    alt="Profile Banner"
                >
            </div>
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-12"
                style="left: 50%"
                width="128"
            >
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a
                        href="{{ $user->path('edit') }}"
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs"
                    >
                        Edit Profile
                    </a>
                @endcan

                <x-follow-button :user="$user"></x-follow-button>

            </div>
        </div>

        <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias voluptatum consequatur earum provident illo obcaecati, excepturi ipsum itaque officia, totam illum at esse architecto asperiores, possimus amet soluta. Recusandae, suscipit.</p>

    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app>
