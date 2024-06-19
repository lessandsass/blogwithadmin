<nav class="bg-gray-900 text-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a
            href="{{ route('home') }}"
            class="flex items-center space-x-3 rtl:space-x-reverse"
        >
            <x-logo />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Vipu</span>
        </a>

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

                @if (Auth::check() && Auth::user()->is_admin)
                    <x-navbar-link
                        href="/admin"
                        :active="request()->is('admin')"
                    >
                        Admin
                    </x-navbar-link>
                @endif

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


