@unless (auth()->user()->is($user))
    <form
        method="post"
        action="{{ route('follow', $user) }}"
    >
        @csrf
        <button
            type="submit"
            class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs ml-4"
        >
            {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
        </button>
    </form>
@endunless
