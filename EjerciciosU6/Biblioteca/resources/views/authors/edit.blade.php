<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Autor: {{ $author->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('authors.update', $author->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-4">
                        <x-label for="name" value="Nombre del Autor" />
                        <x-input
                            id="name"
                            class="block mt-1 w-full"
                            type="text"
                            name="name"
                            :value="old('name', $author->name)"
                            required
                            autofocus
                        />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Biografía -->
                    <div class="mb-4">
                        <x-label for="biography" value="Biografía" />
                        <textarea
                            id="biography"
                            name="biography"
                            rows="6"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                            placeholder="Escribe una breve biografía del autor..."
                        >{{ old('biography', $author->biography) }}</textarea>
                        @error('biography')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="mb-4">
                        <x-label for="birth_date" value="Fecha de Nacimiento" />
                        <x-input
                            id="birth_date"
                            class="block mt-1 w-full"
                            type="date"
                            name="birth_date"
                            :value="old('birth_date', $author->birth_date ? $author->birth_date->format('Y-m-d') : '')"
                        />
                        @error('birth_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nacionalidad -->
                    <div class="mb-4">
                        <x-label for="nationality" value="Nacionalidad" />
                        <x-input
                            id="nationality"
                            class="block mt-1 w-full"
                            type="text"
                            name="nationality"
                            :value="old('nationality', $author->nationality)"
                            placeholder="Ej: Español, Colombiano, Argentino..."
                        />
                        @error('nationality')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end mt-4 space-x-3">
                        <a href="{{ route('authors.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                            Cancelar
                        </a>
                        <x-button>
                            Actualizar Autor
                        </x-button>
                    </div>
                </form>

                <!-- Botón de eliminar (opcional) -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este autor? Esta acción eliminará también todos sus libros.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Eliminar Autor
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
