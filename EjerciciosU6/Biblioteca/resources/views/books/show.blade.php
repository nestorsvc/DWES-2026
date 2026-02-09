<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Información del libro -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Columna izquierda -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Título</h3>
                            <p class="text-gray-900 text-xl">{{ $book->title }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Autor</h3>
                            <p class="text-gray-900">
                                <a href="{{ route('authors.show', $book->author->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    {{ $book->author->name }}
                                </a>
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Categorías</h3>
                            <p class="text-gray-900">
                                @if ($book->categories->count() > 0)
                                    @foreach ($book->categories as $category)
                                        <a href="{{ route('categories.show', $category->id) }}"
                                            class="inline-block px-2 py-1 mr-2 mb-2 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-gray-500">Sin categorías asignadas</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">ISBN</h3>
                            <p class="text-gray-900 font-mono">{{ $book->isbn }}</p>
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="space-y-4">
                        @if ($book->published_year)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Año de Publicación</h3>
                                <p class="text-gray-900">{{ $book->published_year }}</p>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Estado</h3>
                            @if ($book->is_available)
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Disponible
                                </span>
                            @else
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Prestado
                                </span>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Fecha de Registro</h3>
                            <p class="text-gray-900">{{ $book->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Descripción (ancho completo) -->
                    @if ($book->description)
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Descripción</h3>
                            <p class="text-gray-900 leading-relaxed">{{ $book->description }}</p>
                        </div>
                    @endif
                </div>

                <!-- Botones de acción -->
                <div class="flex items-center justify-end mt-6 space-x-3">
                    <a href="{{ route('books.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                        Volver
                    </a>

                    @if (auth()->user()->isLibrarian() || auth()->user()->isAdmin())
                        <a href="{{ route('books.edit', $book->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Editar
                        </a>
                    @endif

                    @if (auth()->user()->isSocio() && $book->is_available)
                        <a href="{{ route('loans.create', ['book_id' => $book->id]) }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                            Solicitar Préstamo
                        </a>
                    @endif
                </div>
            </div>

            <!-- Historial de préstamos del libro -->
            @if (auth()->user()->isLibrarian() || auth()->user()->isAdmin())
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">
                        Historial de Préstamos ({{ $book->loans->count() }})
                    </h3>

                    @if ($book->loans->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Usuario
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Préstamo
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Vencimiento
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Devolución
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($book->loans->sortByDesc('created_at') as $loan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $loan->user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $loan->user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($loan->status->value === 'pending')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pendiente
                                                </span>
                                            @elseif($loan->status->value === 'approved')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Aprobado
                                                </span>
                                            @elseif($loan->status->value === 'returned')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Devuelto
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Rechazado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loan->loan_date ? $loan->loan_date->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loan->due_date ? $loan->due_date->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loan->return_date ? $loan->return_date->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500 text-center py-8">
                            Este libro no tiene historial de préstamos.
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
