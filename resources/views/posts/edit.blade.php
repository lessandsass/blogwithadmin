<x-layout>

    <x-header>Create Post Page</x-header>

    <div class="max-w-2xl mx-auto p-4 bg-gray-800 rounded-lg">
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-200">Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{ $post->title }}"
                    class="block w-full p-3 bg-gray-900 border border-gray-800 placeholder-gray-500 text-gray-300 rounded-lg focus:outline-none @error('title') border-red-500 @enderror"
                    placeholder="Write your title here . . ."
                >

                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-200">Content</label>
                <textarea
                    name="content"
                    id="content"
                    class="block w-full p-3 bg-gray-900 border border-gray-800 placeholder-gray-500 text-gray-300 rounded-lg focus:outline-none @error('content') border-red-500 @enderror"
                    placeholder="Write your title here . . ."
                >{{ $post->content }}</textarea>

                @error('content')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-white" for="file_input">Thumbnail</label>
                <input class="block w-full text-sm border  rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-900 border-gray-900 placeholder-gray-600" id="thumbnail" name="thumbnail" type="file">

                @error('thumbnail')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="text-gray-300 bg-blue-600 hover:bg-blue-700  font-medium rounded-lg px-7 py-3.5 me-2 mb-2 focus:outline-none"
                >
                    Update
                </button>
            </div>

        </form>
    </div>

</x-layout>
