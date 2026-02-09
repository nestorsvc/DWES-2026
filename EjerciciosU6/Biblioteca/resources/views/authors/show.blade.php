<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Autor: {{ $author->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Información del autor -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Nombre</h3>
                        <p class="text-gray-900">{{ $author->name }}</p>
                    </div>

                    @if($author->country)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">País</h3>
                            <p class="text-gray-900">{{ $author->country }}</p>
                        </div>
                    @endif

                    @if($author->birth_date)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Fecha de Nacimiento</h3>
                            <p class="text-gray-900">
                                {{ $author->birth_date->format('d/m/Y') }}
                                <span class="text-sm text-gray-500">
                                    ({{ $author->birth_date->age }} años)
                                </span>
                            </p>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Fecha de Registro</h3>
                        <p class="text-gray-900">{{ $author->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex items-center justify-end mt-6 space-x-3">
                    <a href="{{ route('authors.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                        Volver
                    </a>

                    @if(auth()->user()->isLibrarian() || auth()->user()->isAdmin())
                        <a href="{{ route('authors.edit', $author->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Editar
                        </a>
                    @endif
                </div>
            </div>

            <!-- Lista de libros del autor -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Libros publicados ({{ $author->books->count() }})
                </h3>

                @if($author->books->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($author->books as $book)
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                                <h4 class="font-semibold text-gray-900 mb-2">{{ $book->title }}</h4>

                                <div class="space-y-2 text-sm text-gray-600">
                                    <div>
                                        <span class="font-medium">ISBN:</span> {{ $book->isbn }}
                                    </div>

                                    @if($book->published_year)
                                        <div>
                                            <span class="font-medium">Año:</span> {{ $book->published_year }}
                                        </div>
                                    @endif

                                    <div>
                                        <span class="font-medium">Categorías:</span>
                                        @if($book->categories->count() > 0)
                                            <div class="mt-1">
                                                @foreach($book->categories as $category)
                                                    <span class="inline-block px-2 py-1 mr-1 mb-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                                        {{ $category->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400">Sin categorías</span>
                                        @endif
                                    </div>

                                    <div class="pt-2">
                                        @if($book->is_available)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Disponible
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Prestado
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('books.show', $book->id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Ver detalles →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">
                        Este autor aún no tiene libros registrados en la biblioteca.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
