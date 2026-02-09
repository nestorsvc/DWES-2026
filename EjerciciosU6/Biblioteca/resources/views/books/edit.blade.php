<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Libro: {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Título -->
                    <div class="mb-4">
                        <x-label for="title" value="Título del Libro" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title', $book->title)" required autofocus />
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Autor -->
                    <div class="mb-4">
                        <x-label for="author_id" value="Autor" />
                        <select id="author_id" name="author_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                            required>
                            <option value="">Selecciona un autor</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <x-label value="Categorías" />
                        <div class="mt-2 space-y-2">
                            @foreach ($categories as $category)
                                <label class="flex items-center">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-600">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('categories')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- ISBN -->
                    <div class="mb-4">
                        <x-label for="isbn" value="ISBN" />
                        <x-input id="isbn" class="block mt-1 w-full" type="text" name="isbn"
                            :value="old('isbn', $book->isbn)" required />
                        @error('isbn')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Año de Publicación -->
                    <div class="mb-4">
                        <x-label for="published_year" value="Año de Publicación" />
                        <x-input id="published_year" class="block mt-1 w-full" type="number" name="published_year"
                            :value="old('published_year', $book->published_year)" min="1000" max="{{ date('Y') }}" />
                        @error('published_year')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <x-label for="description" value="Descripción" />
                        <textarea id="description" name="description" rows="5"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Disponibilidad -->
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_available" value="1"
                                {{ old('is_available', $book->is_available) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Libro disponible para préstamo</span>
                        </label>
                        @error('is_available')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end mt-4 space-x-3">
                        <a href="{{ route('books.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                            Cancelar
                        </a>
                        <x-button>
                            Actualizar Libro
                        </x-button>
                    </div>
                </form>

                <!-- Botón de eliminar (opcional) -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                        onsubmit="return confirm('¿Estás seguro de eliminar este libro? Esta acción no se puede deshacer.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Eliminar Libro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
