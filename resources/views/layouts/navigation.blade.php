<style>
    
    .hover-underline-animation {
        display: inline-block;
        position: relative;
    }

    .hover-underline-animation::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: #0d6efd;
        transition: width 0.3s ease;
    }

    .hover-underline-animation:hover::after {
        width: 100%;
    }

    .nav-active {
        background-color: #e9f3ff;
        color: #0d6efd !important;
        font-weight: 600;
        border-radius: 8px;
    }

   
    .nav-link-custom:hover {
        background-color: #f0f8ff;
        color: #0d6efd !important;
        border-radius: 8px;
        transition: all 0.2s ease-in-out;
    }
</style>

<nav x-data="{ open: false }" class="bg-white border-bottom shadow-sm sticky-top z-10">
    <div class="container py-3 d-flex justify-content-between align-items-center">
      
        <a href="{{ route('dashboard') }}" class="navbar-brand fw-bold text-primary fs-4">
            📖 <span class="hover-underline-animation">Aplikasi Buku</span>
        </a>

       
        <div class="d-none d-sm-flex align-items-center gap-4">
            @foreach ([
                ['label' => 'Dashboard', 'route' => 'dashboard'],
                ['label' => 'Daftar Buku', 'route' => 'books.daftar'],
                ['label' => 'Kelola Buku', 'route' => 'books.index'],
                ['label' => 'Daftar Pengguna', 'route' => 'users.index'],
            ] as $nav)
                <x-nav-link 
                    :href="route($nav['route'])" 
                    :active="request()->routeIs(Str::before($nav['route'], '.') . '*')"
                    class="transition-all position-relative px-3 py-2 nav-link-custom {{ request()->routeIs(Str::before($nav['route'], '.') . '*') ? 'nav-active' : '' }}"
                >
                    {{ __($nav['label']) }}
                </x-nav-link>
            @endforeach

          
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="btn btn-sm btn-light border d-flex align-items-center shadow-sm">
                        <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
                        <svg class="ms-1" width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 
                            1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger w-100 text-start">
                            🔓 Log Out
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <button @click="open = ! open" class="d-sm-none btn btn-outline-secondary rounded-circle p-2">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

   
    <div x-show="open" class="d-sm-none px-4 py-3 border-top bg-light animate__animated animate__fadeInDown">
        @foreach ([
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Daftar Buku', 'route' => 'books.daftar'],
            ['label' => 'Kelola Buku', 'route' => 'books.index'],
            ['label' => 'Daftar Pengguna', 'route' => 'users.index'],
        ] as $nav)
            <x-responsive-nav-link 
                :href="route($nav['route'])" 
                :active="request()->routeIs(Str::before($nav['route'], '.') . '*')" 
                class="{{ request()->routeIs(Str::before($nav['route'], '.') . '*') ? 'fw-bold text-primary' : '' }}"
            >
                {{ __($nav['label']) }}
            </x-responsive-nav-link>
        @endforeach

        <hr>

        @if(Auth::check())
            <div class="fw-semibold text-dark">{{ Auth::user()->name }}</div>
            <div class="text-muted small mb-2">{{ Auth::user()->email }}</div>
        @endif

        <x-responsive-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-responsive-nav-link>

       
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link as="button">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
</nav>
