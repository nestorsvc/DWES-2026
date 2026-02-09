<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitar Préstamo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('loans.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <x-label for="book_id" value="Selecciona un libro" />
                        <select
                            id="book_id"
                            name="book_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            required
                        >
                            <option value="">-- Selecciona un libro --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} - {{ $book->author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-secondary-button type="button" onclick="window.location='{{ route('loans.index') }}'">
                            Cancelar
                        </x-secondary-button>

                        <x-button class="ml-4">
                            Solicitar Préstamo
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
