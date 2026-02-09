<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    {{-- Links para TODOS los usuarios autenticados --}}
    <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.*')">
        Catálogo
    </x-nav-link>
    <x-nav-link href="{{ route('authors.index') }}" :active="request()->routeIs('authors.*')">
        Autores
    </x-nav-link>
    <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.*')">
        Categorías
    </x-nav-link>

    {{-- Links para SOCIOS --}}
    @if (auth()->user()->isSocio())
        <x-nav-link href="{{ route('loans.index') }}" :active="request()->routeIs('loans.index')">
            Mis Préstamos
        </x-nav-link>
        <x-nav-link href="{{ route('loans.create') }}" :active="request()->routeIs('loans.create')">
            Solicitar Préstamo
        </x-nav-link>
    @endif

    {{-- Links para BIBLIOTECARIOS y ADMIN --}}
    @if (auth()->user()->isLibrarian() || auth()->user()->isAdmin())
        <x-nav-link href="{{ route('loans.indexAll') }}" :active="request()->routeIs('loans.indexAll')">
            Todos los Préstamos
        </x-nav-link>
        <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
            Usuarios
        </x-nav-link>
    @endif
</div>
