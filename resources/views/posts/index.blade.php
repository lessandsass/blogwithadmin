<x-layout>

    <x-header>All posts</x-header>

    <section>
        <div class="flex justify-end">
            <a
                href="{{ route('posts.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
            >
                Create
            </a>
        </div>
    </section>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($posts as $post)
            <div class="max-w-sm p-6 border-2 rounded-lg bg-gray-800 border-gray-700 mb-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-200">
                    {{ $post->title }}
                </h5>

                <p class="mb-3 font-normal text-gray-400">
                    {{ $post->content }}
                </p>

                <div class="">

                    <a href="/posts/{{ $post->id }}/show" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>

                    @can('delete', $post)
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-green-800">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
                        </form>
                    @endcan

                </div>

            </div>
        @endforeach

    </div>

</x-layout>
