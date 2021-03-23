<x-master>
    <section class="px-8">
        <main class=" container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-32 lg:mr-10">
                    @include('_sidebar-links')
                </div>

                <div class="lg:flex-1" style="max-width: 700px">
                    {{ $slot }}
                </div>

                <div class="lg:w-1/6 lg:ml-10 ">
                    <div class="bg-gray-200 border border-gray-300 rounded-lg px-6 py-4">
                        @include('_friends-list')
                    </div>
                </div>
            </div>
        </main>
    </section>
</x-master>
