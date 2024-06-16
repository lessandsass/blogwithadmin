<nav class="bg-gray-900 text-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a
            href="{{ route('home') }}"
            class="flex items-center space-x-3 rtl:space-x-reverse"
        >
            <x-logo />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Vipu</span>
        </a>

        <button
            data-collapse-toggle="navbar-default"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2  dark:text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
            aria-controls="navbar-default"
            aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 border-gray-700">

                <x-navbar-link
                    href="/"
                    :active="request()->is('/')"
                >
                    Home
                </x-navbar-link>

                <x-navbar-link
                    href="/posts"
                    :active="request()->is('posts')"
                >
                    Posts
                </x-navbar-link>

                @guest
                    <x-navbar-link
                        href="/register"
                        :active="request()->is('register')"
                    >
                        Register
                    </x-navbar-link>

                    <x-navbar-link
                        href="/login"
                        :active="request()->is('login')"
                    >
                        Login
                    </x-navbar-link>
                @endguest

                @if(Auth::check())
                    <x-navbar-link>{{ Auth::user()->name }}</x-navbar-link>
                @endif

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-navbar-link href="{{ route('logout') }}" :active="false" onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-navbar-link>

                    </form>
                @endauth

            </ul>
        </div>

    </div>
</nav>


