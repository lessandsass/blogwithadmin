<x-layout>

    <x-header>Register</x-header>

    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-800 rounded-lg">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-200">Email</label>
                <input
                    type="text"
                    name="email"
                    class="block w-full p-3 bg-gray-900 border border-gray-800 placeholder-gray-500 text-gray-300 rounded-lg focus:outline-none @error('email') border-red-500 @enderror"
                    placeholder="Write your title here . . ."
                >

                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-200">Password</label>
                <input
                    type="password"
                    name="password"
                    class="block w-full p-3 bg-gray-900 border border-gray-800 placeholder-gray-500 text-gray-300 rounded-lg focus:outline-none @error('password') border-red-500 @enderror"
                    placeholder="Write your title here . . ."
                >

                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="text-gray-300 bg-green-600 hover:bg-green-700  font-medium rounded-lg px-7 py-3.5 me-2 mb-2 focus:outline-none"
                >
                    Login
                </button>
            </div>

        </form>
    </div>
</x-layout>

