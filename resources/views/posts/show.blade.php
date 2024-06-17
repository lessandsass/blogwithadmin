<x-layout>

    <x-header>Show Posts Page</x-header>

    <section>
        <div class="flex justify-end mt-5">
            <div class="flex justify-between">

                    <a href="{{ route('posts.edit', $post->id) }}" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Edit</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-blue-800">Delete</button>
                    </form>

            </div>
        </div>
    </section>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 align-items: center">

        <h2 class="text-4xl font-extrabold dark:text-white">
            {{ $post->title }}
        </h2>

        <p class="my-4 text-lg text-gray-500">
            {{ $post->content }}
        </p>

        <a href="#" class="inline-flex items-center text-lg text-blue-600 dark:text-blue-500 hover:underline">
            Read more
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>

    </main>


</x-layout>
