<ul>
    <li>
        <a
            href="/tweets"
            class="font-bold text-lg mb-4 block"
        >
            Home
        </a>
    </li>
    <li>
        <a
            href="/explore"
            class="font-bold text-lg mb-4 block"
        >
            Explore
        </a>
    </li>
    <li>
        <a
            href="{{ route('profile', auth()->user()) }}"
            class="font-bold text-lg mb-4 block"
        >
            Profile
        </a>
    </li>
    <li>
        <form method="post" action="/logout">
            @csrf

            <button
                type="submit"
                class="font-bold text-lg">
                Logout
            </button>
        </form>
    </li>
</ul>
