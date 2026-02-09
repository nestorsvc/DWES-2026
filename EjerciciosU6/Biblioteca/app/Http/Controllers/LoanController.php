<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\LoanStatus;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::where('user_id', auth()->id())
            ->with(['book.author', 'librarian'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('loans.index', compact('loans'));
    }

    public function indexAll()
    {
        $loans = Loan::with(['user', 'book.author', 'librarian'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('loans.index-all', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener libros disponibles para prestar
        $books = Book::where('is_available', true)
            ->with('author')
            ->orderBy('title')
            ->get();

        return view('loans.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $user = auth()->user();
        $book = Book::findOrFail($request->book_id);

        // Verificar que el libro esté disponible
        if (!$book->is_available) {
            return redirect()->back()
                ->withErrors(['book_id' => 'Este libro no está disponible en este momento.'])
                ->withInput();
        }

        // Verificar que el usuario NO tenga préstamos vencidos sin devolver
        $hasOverdueLoans = Loan::where('user_id', $user->id)
            ->where('status', LoanStatus::APPROVED)
            ->where('due_date', '<', Carbon::now())
            ->whereNull('return_date')
            ->exists();

        if ($hasOverdueLoans) {
            return redirect()->back()
                ->withErrors(['message' => 'Tienes préstamos vencidos sin devolver. Devuélvelos antes de solicitar uno nuevo.'])
                ->withInput();
        }

        // Verificar que el usuario NO tenga más de 3 préstamos activos
        $activeLoansCount = Loan::where('user_id', $user->id)
            ->where('status', LoanStatus::APPROVED)
            ->whereNull('return_date')
            ->count();

        if ($activeLoansCount >= 3) {
            return redirect()->back()
                ->withErrors(['message' => 'Ya tienes 3 préstamos activos. Devuelve alguno antes de solicitar otro.'])
                ->withInput();
        }

        // Si pasa todas las validaciones, crear el préstamo
        Loan::create([
            'user_id' => $user->id,
            'book_id' => $request->book_id,
            'status' => LoanStatus::PENDING,
        ]);

        return redirect()->route('loans.index')
            ->with('success', 'Solicitud de préstamo enviada correctamente.');
    }

    /**
     * Aprobar un préstamo (Bibliotecario)
     */
    public function approve($id)
    {
        $loan = Loan::findOrFail($id);

        // Verificar que el préstamo esté pendiente
        if ($loan->status !== LoanStatus::PENDING) {
            return redirect()->back()
                ->withErrors(['message' => 'Este préstamo ya ha sido procesado.']);
        }

        // Verificar que el libro aún esté disponible
        $book = $loan->book;
        if (!$book->is_available) {
            return redirect()->back()
                ->withErrors(['message' => 'El libro ya no está disponible.']);
        }

        // Establecer fechas
        $loanDate = Carbon::now();
        $dueDate = Carbon::now()->addDays(15);

        // Actualizar el préstamo
        $loan->update([
            'status' => LoanStatus::APPROVED,
            'librarian_id' => auth()->id(),
            'loan_date' => $loanDate,
            'due_date' => $dueDate,
        ]);

        // Cambiar disponibilidad del libro
        $book->update([
            'is_available' => false,
        ]);

        return redirect()->back()
            ->with('success', 'Préstamo aprobado correctamente. Vencimiento: ' . $dueDate->format('d/m/Y'));
    }

    /**
     * Rechazar un préstamo (Bibliotecario)
     */
    public function reject($id)
    {
        $loan = Loan::findOrFail($id);

        // Verificar que el préstamo esté pendiente
        if ($loan->status !== LoanStatus::PENDING) {
            return redirect()->back()
                ->withErrors(['message' => 'Este préstamo ya ha sido procesado.']);
        }

        $loan->update([
            'status' => LoanStatus::REJECTED,
            'librarian_id' => auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', 'Préstamo rechazado.');
    }

    /**
     * Marcar como devuelto (Bibliotecario)
     */
    public function markAsReturned($id)
    {
        $loan = Loan::findOrFail($id);

        // Verificar que el préstamo esté aprobado
        if ($loan->status !== LoanStatus::APPROVED) {
            return redirect()->back()
                ->withErrors(['message' => 'Este préstamo no puede ser marcado como devuelto.']);
        }

        // Establecer fecha de devolución
        $loan->update([
            'status' => LoanStatus::RETURNED,
            'return_date' => Carbon::now(),
        ]);

        // Cambiar disponibilidad del libro
        $loan->book->update([
            'is_available' => true,
        ]);

        return redirect()->back()
            ->with('success', 'Préstamo marcado como devuelto. El libro ya está disponible.');
    }

}
