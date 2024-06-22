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
                    Created at
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
                    <td class="px-6 py-4 flex space-x-2 justify-end">

                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                            Edit
                        </a>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-blue-800">Delete</button>
                        </form>
                    </td>
                </tr>

            @empty

                <tr class="border-b bg-gray-800 border-gray-700">
                    <th scope="row" class="px-6 py-4 text-4xl font-medium text-gray-200 whitespace-nowrap">
                        No posts
                    </th>
                </tr>

            @endforelse

        </tbody>

    </table>
</div>


</x-layout>



