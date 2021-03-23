
<div class="border border-blue-400 rounded-lg px-8 py-6 mb-6">
    <form method="POST" action="/tweets">
        @csrf
        <textarea
            name="body"
            class="w-full resize-none"
            placeholder="What are you doing?"
            maxlength="510"
            required
        ></textarea>

        @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span >
        @enderror

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <a href="{{ auth()->user()->path() }}">
                <img
                    src="{{ auth()->user()->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50px"
                    height="50px"
                >
            </a>
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-10 text-white text-sm"
            >
                Tweet
            </button>
        </footer>
    </form>
</div>
