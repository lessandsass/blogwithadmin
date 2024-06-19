<x-layout>

    <x-header>Admin Index Page</x-header>

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



<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    CReated at
                </th>
                <th scope="col" class="px-6 py-3">
                    &nbsp;
                </th>
            </tr>
        </thead>

        <tbody>

            @forelse ($posts as $post)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->id }}
                    </th>
                    <td class="px-6 py-4">
                        {!! Str::limit($post->title, 15, ' ...') !!}
                        {{-- {{ $post->title }} --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        Edit / Delete
                    </td>
                </tr>

            @empty

                <tr class="border-b bg-gray-800 border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        No posts
                    </th>
                </tr>

            @endforelse

        </tbody>

    </table>
</div>


</x-layout>



